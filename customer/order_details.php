<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION['email']))
        {
            header('Location: ../login.php');
            exit();
        }
    ?>
	<div id="container">
	
		<div id="logo">
			PCExpress
		</div>
		
		<div id="menu">
            <div id="username" style="float: left;">
			<b>
				<?php

				session_start();

				if (!isset($_SESSION['email']))
				{
					header('Location: ../login.php');
					exit();
				}

				echo $_SESSION['email'];
    			?>
			</b>
			</div>

			<form id="logoutform" action="../logout.php">
				<div class="option" onclick="submitForm()">
					Wyloguj
				</div>
			</form>
			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		<div id="subcontainer">
			<div id="sidebar" style="height: inherit;">
				<a href="status.php">
					<div class="optionL">
						<b>Powrót</b>
					</div>
				</a>
			</div>
			
			<div id="content" style="min-height: 400px; height: fit-content;">
				<span class="bigtitle">Wyświetl zamówienie</span>
				
				<div class="dottedline"></div>


                <?php
                $link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
                if(!$link)
                {
                    die("Błąd połączenia z bazą danych \n". mysqli_error($link));
                }

                $id = $_GET['id'];
                $query = "SELECT u.firstname, u.lastname, u.city, u.address, u.phone, u.email, o.`date` FROM `orders` as o JOIN users AS u ON o.client_id = u.id WHERE o.order_id = '$id';";

                $sql = mysqli_query($link, $query);
                if (!$sql)
                {
                    die("Błąd polecenia \n".mysqli_error($link));
                }
                $sql = mysqli_fetch_array($sql);
                ?>

                <h3>Imię i nazwisko:</h3>
                <?php
                echo($sql[0]." ".$sql[1]);
                ?>

                <h3>Adres zamieszania:</h3>
                <?php
                echo($sql[2].", ulica ".$sql[3]);
                ?>

                <h3>Kontakt:</h3>
                <?php
                echo("Nr. telefonu: <a href='tel:$sql[4]'>".$sql[4]."</a><br>");
                echo("Adres email: <a href='mailto:$sql[5]'>".$sql[5]."</a><br>");
                ?>

                <h3>Data złożenia zamównia:</h3>
                <?php
                echo($sql[6]);
                ?>

                <h3>Zawartość zamówienia:</h3>
                <?php
                $query = "SELECT name, price FROM services JOIN `orders-services` AS os ON services.service_id = os.service_id WHERE os.order_id = $id;";
                $sql = mysqli_query($link, $query);


                echo("<table><tr><th>Nazwa</th><th style='text-align:left;'>Cena</th></tr>");
                while ($row = mysqli_fetch_assoc($sql))
                {
                    echo("<tr><td>".$row['name']."</td><td>". number_format($row['price'], 2, ',', ' ') ." zł</td></tr>");
                }
                

                $query = "SELECT SUM(price) FROM services JOIN `orders-services` AS os ON services.service_id = os.service_id WHERE os.order_id = $id;";
                $sql = mysqli_query($link, $query);

                $sql = mysqli_fetch_array($sql);
                echo("<tr style='background-color: #128870; color:white; font-weight:600;'><td style='text-align:right;'>Koszt całkowity:</td><td>". number_format($sql[0], 2, ',', ' ') ." zł</td></tr>");
                echo("</table>");
                // echo("<a href='orders.php?closeid=".$id."'style='text-decoration:none; text-align: -webkit-right;''><div class='button' style='width:30%;'>Zakończ zamówienie</div></a>");
                mysqli_close($link);
                ?>
            </div>
        </div>

		<div id="footer">
			© 2023 PCExpress Sp. z o.o. Wszelkie prawa zastrzeżone.
			
			<br>

			PCExpress to firma świadcząca usługi z zakresu sprzedaży, serwisu i konserwacji sprzętu komputerowego oraz oprogramowania.

			<br>

			Jesteśmy zarejestrowaną spółką Z.O.O. z siedzibą w Lesznie.

			<br>

			Właściciele: Patryk Piekarski, Jakub Wójcik.

			<br>

			Adres: ul. Leszczyńskich 27, 64-100 Leszno

			<br>

			Telefon: <a href="tel:+48123456789">123 456 789</a>

			<br>

			E-mail: <a href="mailto:info@pcexpress.com">info@pcexpress.com.</a>

 
		</div>
	
	</div>
	<script>
<?php
	mysqli_close($link);
?>
function submitForm()
	{
		document.getElementById("logoutform").submit();
	}
</script>
</body>
</html>
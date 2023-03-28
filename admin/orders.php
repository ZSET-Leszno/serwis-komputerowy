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


	<div id="container" style="min-width: 1000px; width: fit-content;">
	
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
				<a href="admin.php">
					<div class="optionL">
						Edycja
					</div>
				</a>

				<a href="help.php">
					<div class="optionL">
						Pomoc
					</div>
				</a>

				<a href="orders.php">
					<div class="optionL">
                        <b>Zamówienia</b>
					</div>
				</a>

			</div>
			
			<div id="content" style="min-height: 400px; height: fit-content; min-width: 730px; width: max-content">
				<span class="bigtitle">Zamówienia</span>
				
				<div class="dottedline"></div>
				<?php
					$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
					if(!$link)
					{
						die("Błąd połączenia z bazą danych \n". mysqli_error($link));
					}	
				?>
				<form method="post" action="orders.php">
					
				</form>

				
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
<?php
	mysqli_close($link);
?>
	<script>
function submitForm()
	{
		document.getElementById("logoutform").submit();
	}
</script>
</body>
</html>
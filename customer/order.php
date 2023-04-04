
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

			<a href="cart.php">
				<div class="option">
					Koszyk
				</div>
			</a>
			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		
		<div id="subcontainer">
		<div id="sidebar" style="height: inherit;">
			

			<a href="order.php">
				<div class="optionL">
					<b>Zamawianie</b>
				</div>
			</a>

			<a href="status.php">
				<div class="optionL">
					Status
				</div>
			</a>

            <a href="partnerzy-home.php">
				<div class="optionL">
					Partnerzy
				</div>
			</a>

			<a href="lokalizacja-home.php">
				<div class="optionL">
					Lokalizacja
				</div>
			</a>

			<a href="pomoc.php">
				<div class="optionL">
					Pomoc
				</div>
			</a>
		</div>
		
		<div id="content" style="height: fit-content;">
			<span class="bigtitle">Zamawianie usług</span>
			
			<div class="dottedline"></div>
			
			<table id="uslugi">
                <thead>
                  <tr>
                    <th>Usługa</th>
                    <th>Cena</th>
					<th></th>
                  </tr>
                </thead>
				
                <tbody>
					<?php
						$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");
						if (!$link)
						{
							die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error() ."<br><br>");
						}

						$result = mysqli_query($link, "SELECT service_id, name, price FROM services;");
						if (!$result)
						{
							echo "Błąd wykonania zapytania";
						}
						
						while ($row = mysqli_fetch_assoc($result))
						{
							echo '<tr>';

							echo '<td>'. $row['name'] .'</td>';
							echo '<td>' . number_format($row['price'], 2, ',', ' ') . ' zł</td>';
							echo '<td><a style="text-decoration: none;" href="cart-includer.php?id='. $row["service_id"] .'"><div class="button">DODAJ</div></a></td>';
							echo '</tr>';
						}
						mysqli_close($link);
					?>
                </tbody>
            </table>
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
		function submitForm()
		{
			document.getElementById("logoutform").submit();
		}
	</script>
</body>
</html>
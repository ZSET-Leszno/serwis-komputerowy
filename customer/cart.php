
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
					<b>Koszyk</b>
				</div>
			</a>
			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		
		<div id="subcontainer">
		<div id="sidebar" style="height: inherit;">
			<a href="home.php">
				<div class="optionL">
					Jak to działa?
				</div>
			</a>

			<a href="order.php">
				<div class="optionL">
					Zamawianie
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
		
		<div id="content" style="min-height: 300px; height: fit-content;">
			<span class="bigtitle">Usługi w koszyku</span>
			
			<?php
			
			if (isset($_COOKIE['cart']))
			{
				echo 	'<a href="cart-eraser.php">
							<div class="option2">
								Wyczyść koszyk
							</div>
						</a>';
			}

			?>

			<div class="dottedline"></div>
			
			<table id="uslugi">
			<?php

			if (!isset($_COOKIE['cart']))
			{
				echo "<span style='font-size: 25px;'>Koszyk jest pusty</span>";
			}
			else
			{
				echo "<tr><th>Usługa</th><th>Cena</th><th></th></tr>";

				$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");
				if (!$link)
				{
					die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error() ."<br><br>");
				}


				$cart = unserialize($_COOKIE['cart']);
				sort($cart);

				$totalPrice = 0;

				foreach ($cart as $item)
				{
					$result = mysqli_query($link, "SELECT name, price, service_id FROM `services` WHERE service_id IN ($item)");
					$row = mysqli_fetch_row($result);

					$totalPrice += $row[1];

					echo "<tr>";

					echo "<td>". $row[0] ."</td>";
					echo "<td>". number_format($row[1], 2, ',', ' ') ." zł</td>";
					echo '<td><a style="text-decoration: none;" href="cart-element-eraser.php?id='. $row[2] .'"><div class="button">USUŃ</div></a></td>';

					echo "</tr>";
				}

				echo "<tr style='height: 30px;'></tr>";
				echo "<tr><th style='text-align: right;'>Łącznie:</th><th style='text-align: left;'> ". number_format($totalPrice, 2, ',', ' ') ."zł</th><th></th></tr>";

				mysqli_close($link);
			}
			?>
			</table>

			<?php
			
				if (isset($_COOKIE['cart']))
				{
					echo 	'<br>
							<a href="" class="centerer" style="text-decoration: none;">
								<div id="orderButton">ZAMÓW</div>
							</a>';
				}

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
		function submitForm()
		{
			document.getElementById("logoutform").submit();
		}
	</script>
</body>
</html>
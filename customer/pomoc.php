
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<?php

if(isset($_COOKIE['cart']))
{
    $koszyk = unserialize($_COOKIE['cart']);
}
else
{
    $koszyk = array();
}



?>

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
						<b>Pomoc</b>
					</div>
				</a>
			</div>
			
			<div id="content" style="height: fit-content;">
				<span class="bigtitle">Pomoc</span>
				
				<div class="dottedline"></div>
				
				<h3>Napotkałeś problem z naszymi usługami?</h3>
				<h3>Usługa nie została wykonana prawidłowo?</h3>
				<h3>Usługa nie została wykonana na czas?</h3>
				<h3>Sprzęt nie dotarł na czas?</h3>

				<br>

				<h2>Napisz do nas!</h2>
				Możesz napisać na nasz mail <a href="mailto:info@pcexpress.com">info@pcexpress.com</a>, lub skontaktować się z nami przez poniższy formularz kontaktowy.

				<br><br>

				<?php
					if (isset($_SESSION['isSend']) && $_SESSION['isSend'] != 'false')
					{
						echo "<center><span class='seccessText'>Wiadomość została wysłana</span></center><br>";
					}

					$_SESSION['isSend'] = 'false';
				?>

				<form action="help-includer.php" method="post">

				<label for="cars"><small>Wybierz zamówienie, do którego chcesz się odwołać:</small></label><br>
				<select name="chosen-service" required>
				<?php
					$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");

					if (!$link)
					{
						die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error() ."<br><br>");
					}

					
					$query = "SELECT order_id as id, `date` FROM `orders` WHERE client_id = ". $_SESSION['id'] ." ORDER BY id DESC";
					$result = mysqli_query($link, $query);

					while($row = mysqli_fetch_row($result))
					{
						echo "<option value='$row[0]'>ID: $row[0]ㅤㅤData: $row[1]</option>";
					}					

					mysqli_close($link);
				?>
				</select>
				
				<br><br>
				<input type="text" name="help-title" placeholder="Temat twojej wiadomości" style="width: 99%" required>

				<br><br>

				<textarea id="help-textarea" name="help-text" minlength="10" maxlength="3000" placeholder="Tutaj wpisz swoją wiadomość (max 3000 znaków)" required></textarea>	

				<br><br>

				<center>
				<button type="submit" style="padding: 8px 13px">Wyślij</button>
				</center>

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

			E-mail: <a href="mailto:info@pcexpress.com">info@pcexpress.com</a>

 
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
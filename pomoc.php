
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
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
					header('Location: login.php');
					exit();
				}

				echo $_SESSION['email'];
    			?>
			</b>
			</div>

			<form id="logoutform" action="logout.php">
				<div class="option" onclick="submitForm()">
					Wyloguj
				</div>
			</form>
			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		
		<div id="sidebar">
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
					<b>Pomoc</b>
				</div>
			</a>
		</div>
		
		<div id="content">
			<span class="bigtitle">Pomoc</span>
			
			<div class="dottedline"></div>
			
			<h3>Napotkałeś problem z naszymi usługami?</h3>
			<h3>Usługa nie została wykonana prawidłowo?</h3>
			<h3>Usługa nie została wykonana na czas?</h3>
			<h3>Sprzęt nie dotarł na czas?</h3>

			<br>

			<h2>Napisz do nas!</h2>
            Możesz napisać na nasz mail <a href="mailto:info@pcexpress.com">info@pcexpress.com</a>, lub skontaktować się z nami przez poniższy formularz kontaktowy.

			<br><br><br>

			<form action="mailto:info@pcexpress.com" method="post" enctype="text/plain">

			<textarea cols="100" rows="30" maxlength="3000" placeholder="Tutaj wpisz swoją wiadomość"></textarea>	


			</form>
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
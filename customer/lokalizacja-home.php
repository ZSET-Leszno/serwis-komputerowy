
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
					header('Location: login.php');
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
		
		<div id="sidebar" style="height: 830px;">
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
					<b>Lokalizacja</b>
				</div>
			</a>

			<a href="pomoc.php">
				<div class="optionL">
					Pomoc
				</div>
			</a>
		</div>
		
		<div id="content" style="height: 830px;">
			<span class="bigtitle">Nasza lokalizacja</span>
			
			<div class="dottedline"></div>
			
			<p>
                Zapraszamy do naszego serwisu komputerowego mieszczącego się w Lesznie na ulicy Leszczyńskich 27. Nasza lokalizacja znajduje się w dogodnym miejscu, niedaleko centrum miasta, co ułatwia dotarcie do nas zarówno samochodem, jak i komunikacją miejską. Oferujemy szeroki zakres usług związanych z naprawą i konserwacją sprzętu komputerowego, w tym także sprzedaż części i akcesoriów. Jesteśmy do Państwa dyspozycji od poniedziałku do piątku w godzinach 8:00 - 15:00, zapraszamy!
            </p>
            <br>
            <iframe style="border: 5px solid #128870;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2465.0763525934326!2d16.572600551442523!3d51.841301293955524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4705983b277a0eeb%3A0xc38a0a509fc107bb!2sLeszczy%C5%84skich%2027%2C%2064-100%20Leszno!5e0!3m2!1spl!2spl!4v1677170484095!5m2!1spl!2spl" width="720" height="600" style="border: 0;;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
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
			<a href="register.php" target="_blank">
				<div class="option">Zarejestruj się</div>
			</a>

			<a href="login.php">
				<div class="option">Zaloguj się</div>
			</a>
			<div style="clear:both;"></div>
		</div>
		
		<div id="topbar">
			<div id="topbarL">
				<img width="130px" src="picture/logo.png" />
			</div>
			<div id="topbarR">
				<span class="bigtitle">O nas<br></span>
				<div style="height: 15px;"><br>Jesteśmy zespołem pasjonatów technologii, którzy od lat dzielą się swoją wiedzą i doświadczeniem, w dziedzinie komputerów, laptopów oraz akcesoriów elektronicznych. Nasza firma istnieje już od 2010 roku i zyskała uznanie wsród szerokiego grona klientów.</div>
				
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="sidebar">
			<a href="index.html">
				<div class="optionL">
					Strona główna
				</div>
			</a>

			<a href="uslugi.php">
				<div class="optionL">
					Usługi
				</div>
			</a>

			<a href="lokalizacja.html">
				<div class="optionL">
					Lokalizacja
				</div>
			</a>

			<a href="partnerzy.php">
				<div class="optionL">
					Partnerzy
				</div>
			</a>
		</div>
		
		<div id="content">
			<span class="bigtitle">Zarejestruj się</span>
			
			<div class="dottedline"></div>
            <br><br>

<?php
if (isset($_POST['submit']))
{
    //Utworzenie połączenia z db
	$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
	

    //Pobranie danych z formularza
	$firstname = $_POST["firstName"];
	$lastname = $_POST["lastName"];
	$city = $_POST["city"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$password = $_POST["password"];

    //Szyfrowanie hasła
    $hashed_password = md5($password);

    //Sprawdzenie czy adres email jest już w bazie
    $check = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) == 0)
    {
        //Wprowadzenie danych do bazy
        $insert = "INSERT INTO `users`(`firstname`, `lastname`, `city`, `address`, `phone`, `email`, `password`) VALUES ('$firstname', '$lastname', '$city', '$address', '$phone', '$email', '$hashed_password')";
        if (mysqli_query($link, $insert));
        {
            echo("<h2 style='text-align: center;'>Zarejestrowano pomyślnie</h2>");
        }
    }
    else
    {
        //Komunikat o tym że istnieje już konto o podanym adresie email
        echo("<h2 style='text-align: center;'>Podany adres email jest już zajęty</h2>");
    }
    
    //Zamkniecie połączenia z db
    mysqli_close($link);
}
?>
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

			Adres: ul. Leszczyńska 27, 64-100 Leszno

			<br>

			Telefon: <a href="tel:+48123456789">123 456 789</a>

			<br>

			E-mail: <a href="mailto:info@pcexpress.com">info@pcexpress.com.</a>

 
		</div>
	
	</div>
	
</body>
</html>
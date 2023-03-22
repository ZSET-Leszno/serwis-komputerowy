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
			<span class="bigtitle">Zaloguj się</span>
			
			<div class="dottedline"></div>
        

			<form method="POST" action="login.php">
				<table id="logintable">
					<tr>
						<td>
							<label for="email">Adres E-mail:</label>
						</td>

						<td>
							<input type="email" id="email" name="email" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="password">Hasło:</label>
						</td>

						<td>
							<input type="password" id="password" name="password" required>
						</td>
					</tr>

					<tr>
						<td>
							<input type="submit" value="Zaloguj się" name="submit" style="padding: 5px 10px;">
						</td>
					</tr>
				</table>
			</form>
			
			<?php
				if (isset($_POST['submit']))
				{
					$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
					if(!$link)
					{
						die("Błąd połączenia z bazą danych \n". mysqli_error($link));
					}
				
					$email = $_POST["email"];
					$password = $_POST["password"];
					$hashed_password = md5($password);
					
					$query = "SELECT id, email, password, privileges FROM users WHERE email = '". $email ."'";
					$result = mysqli_query($link, $query);
					$resultTab = mysqli_fetch_assoc($result);

					if (!$result || empty($resultTab['email']))
					{
						die("Nie znaleziono adresu email \n". mysqli_error($conn));
					}

					
					if ($hashed_password == $resultTab['password'])
					{
						session_start();

						$_SESSION['email'] = $email;
						$_SESSION['id'] = $resultTab['id'];

						if ($resultTab['privileges'] != "admin")
						{
							header('Location: home.php');

							exit();
						}
						else if ($resultTab['privileges'] != "customer")
						{
							header('Location: admin.php');
	
							exit();
						}
					}
					else
					{
						echo "<table><tr><td>Wprowadzono niepoprawne hasło<br><td></tr></table>";
					}
					
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
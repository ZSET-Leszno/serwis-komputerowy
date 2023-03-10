<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>



	<script>
		function validatePassword()
		{
			let password = document.getElementById("password").value;
			let confirmPassword = document.getElementById("confirm-password").value;
			let passwordError = document.getElementById("password-error");

			if (password !== confirmPassword)
			{
				passwordError.innerHTML = "Hasła nie są identyczne";
				return false;
			}
			else
			{
				passwordError.innerHTML = "";
				return true;
			}
		}

		function validateEmail()
		{
			let email = document.getElementById("email").value;
			let emailError = document.getElementById("email-error");

			if (email.indexOf("@") === -1 || email.indexOf(".") === -1)
			{
				emailError.innerHTML = "Adres email jest niepoprawny";
				return false;
			}
			else
			{
				emailError.innerHTML = "";
				return true;
			}
		}
	</script>
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
            

			<form method="POST" action="registration.php">
				<table id="registertable">
					<tr>
						<td>
							<label for="firstName">Imię:</label><br>
						</td>

						<td>
							<input type="text" id="firstName" name="firstName" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<label for="lastName">Nazwisko:</label><br>
						</td>

						<td>
							<input type="text" id="lastName" name="lastName" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<label for="city">Miasto:</label><br>
						</td>

						<td>
							<input type="text" id="city" name="city" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<label for="address">Adres:</label><br>
						</td>

						<td>
							<input type="text" id="address" name="address" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<label for="phone">Numer telefonu:</label><br>
						</td>

						<td>
							<input type="tel" id="phone" name="phone" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<label for="email">Adres E-mail:</label><br>
						</td>

						<td>
						<input type="email" id="email" name="email" onblur="validateEmail()" required>
						
						</td>
					</tr>

					<tr>
						<td>
							<label for="password">Hasło:</label><br>
						</td>

						<td>
							<input type="password" id="password" name="password" onblur="validatePassword()" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<label for="confirm-password">Potwierdź hasło:</label><br>
						</td>

						<td>
							<input type="password" id="confirm-password" name="confirm-password" onblur="validatePassword()" required><br>
						</td>
					</tr>

					<tr>
						<td>
							<input type="submit" style="padding: 5px 10px; margin: 0px;" value="Zarejestruj" name="submit">
						</td>

						<td>
							<p id="email-error" style="all:inherit; color: crimson; font-weight: 600; font-size: 14px;"></p>
							<p id="password-error" style="all:inherit; color: crimson; font-weight: 600; font-size: 14px;"></p><br>
						</td>
					</tr>
				</table>
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

			Adres: ul. Leszczyńska 27, 64-100 Leszno

			<br>

			Telefon: <a href="tel:+48123456789">123 456 789</a>

			<br>

			E-mail: <a href="mailto:info@pcexpress.com">info@pcexpress.com.</a>

 
		</div>
	
	</div>
	
</body>
</html>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>



<script>

function validateEmail() {
  const emailInput = document.getElementById("email");
  const emailError = document.getElementById("email-error");
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailInput.value.match(emailRegex)) {
    emailError.textContent = "Nieprawidłowy adres e-mail";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
	return false;
  } else {
    emailError.textContent = "";
	const submitButton = document.getElementById("submit");
	submitButton.disabled = false;
  }
}

function validatePassword() {
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirm-password");
  const passwordError = document.getElementById("password-error");

  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;


  // Check if password is at least 8 characters long
  if (password.length < 8) {
    passwordError.innerText = "Hasło musi mieć co najmniej 8 znaków";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    return false;
  }

  // Check if password contains at least one uppercase letter
  if (!/[A-Z]/.test(password)) {
    passwordError.innerText = "Hasło musi zawierać co najmniej jedną wielką literę";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    return false;
  }

  // Check if password contains at least one lowercase letter
  if (!/[a-z]/.test(password)) {
    passwordError.innerText = "Hasło musi zawierać co najmniej jedną małą literę";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    return false;
  }

  // Check if password contains at least one number
  if (!/[0-9]/.test(password)) {
    passwordError.innerText = "Hasło musi zawierać co najmniej jedną cyfrę";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    return false;
  }

  // Check if password contains at least one special character
  if (!/[@#$%^&+=]/.test(password)) {
    passwordError.innerText = "Hasło musi zawierać co najmniej jeden znak specjalny (@#$%^&+=)";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    return false;
  }
// Check if passwords match
  if (password !== confirmPassword) {
    passwordError.innerText = "Hasła nie są identyczne";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
    return false;
  }

  // If all checks pass, clear error message and return true
  passwordError.innerText = "";
  const submitButton = document.getElementById("submit");
  submitButton.disabled = false;
  return true;
}

function validatePhone() {
  const phoneInput = document.getElementById("phone");
  const phoneError = document.getElementById("phone-error");
  const phoneRegex = /^\d{9}$/;

  if (!phoneInput.value.match(phoneRegex)) {
    phoneError.textContent = "Nieprawidłowy numer telefonu";
	const submitButton = document.getElementById("submit");
    submitButton.disabled = true;
	return false;

  } else {
    phoneError.textContent = "";
	const submitButton = document.getElementById("submit");
	submitButton.disabled = false;
  }
}



validateEmail();
validatePassword();
validatePhone();
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
            

			<form method="POST" action="registration.php" id="register">
				<table id="registertable">
					<tr>
						<td>
							<label for="firstName">Imię:</label>
						</td>

						<td>
							<input type="text" id="firstName" name="firstName" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="lastName">Nazwisko:</label>
						</td>

						<td>
							<input type="text" id="lastName" name="lastName" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="city">Miasto:</label>
						</td>

						<td>
							<input type="text" id="city" name="city" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="address">Adres:</label>
						</td>

						<td>
							<input type="text" id="address" name="address" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="phone">Numer telefonu:</label>
						</td>

						<td>
							<input type="tel" id="phone" name="phone" onblur="validatePhone()" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="email">Adres E-mail:</label>
						</td>

						<td>
						<input type="email" id="email" name="email" onblur="validateEmail()" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="password">Hasło:</label>
						</td>

						<td>
							<input type="password" id="password" name="password" onblur="validatePassword()" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="confirm-password">Potwierdź hasło:</label>
						</td>

						<td>
							<input type="password" id="confirm-password" name="confirm-password" onblur="validatePassword()" required>
						</td>
					</tr>

					<tr>
						<td>
							<br><input type="submit" id="submit" style="padding: 5px 10px; margin: 0px;" value="Zarejestruj" name="submit">
						</td>
					</tr>
					<tr>
						<td>
							<p id="phone-error" style="color: crimson; font-weight: 600; font-size: 14px;"></p>
							<p id="email-error" style="color: crimson; font-weight: 600; font-size: 14px;"></p>
							<p id="password-error" style="color: crimson; font-weight: 600; font-size: 14px;"></p>
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
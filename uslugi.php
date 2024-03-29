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
		
		<div id="subcontainer">
		<div id="sidebar" style="height: inherit;">
			<a href="index.html">
				<div class="optionL">
					Strona główna
				</div>
			</a>

			<a href="uslugi.php">
				<div class="optionL">
					<b>Usługi</b>
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
		
		<div id="content" style="height: fit-content;">
			<span class="bigtitle">Nasze usługi</span>
			
			<div class="dottedline"></div>

            <table id="uslugi">
                <thead>
                  <tr>
                    <th>Usługa</th>
                    <th>Cena</th>
                  </tr>
                </thead>
				
                <tbody>
				<?php
					$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");

					if (!$link)
					{
						die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error() ."<br><br>");
					}

					
					$result = mysqli_query($link, "SELECT name, price FROM services;");

					while ($row = mysqli_fetch_row($result))
					{
						echo "<tr>";

						echo "<td>". $row[0] ."</td>";
						echo "<td>". number_format($row[1], 2, ',', ' ') ." zł</td>";

						echo "</tr>";
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
	
</body>
</html>
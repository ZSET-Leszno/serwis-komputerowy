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
    <?php
        session_start();
/*
        if (!isset($_SESSION['email']))
        {
            header('Location: login.php');
            exit();
        }
*/

    ?>


	<div id="container">
	
		<div id="logo">
			PCExpress
		</div>
		
		<div id="menu">
            <div class="option" id="username"></div>

			<!-- <a href="register.php" target="_blank">
				<div class="option">Wyloguj się</div>
			</a> -->

			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		
		<div id="sidebar" style="min-height: 430px;">
			<a href="admin.php">
				<div class="optionL">
					<b>Strona główna</b>
				</div>
			</a>

			<a href="">
				<div class="optionL">
					Baza danych
				</div>
			</a>

            <a href="">
				<div class="optionL">
					Zamówienia
				</div>
			</a>

		</div>
		
		<div id="content" style="height: fit-content;">
			<span class="bigtitle">Kwerendy</span>
			
			<div class="dottedline"></div>
			<?php
				$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
				if(!$link)
				{
					die("Błąd połączenia z bazą danych \n". mysqli_error($link));
				}
				
			?>
			<form method="post" action="admin.php">
			<input type="submit" name="kwerenda1" value="Użytkownicy" style="padding: 5px 10px;">
			<?php
				if(isset($_POST['kwerenda1']))
				{
					$query = "SELECT * FROM users;";
					$result = mysqli_query($link, $query);
					if (!$result)
					{
						echo("Błąd zapytania: ".mysqli_error($link));
						exit();
					}
					echo("<table id='kwerenda'>
					<tr><th>id</th><th>Imię</th><th>Nazwisko</th><th>Miasto</th><th>Adres</th><th>Telefon</th><th>email</th><th>Uprawnienia</th>");
					while ($row = mysqli_fetch_row($result))
					{
						echo "<tr>";

						foreach($row as $i)
						{
						echo("<td>".$i."</td>");
						}
						echo "</tr>";
					}
					echo("</table>");
				}
			?>
			<br>
			<input type="submit" name="kwerenda2" value="Partnerzy" style="padding: 5px 10px;">
			<?php
				if(isset($_POST['kwerenda2']))
				{
					$query = "SELECT * FROM partners;";
					$result = mysqli_query($link, $query);
					if (!$result)
					{
						echo("Błąd zapytania: ".mysqli_error($link));
						exit();
					}
					echo("<table>
					<tr><th>id</th><th>Nazwa</th><th>Opis</th><th>Link</th>");
					for($i = 0; $i < mysqli_num_rows($result); $i++)
					{
						echo("<tr>");
						$echo = mysqli_fetch_row($result);
						echo("<td>".$echo[0]."</td>");
						echo("<td>".$echo[1]."</td>");
						echo("<td>".$echo[2]."</td>");
						echo("<td>".$echo[3]."</td>");
						echo("</tr>");
					}
					echo("</table>");
				}
			?>
			<br>
			<input type="submit" name="kwerenda3" value="Usługi" style="padding: 5px 10px;">
			<?php
				if(isset($_POST['kwerenda3']))
				{
					$query = "SELECT * FROM services;";
					$result = mysqli_query($link, $query);
					if (!$result)
					{
						echo("Błąd zapytania: ".mysqli_error($link));
						exit();
					}
					echo("<table>
					<tr><th>id</th><th>Nazwa</th><th>Cena</th>");
					for($i = 0; $i < mysqli_num_rows($result); $i++)
					{
						echo("<tr>");
						$echo = mysqli_fetch_row($result);
						echo("<td>".$echo[0]."</td>");
						echo("<td>".$echo[1]."</td>");
						echo("<td>".$echo[2]."</td>");
						echo("</tr>");
					}
					echo("</table>");
				}
			?>
			

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

			E-mail: <a href="mailto:info@pcexpress.com">info@pcexpress.com.</a>

 
		</div>
	
	</div>
</body>
</html>
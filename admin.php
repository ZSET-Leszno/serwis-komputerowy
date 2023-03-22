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

        if (!isset($_SESSION['email']))
        {
            header('Location: login.php');
            exit();
        }


    ?>


	<div id="container" style="min-width: 1000px; width: fit-content;">
	
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
		<div id="subcontainer">
			<div id="sidebar" style="height: inherit;">
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
			
			<div id="content" style="min-height: 400px; height: fit-content; min-width: 730px; width: max-content">
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
				<input type="submit" name="kwerenda2" value="Partnerzy" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda3" value="Usługi" style="padding: 5px 10px;">
				<br><br>
				
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
						echo("<table>
						<tr>
							<th>id</th>
							<th>Imię</th>
							<th>Nazwisko</th>
							<th>Miasto</th>
							<th>Adres</th>
							<th>Telefon</th>
							<th>email</th>
							<th>Uprawnienia</th>
							<th>Edycja</th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							
							$count = 0;
							foreach($row as $i => $value)
							{
								$count += 1;
								if ($count == 8)
								{
									continue;
								}
								echo("<td>".$value."</td>");
							}
							echo("<td style='text-align: center;'><a href='edit/edit_users.php?id=".$row['id']."'>Edytuj</a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>

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
						<tr>
							<th>id</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Link</th>
							<th>Edytuj</th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";

							foreach($row as $i => $value)
							{
							echo("<td>".$value."</td>");
							}
							echo("<td style='text-align: center;'><a href='edit/edit_partners.php?id=".$row['id']."'>Edytuj</a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
				
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
							<tr>
								<th>id</th>
								<th>Nazwa</th>
								<th>Cena</th>
								<th>Edytuj</th>
							</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							foreach($row as $i => $value)
							{
								echo("<td>".$value."</td>");
							}
							echo("<td style='text-align: center;'><a href='edit/edit_service.php?id=".$row['id']."'>Edytuj</a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
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
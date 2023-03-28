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
    <?php
        session_start();

        if (!isset($_SESSION['email']))
        {
            header('Location: ../login.php');
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
			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		<div id="subcontainer">
			<div id="sidebar" style="height: inherit;">
				<a href="admin.php">
					<div class="optionL">
						Edycja
					</div>
				</a>

				<a href="help.php">
					<div class="optionL">
						<b>Pomoc</b>
					</div>
				</a>

				<a href="orders.php">
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
				<form method="post" action="help.php">
				<input type="submit" name="kwerenda1" value="Oczekujące" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda2" value="Otwarte" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda3" value="Zamknięte" style="padding: 5px 10px;">
				<br><br>
				
				<?php
					if(isset($_POST['kwerenda1']))
					{
						$query = "SELECT `help-requests`.id, title, users.email FROM `help-requests` JOIN users ON `help-requests`.user_id = users.id WHERE pending = '0' AND is_closed = '0';";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo("<table>
						<tr>
							<th>id</th>
							<th>Tytuł</th>
							<th>Adres email</th>
							<th></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							
							$count = 0;
							foreach($row as $i => $value)
							{
								$count += 1;
								if ($count != 3)
								{
									echo("<td>".$value."</td>");
								}
                                else
                                {
								    echo("<td><a href=mailto:".$value.">".$value."</a  ></td>");
                                }
							}
                            echo("<td><a href='help.php?openid=".$row['id']."' style='text-decoration:none'><div class='button'>Otwórz</div></a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
                <?php
                    if (isset($_GET['openid']))
                    {
                        $id = $_GET['openid'];
                        mysqli_query($link ,"UPDATE `help-requests` SET pending = 1 WHERE id = ".$id.";");
						echo '<script>document.querySelector(\'input[name="kwerenda2"]\').click();</script>';
                    }
                ?>


                <?php
					if(isset($_POST['kwerenda2']))
					{
						$query = "SELECT `help-requests`.id, title, content, order_id, users.email, users.firstname, users.lastname FROM `help-requests` JOIN users ON `help-requests`.user_id = users.id WHERE pending = 1;   ";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo("<table>
						<tr>
							<th>id</th>
							<th>Tytuł</th>
                            <th>Treść</th>
							<th>Id zamówienia</th>
							<th>Adres email</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
							<th style='width: 100px'></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							
							$count = 0;
							foreach($row as $i => $value)
							{
								$count += 1;
								if ($count == 3)
								{
									echo("<td style='text-align: justify;'>".$value."</td>");
								}
								elseif ($count == 5)
								{
									echo("<td><a href=mailto:".$value.">".$value."</a></td>");
								}
                                else
                                {
								    echo("<td>".$value."</td>");
                                }
							}
							echo("<td><a href='help.php?closeid=".$row['id']."'style='text-decoration:none'><div class='button'>Zamknij</div></a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
                <?php
                    if (isset($_GET['closeid']))
                    {
                        $id = $_GET['closeid'];
                        mysqli_query($link ,"UPDATE `help-requests` SET pending = 0, is_closed = '1' WHERE id = ".$id.";");
						echo '<script>document.querySelector(\'input[name="kwerenda3"]\').click();</script>';
                    }
                ?>
				
				<?php
					if(isset($_POST['kwerenda3']))
					{
						$query = "SELECT `help-requests`.id, title, users.email FROM `help-requests` JOIN users ON `help-requests`.user_id = users.id WHERE is_closed = 1;   ";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo("<table>
						<tr>
							<th>id</th>
							<th>Tytuł</th>
							<th>Adres email</th>
                            <th></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							
							$count = 0;
							foreach($row as $i => $value)
							{
								$count += 1;
								if ($count != 3)
								{
									echo("<td>".$value."</td>");
								}
                                else
                                {
								    echo("<td><a href=mailto:".$value.">".$value."</a  ></td>");
                                }
							}
                            echo("<td><a href='help.php?reopenid=".$row['id']."'style='text-decoration:none'><div class='button'>Otwórz ponownie</div></a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
                <?php
                    if (isset($_GET['reopenid']))
                    {
                        $id = $_GET['reopenid'];
                        mysqli_query($link ,"UPDATE `help-requests` SET pending = 1, is_closed = 0 WHERE id = ".$id.";");
						echo '<script>document.querySelector(\'input[name="kwerenda2"]\').click();</script>';
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
<?php
	mysqli_close($link);
?>
	<script>
function submitForm()
	{
		document.getElementById("logoutform").submit();
	}
</script>
</body>
</html>
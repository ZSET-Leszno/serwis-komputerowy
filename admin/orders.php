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
						Pomoc
					</div>
				</a>

				<a href="orders.php">
					<div class="optionL">
						<b>Zamówienia</b>
					</div>
				</a>

			</div>
			
			<div id="content" style="min-height: 400px; height: fit-content; min-width: 730px; width: max-content">
				<span class="bigtitle">Zamówienia</span>
				
				<div class="dottedline"></div>
				<?php
					$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
					if(!$link)
					{
						die("Błąd połączenia z bazą danych \n". mysqli_error($link));
					}
					
				?>
				<form method="post" action="orders.php">
				<input type="submit" name="kwerenda1" value="Oczekujące" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda2" value="Otwarte" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda3" value="Zakończone" style="padding: 5px 10px;">
				<br><br>
				
				<?php
					if(isset($_POST['kwerenda1']))
					{
						$query = "SELECT o.order_id, o.date, COUNT(os.service_id) FROM `orders` AS o JOIN `orders-services` AS os ON o.order_id = os.order_id WHERE is_closed = 0 AND pending = 0 GROUP BY o.order_id;";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo("<table>
						<tr>
							<th>id</th>
							<th>Data zamówienia</th>
							<th>Liczba zamówionych usług</th>
							<th></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							
							foreach($row as $i => $value)
							{
								echo("<td>".$value."</td>");
							}
                            echo("<td><a href='orders.php?openid=".$row['order_id']."'style='text-decoration:none'><div class='button'>Otwórz</div></a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
                <?php
                    if (isset($_GET['openid']))
                    {
                        $id = $_GET['openid'];
                        mysqli_query($link , "UPDATE orders SET pending = 1 WHERE order_id = $id;");
						echo '<script>document.querySelector(\'input[name="kwerenda2"]\').click();</script>';
                    }
                ?>


                <?php
					if(isset($_POST['kwerenda2']))
					{
						$query = "SELECT order_id, u.firstname, u.lastname, `date` FROM orders JOIN users AS u ON orders.client_id = u.id WHERE pending = 1;";
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
							<th>Data złożenia</th>
							<th></th>
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
							echo("<td><a href='order_details.php?id=".$row['order_id']."'style='text-decoration:none'><div class='button'>Szczegóły</div></a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
				
				<?php
					if(isset($_POST['kwerenda3']))
					{
						$query = "SELECT order_id, `date`, close_date FROM orders WHERE is_closed = 1;";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo("<table>
						<tr>
							<th>id</th>
							<th>Data otwarcia</th>
							<th>Data zakończenia</th>
                            <th></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							foreach($row as $i => $value)
							{
								echo("<td>".$value."</td>");
							}
                            echo("<td><a href='orders.php?reopenid=".$row["order_id"]."'style='text-decoration:none'><div class='button'>Otwórz ponownie</div></a></td>");
							echo "</tr>";
						}
						echo("</table>");
					}
				?>
                <?php
                    if (isset($_GET['reopenid']))
                    {
                        $id = $_GET['reopenid'];
                        mysqli_query($link ,"UPDATE `orders` SET pending = 1, is_closed = 0 WHERE order_id = ".$id.";");
						echo '<script>document.querySelector(\'input[name="kwerenda2"]\').click();</script>';
                    }
                ?>
				<?php
                    if (isset($_GET['closeid']))
                    {
                        $id = $_GET['closeid'];
                        mysqli_query($link ,"UPDATE `orders` SET pending = 0, is_closed = 1 WHERE order_id = ".$id.";");
						echo '<script>document.querySelector(\'input[name="kwerenda3"]\').click();</script>';
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
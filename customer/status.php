
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

			<a href="cart.php">
				<div class="option">
					Koszyk
				</div>
			</a>
			
			<div style="clear:both;"></div>
		</div>
		
		<br>
		
		<div id="subcontainer">
		<div id="sidebar" style="height: inherit;">

            <a href="order.php">
				<div class="optionL">
					Zamawianie
				</div>
			</a>

			<a href="status.php">
				<div class="optionL">
					<b>Status</b>
				</div>
			</a>

            <a href="partnerzy-home.php">
				<div class="optionL">
					Partnerzy
				</div>
			</a>

			<a href="lokalizacja-home.php">
				<div class="optionL">
					Lokalizacja
				</div>
			</a>

			<a href="pomoc.php">
				<div class="optionL">
					Pomoc
				</div>
			</a>
		</div>
		
		<div id="content" style="min-height: 200px; height: fit-content; width: fit-content; width: fit-content;">
			<span class="bigtitle">Status wykonania usług</span>
			
			<div class="dottedline"></div>
			
            <!-- ///////////////////// -->

			<div id="subcontainer" style="margin: 0px;">
			
			<div id="content" style="min-height: 200px; height: fit-content; min-width: 730px; padding: 0px;">
				<?php
					$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
					if(!$link)
					{
						die("Błąd połączenia z bazą danych \n". mysqli_error($link));
					}
					
				?>
				<form method="post" action="status.php">
				<input type="submit" name="kwerenda1" value="Oczekujące" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda2" value="Otwarte" style="padding: 5px 10px;">
				<input type="submit" name="kwerenda3" value="Zakończone" style="padding: 5px 10px;">
				<br><br>
				
				<?php
					if(isset($_POST['kwerenda1']))
					{
						$query = "SELECT o.order_id, o.date, COUNT(os.service_id) FROM `orders` AS o JOIN `orders-services` AS os ON o.order_id = os.order_id WHERE is_closed = 0 AND pending = 0 AND o.client_id = ". $_SESSION['id'] ." GROUP BY o.order_id;";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo "<br>";
						echo "<span style='font-size: 25px; color: #128870; font-weight: bold;'><center>Zamówienia oczekujące</center></span>";
						echo "<br>";
						echo("
						<table>
						<tr>
							<th><center>Identyfikator</center></th>
							<th><center>Data utworzenia</center></th>
							<th><center>Liczba usług</center></th>
							<th></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							
							foreach($row as $i => $value)
							{
								echo("<td><center>".$value."</center></td>");
							}
                            echo("<td><a href='order_details.php?id=".$row['order_id']."'style='text-decoration:none'><div class='button'>Szczegóły</div></a></td>");
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
						$query = "SELECT o.order_id, o.date, COUNT(os.service_id) FROM `orders` AS o JOIN `orders-services` AS os ON o.order_id = os.order_id WHERE pending = 1 AND o.client_id = ". $_SESSION['id'] ." GROUP BY o.order_id;";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo "<br>";
						echo "<span style='font-size: 25px; color: #128870; font-weight: bold;'><center>Zamówienia w trakcie wykonywania</center></span>";
						echo "<br>";
						echo("
						<table>
						<tr>
							<th><center>Identyfikator</center></th>
							<th><center>Data utworzenia</center></th>
							<th><center>Liczba usług</center></th>
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
									echo("<td style='text-align: justify;'><center>".$value."</center></td>");
								}
								elseif ($count == 5)
								{
									echo("<td><a href=mailto:".$value.">".$value."</a></td>");
								}
                                else
                                {
								    echo("<td><center>".$value."</center></td>");
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
						$query = "SELECT o.order_id, o.date, close_date, COUNT(os.service_id) FROM `orders` AS o JOIN `orders-services` AS os ON o.order_id = os.order_id WHERE is_closed = 1 AND o.client_id = ". $_SESSION['id'] ." GROUP BY o.order_id;";
						$result = mysqli_query($link, $query);
						if (!$result)
						{
							echo("Błąd zapytania: ".mysqli_error($link));
							exit();
						}
						echo "<br>";
						echo "<span style='font-size: 25px; color: #128870; font-weight: bold;'><center>Zamówienia zakończone</center></span>";
						echo "<br>";

						echo("<table>
						<tr>
							<th><center>Identyfikator</center></th>
							<th><center>Data utworzenia</center></th>
							<th><center>Data zakończenia</center></th>
							<th><center>Liczba usług</center></th>
							<th></th>
						</tr>");
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							foreach($row as $i => $value)
							{
								echo("<td><center>".$value."</center></td>");
							}
                            echo("<td><a href='order_details.php?id=".$row['order_id']."'style='text-decoration:none'><div class='button'>Szczegóły</div></a></td>");
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
                        mysqli_query($link ,"UPDATE `orders` SET pending = 0, is_closed = 1, close_date = current_timestamp() WHERE order_id = ".$id.";");
						echo '<script>document.querySelector(\'input[name="kwerenda3"]\').click();</script>';
                    }
                ?>
				</form>
			</div>
		</div>

			<!-- ///////////////////////////// -->
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
<!-- <!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>


<body>
	<div id="container">
	
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
			<a href="home.php">
				<div class="optionL">
					<b>Jak to działa?</b>
				</div>
			</a>

			<a href="order.php">
				<div class="optionL">
					Zamawianie
				</div>
			</a>

			<a href="status.php">
				<div class="optionL">
					Status
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
		
		<div id="content" style="height: fit-content;">
			<span class="bigtitle">Jak to działa?</span>
			
			<div class="dottedline"></div>
			
            Możesz odwiedzić nasz serwis komputerowy i wykonać zamówienie fizycznie.
            Musisz podać pracownikowi tworzącemu zamówienie swój adres e-mail, powiązany z kontem.
            
            <h3>LUB</h3>

            Kup wykonanie usługi bezpośrednio przez stronę internetową!

            <br>

            Możesz wtedy osobiście dowieźć sprzęt do naszegu serwisu lub wybrać <b>opcję z dostawą!</b>

            <br><br><br>
            <center>
                <table>
                    <tr>
                        <th>
                            Wspierane dostawy
                        </th>
                    </tr>
                        
                    <tr>
                        <table>
                        <tr>
                        <td>
                            Kurier DPD
                        </td>

                        <td>
                            Kurier podjeżdża pod twój dom i odbiera paczkę.
                            <br>
                            Po wykonaniu usługi serwisowej przwywozi paczkę pod twój dom.
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Paczkomat InPost
                        </td>

                        <td>
                            Nadajesz paczkę na wskazany adres.
                            <br>
                            Po wykonaniu usługi serwisowej odbierasz swój sprzęt w tym samym miejscu.
                        </td>
                    </tr>
                        </table>
                    </tr>
                </table>
            </center>
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
</html> -->

<?php

header('Location: order.php');

?>
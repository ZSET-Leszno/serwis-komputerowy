
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
		
		<div id="sidebar" style="height: 430px;">
			<a href="home.php">
				<div class="optionL">
					<b>Jak to działa?</b>
				</div>
			</a>

			<a href="">
				<div class="optionL">
					Status
				</div>
			</a>

            <a href="">
				<div class="optionL">
					Kontakt
				</div>
			</a>

            <!-- TODO Dodać stronę partnerów i lokalizacja -->
		</div>
		
		<div id="content" style="height: 430px;">
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
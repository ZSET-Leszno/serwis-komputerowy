<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>PCExpress</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="../../style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION['email']))
        {
            header('Location: ../../login.php');
            exit();
        }


    ?>


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
					header('Location: login.php');
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
				<a href="../admin.php">
					<div class="optionL">
						<b>Powrót</b>
					</div>
				</a>
			</div>
			
			<div id="content" style="min-height: 400px; height: fit-content;">
				<span class="bigtitle">Edycja usługi</span>
				
				<div class="dottedline"></div>


            <?php
            $link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", 'zset_wojcik');
            if(!$link)
            {
                die("Błąd połączenia z bazą danych \n". mysqli_error($link));
            }

            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$city = $_POST['city'];
				$address = $_POST['address'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$privileges = $_POST['privileges'];

                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', city='$city', address='$address', phone='$phone', email='$email', privileges='$privileges' WHERE id='$id';";
                $result = mysqli_query($link, $query);
                if (!$result)
                {
                    echo("Błąd zapytania: ".mysqli_error($link));
                    exit();
                }
                else
                {
                    header("Location: ../admin.php"); // przekierowanie na stronę główną po zapisaniu zmian
                    exit();
                }
            }
            else if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "SELECT * FROM users WHERE id='$id';";
                $result = mysqli_query($link, $query);
                if (!$result)
                {
                    echo("Błąd zapytania: ".mysqli_error($link));
                    exit();
                }
                $row = mysqli_fetch_assoc($result);
            }
            else
            {
                echo("Nieprawidłowe wywołanie strony");
                exit();
            }
            ?>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label>Imię:</label><br>
                <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" style="width: 300px;"><br>
                <label>Nazwisko:</label><br>
                <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" style="width: 300px;"><br>
				<label>Miasto:</label><br>
                <input type="text" name="city" value="<?php echo $row['city']; ?>" style="width: 300px;"><br>
				<label>Adres:</label><br>
                <input type="text" name="address" value="<?php echo $row['address']; ?>" style="width: 300px;"><br>
				<label>Numer Telefonu:</label><br>
                <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" style="width: 300px;"><br>
				<label>Adres email:</label><br>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" style="width: 300px;"><br>
				<label>Typ użytkownika:</label><br>
                <select name="privileges" style="width: 300px;">
					<optgroup label="Stan obecny">
						<option value="<?php echo $row['privileges']; ?>"><?php echo $row['privileges']; ?></option>
					<optgroup label="Zmień uprawnienia">			
						<option value="admin">admin</option>
						<option value="customer">customer</option>
				</select><br>
				<br>
                <input type="submit" name="submit" value="Zapisz zmiany">
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
<?php
	mysqli_close($link);
?>
function submitForm()
	{
		document.getElementById("logoutform").submit();
	}
</script>
</body>
</html>
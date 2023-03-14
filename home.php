<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PCExpress HOME</title>
    </head>

    <body>
        <?php
            session_start();

            if (!isset($_SESSION['email']))
            {
                header('Location: login.php');
                exit();
            }

            echo "Zalogowano";
        ?>

        <form action="logout.php" method="post">
            <button type="submit" name="logout">Wyloguj</button>
        </form>
    </body>
</html>
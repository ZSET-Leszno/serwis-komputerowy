<?php

session_start();

if (!isset($_SESSION['email']) || !isset($_POST["help-text"]))
{
    header('Location: login.php');
    exit();
}


$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");

if (!$link)
{
    die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error() ."<br><br>");
}

mysqli_query($link, "INSERT INTO `help-requests`(`user_id`, `content`, `title`) VALUES ('". $_SESSION['id'] ."', '". $_POST["help-text"] ."', '". $_POST["help-title"] ."');");

mysqli_close($link);


$_SESSION['isSend'] = "true";
header('Location: pomoc.php');
exit();

?>
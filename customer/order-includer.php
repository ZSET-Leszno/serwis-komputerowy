<?php

session_start();

if (!isset($_SESSION['email']) || !isset($_POST["help-text"]))
{
    header('Location: ../login.php');
    exit();
}


$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");

if (!$link)
{
    die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error() ."<br><br>");
}

$query = "INSERT INTO `orders`(`client_id`) VALUES ('". $_SESSION['id'] ."')";
mysqli_query($link, $query);
mysqli_close($link);


setcookie('cart', '', time() - 3600);
header('Location: status.php');

?>
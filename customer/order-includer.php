<?php

session_start();

if (!isset($_SESSION['email']))
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


$query = "SELECT MAX(order_id) as id FROM `orders`";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$serviceID = $row['id'];


foreach (unserialize($_COOKIE['cart']) as $item)
{
    $query = "INSERT INTO `orders-services`(`order_id`, `service_id`) VALUES ('". $serviceID ."','". $item ."')";
    mysqli_query($link, $query);
}


mysqli_close($link);
setcookie('cart', '', time() - 3600);
header('Location: status.php');

?>
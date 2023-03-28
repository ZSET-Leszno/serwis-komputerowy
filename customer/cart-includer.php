<?php

session_start();

if (!isset($_SESSION['email']))
{
    header('Location: ../login.php');
    exit();
}


$tab = array();

if (isset($_COOKIE['cart']))
{
    $tab = unserialize($_COOKIE['cart']);
}

array_push($tab, $_GET['id']);

setcookie('cart', serialize($tab), time() + 3600);

header('Location: order.php');

?>
<?php

session_start();

if (!isset($_SESSION['email']))
{
    header('Location: ../login.php');
    exit();
}

setcookie('cart', '', time() - 3600, '/');

header('Location: cart.php');

?>
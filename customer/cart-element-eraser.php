<?php

session_start();

if (!isset($_SESSION['email']))
{
    header('Location: ../login.php');
    exit();
}

$cart = unserialize($_COOKIE['cart']);
$index = array_search($_GET['id'], $cart);

if ($index !== false)
{
    unset($cart[$index]);
}

if (count($cart) > 0)
{
    setcookie('cart', serialize($cart), time() + 3600);
    header('Location: cart.php');
}
else
{
    header('Location: cart-eraser.php');
}

?>
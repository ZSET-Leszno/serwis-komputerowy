<?php

if (!isset($_SESSION['email']) || !isset($_POST["help-text"]))
{
    header('Location: login.php');
    exit();
}

// Pobranie istniejącej tablicy koszyka z ciasteczka
if(isset($_COOKIE['koszyk']))
{
    $koszyk = unserialize($_COOKIE['koszyk']);
}
else
{
    $koszyk = array();
}

// Dodanie nowego przedmiotu do koszyka

array_push($koszyk, $_POST['service-id']);

// Zapisanie zmodyfikowanej tablicy koszyka w ciasteczku
setcookie('koszyk', serialize($koszyk), time() + 3600 * 7); // czas wygaśnięcia to 1 godzina


?>
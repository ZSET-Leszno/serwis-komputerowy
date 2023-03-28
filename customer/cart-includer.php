<?php

$link = mysqli_connect("localhost", "zset_wojcik", "Wojcik_123", "zset_wojcik");
if (!$link)
{
    die("Nie udało się połączyć z bazą danych: ". mysqli_connect_error() ."<br><br>");
}

$result = mysqli_query($link, "SELECT service_id, name, price FROM services;");
if (!$result)
{
    die("Błąd wykonania zapytania: ". mysqli_connect_error() ."<br><br>");
}

echo "siema";


mysqli_close($link);

?>
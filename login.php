<?php
$sql = mysqli_connect("s6.cyber-folks.pl", "zset_wojcik", "Wojcik_123");
if($sql)
{
    echo("Zalogowano pomyślnie");
}

mysqli_close($sql)
?>
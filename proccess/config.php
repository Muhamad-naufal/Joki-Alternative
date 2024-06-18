<?php
$Hostname = "localhost";
$Database = "gsi_database";
$User = "root";
$Password = "";

$Connection = mysqli_connect($Hostname, $User, $Password, $Database);
if (!$Connection) {
    echo "Connection failed";
}
?>
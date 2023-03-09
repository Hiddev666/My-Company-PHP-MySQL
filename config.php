<?php

$server = "localhost";
$username = "root";
$password = "";
$nama_database = "bina_sinar";

$db = mysqli_connect($server, $username, $password, $nama_database);

if (!$db) {
    echo "error";              
} else {
}

?>
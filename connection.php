<?php
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "id_gen";

$conn  = mysqli_connect($servername, $username, $password_db, $dbname);

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}


?>
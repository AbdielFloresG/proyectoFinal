<?php

$server = 'localhost:3306';
$username = 'root';
$password = 'password';
$database = 'gameStore';

$conn = mysqli_connect($server, $username, $password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);

?>
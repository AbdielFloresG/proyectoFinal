<?php


$server = 'localhost:3306';
$username = 'root';
$password = 'password';
$database = 'gameStore';

$con = mysqli_connect($server, $username, $password,$database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);

?>
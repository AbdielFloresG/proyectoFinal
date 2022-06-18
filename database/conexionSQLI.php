<?php
// $server = 'localhost';
// $username = 'u367861807_admin';
// $password = 'Gamest0re';
// $database = 'u367861807_gamestorebd';

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
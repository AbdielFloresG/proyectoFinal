<?php
// $server = 'localhost';
// $username = 'id19114801_gamestoredb';
// $password = 'R/j$bii(h3z!xs8/';
// $database = 'id19114801_gamestore';
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
<?php

// $server = 'localhost';
// $username = 'u367861807_admin';
// $password = 'Gamest0re';
// $database = 'u367861807_gamestorebd';

$server = 'localhost:3306';
$username = 'root';
$password = 'password';
$database = 'gameStore';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
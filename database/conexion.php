<?php

// $server = 'localhost';
// $username = 'id19114801_gamestoredb';
// $password = 'R/j$bii(h3z!xs8/';
// $database = 'id19114801_gamestore';

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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataBase = "photos_proyect";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dataBase", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Conexión Establecida";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$my_db = "eladeb";
$port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password, $my_db, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
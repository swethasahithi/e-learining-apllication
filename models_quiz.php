<?php
$servername = "localhost";
$username = "root";
$password = "MadhuMysql";
// Create connection
$conn = new mysqli($servername, $username, $password,'sih_db');
// Check connection
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);
}

?>

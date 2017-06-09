<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "glasbena_lestvica";

// Create connections
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<script>console.log('Connected successfully');</script>";
?>
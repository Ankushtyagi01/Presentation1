<?php
$servername = "localhost";
$username = "root"; // Change this if you've set a different MySQL username
$password = ""; // Change this if you've set a password during MySQL setup
$database = "presentation1"; // Change this if your database name is different

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

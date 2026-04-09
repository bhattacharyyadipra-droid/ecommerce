<?php
// Database connection configuration

$servername = "localhost";
$username = "username"; // replace with your database username
$password = "password"; // replace with your database password
$dbname = "database_name"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully"; // Uncomment to check the connection
?>
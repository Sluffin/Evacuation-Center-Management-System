<?php
// Database configuration
$host = "localhost"; // Hostname
$username = "root";  // Default username for XAMPP
$password = "";      // No password for XAMPP
$database = "lgu-evacuation"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

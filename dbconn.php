<?php
$servername = "localhost";
$database = "clinic_inventory";
$username = "root";
$password = ""; // Use your password if set
$port = 3308; // Your MySQL port number

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close connection (optional)
// $conn->close();
?>

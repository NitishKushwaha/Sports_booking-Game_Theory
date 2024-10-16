<?php
// db_connection.php

$servername = "localhost";  // For XAMPP, the default server name is localhost
$username = "root";         // Default username for MySQL in XAMPP
$password = "";             // Leave password blank for XAMPP
$dbname = "sports_booking_setup"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

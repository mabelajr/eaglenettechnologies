<?php
$host = 'localhost'; // or your MySQL server IP
$user = 'root';      // your MySQL username
$pass = '';          // your MySQL password
$dbname = 'test_db'; // your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
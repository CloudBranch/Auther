<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection to server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database if it doesn't already exist
$sql = "CREATE DATABASE IF NOT EXISTS AutherDB;";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
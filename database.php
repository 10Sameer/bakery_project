<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "project"; 


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS Bakerydata (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(255) NOT NULL,
    userAddress VARCHAR(255) NOT NULL,
    userPhone VARCHAR(20) NOT NULL,
    userEmail VARCHAR(255) NOT NULL,
    product VARCHAR(255) NOT NULL,
    quantity INT(6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute query to create table
if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

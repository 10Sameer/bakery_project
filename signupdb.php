<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "project"; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS Userdata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    password VARCHAR(255) NOT NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
}
$conn->close();
?>

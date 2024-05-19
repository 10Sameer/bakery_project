<?php
session_start();
include '_dbconnect.php';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_SESSION['userName'];
    $userAddress= $_SESSION['userAddress'];
    $userPhone = $_SESSION['userPhone'];
    $userEmail = $_SESSION['userEmail'];
    $quantity = $_SESSION['quantity'];
    $product = $_SESSION['product'];
    
   

 
    $insert_sql = "INSERT INTO bakerydata (userName, userAddress, userPhone, userEmail, product, quantity)
                   VALUES ('$userName', '$userAddress', '$userPhone', '$userEmail', '$product', '$quantity')";


    if ($conn->query($insert_sql) === TRUE) {
        echo "
         <script>alert('Your Order Has Been Successfully Recieved')
       </script>";
        echo "<script>window.location.href='bakery.php';</script>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

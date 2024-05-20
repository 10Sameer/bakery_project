<?php
session_start();
include '_dbconnect.php';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_SESSION['userName'];
    $userAddress= $_SESSION['userAddress'];
    $userPhone = $_SESSION['userPhone'];
    $userEmail = $_SESSION['email'];
    $quantity = $_SESSION['quantity'];
    $product = $_SESSION['productName'];
    
   

 
    $insert_sql = "INSERT INTO bakerydata (userName, userAddress, userPhone, userEmail, product, quantity, created_at) VALUES ('$userName', '$userAddress', '$userPhone', '$userEmail', '$product', '$quantity', NOW())";
    $result = mysqli_query($conn, $insert_sql);
    if($result){
        echo '
        <script>
        alert("Order placed successfully. Thank you for shopping with us.");
        window.location.href = "bakery.php";
        </script>
        ';
    }else{
        echo 'Error: ' . $insert_sql . '<br>' . $conn->error;
    }



    
}

// Close connection
$conn->close();
?>

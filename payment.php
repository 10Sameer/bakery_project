<?php 
session_start();
include "_dbconnect.php";

$loggedin = false;
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
        $loggedin = true;
    }else{
        header("location:bakery.php");
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userName = $_POST['userName'];
        $userAddress = $_POST['userAddress'];
        $userPhone = $_POST['userPhone'];
        $userEmail = $_POST['userEmail'];
        $product = $_POST['product'];
        $quantity = $_POST['quantity'];

        $_SESSION['userName'] = $userName;
        $_SESSION['userAddress'] = $userAddress;
        $_SESSION['userPhone'] = $userPhone;
        $_SESSION['userEmail'] = $userEmail;
        $_SESSION['product'] = $product;
        $_SESSION['quantity'] = $quantity;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-box {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: box-shadow 0.3s ease;
        }

        .payment-box:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .payment-form {
            margin-bottom: 20px;
        }

        .payment-option {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .payment-option label {
            margin-left: 10px;
        }

        .payment-option img {
            width: 150px; 
            height: auto;
            margin-right: 10px;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        @media (max-width: 400px) {
            .payment-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="payment-box">
    <form id="paymentForm" action="inserttable.php" method="post" class="payment-form">
        <h2>Select Payment Method:</h2>
        <div class="payment-option">
            <input type="radio" id="cash_on_delivery" name="payment_method" value="cash_on_delivery">
            <label for="cash_on_delivery">Cash on Delivery</label>
        </div>
        <div class="payment-option">
            <input type="radio" id="esewa" name="payment_method" value="esewa">
            <label for="esewa">
                <img src="esewa.png" alt="eSewa">
               
            </label>
        </div>
        <div class="payment-option">
            <input type="radio" id="khalti" name="payment_method" value="khalti">
            <label for="khalti">
                <img src="khalti.png" alt="Khalti">
           
            </label>
        </div>
        <!-- <input type="button" value="Submit" onclick="submitForm()" class="submit-btn"> -->
       <button>Submit</button>
    </form>
    <input type="button" value="Back" class="submit-btn" onclick="goBack()">
</div>

<!-- <script>
    function submitForm() {
        var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        if (paymentMethod === 'esewa') {
            window.location.href = 'https://www.esewa.com.np/';
        } else if (paymentMethod === 'khalti') {
            window.location.href = 'https://www.khalti.com/';
        } else if (paymentMethod === 'cash_on_delivery') {
            alert('Successfully done');
            window.location.href = 'bakery.php';
        } else {
            alert('Please select a payment method.');
        }
    }

    function goBack() {
        window.history.back();
    }
</script> -->

</body>
</html>

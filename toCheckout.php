<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: italic;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('toCheckout.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.3); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            backdrop-filter: blur(5px); 
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select,
        .form-group input[type="number"] {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"],.btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .form-group input[type="submit"]:hover,.btn {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="form-container">
        <h2>Order Form</h2>
        <form id="checkout-form" action="payment.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="userName">Name:</label>
                <input type="text" id="userName" name="userName" required>
            </div>

            <div class="form-group">
                <label for="userAddress">Address:</label>
                <input type="text" id="userAddress" name="userAddress" required>
            </div>

            <div class="form-group">
                <label for="userPhone">Phone Number:</label>
                <input type="text" id="userPhone" name="userPhone" required>
            </div>

            <div class="form-group">
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" required>
            </div>

            <div class="form-group">
                <label for="product">Product:</label>
                <select id="product" name="product" required>
                    <option value="Pastries Cake">Pastries Cake</option>
                    <option value="Cup Cake">Cup Cake</option>
                    <option value="Donuts">Donuts</option>
                    <option value="Cake">Cake</option>
                    <option value="Chocolate Cake">Chocolate Cake</option>
                    <option value="Breads and cookies">Breads and cookies</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <select id="quantity" name="quantity" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>

            <!-- <div class="form-group">

                <button type="button" >asa</button>
                <button type="button" onclick="addToCart(2)">Add to Cart 2</button>
                <button type="button" onclick="addToCart(3)">Add to Cart 3</button>
                <button type="button" onclick="addToCart(4)">Add to Cart 4</button>
                <button type="button" onclick="addToCart(5)">Add to Cart 5</button>
            </div> -->
             <a href="payment.php"><button onclick="" class="btn">Procced To payment</button> </a> 
            <br> <br>
           
        </form>
    </div>

    <!-- For selction of items  -->
<!-- 
    <script>
        function addToCart(productName) {
            var productSelect = document.getElementById("productSelect");

            // Reset selected product
            productSelect.value = '';

            // Set selected product based on product name
            productSelect.value = productName;
        }

    </script> -->


    <script>
    function validateForm() {
        var phoneRegex = /^\d{10}$/; 
        var emailRegex = /^[^\s@]+@[^\s@]+[^\s@]+$/; 
        var specialCharRegex = /^[^!@#$%^&*()_+{}\[\]:;'"<>,.?\\/]+$/; 
        var phoneNumber = document.getElementById("userPhone").value;
        var email = document.getElementById("userEmail").value;
        var address = document.getElementById("userAddress").value;
        var name = document.getElementById("userName").value;
        var paymentMethod = document.getElementById("paymentMethod").value;

        // Check if phone number is valid
        if (!phoneRegex.test(phoneNumber)) {
            alert("Please enter a valid phone number.");
            return false; 
        }
        // Check if email is valid
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Check if address is valid
        if (!specialCharRegex.test(address)) {
            alert("Address should not start with a special character.");
            return false; 
        }
        if (address.length < 5) {
            alert("Address should be at least 5 characters long.");
            return false; 
        }

        // Check if name is valid
        if (!specialCharRegex.test(name)) {
            alert("Name should not start with a special character.");
            return false; 
        }
        if (name.length < 5) {
            alert("Name should be at least 5 characters long.");
            return false; 
        }

    
        return true;
    }


    </script>

</body>
</html>





  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 80%;
            max-width: 500px;
        }

        label,select {
            display: block;
            margin-bottom: 12px;
            text-align: left;
            
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        #product_quantity {
            width: 50%;
        }

        button, input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px;
            cursor: pointer;
            width: 48%;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #2980b9;
        }

        #cod-checkbox {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
            margin-left: 25%;
            margin-bottom: 5px;
           
        }

        #error-message {
            color: red;
            margin-top: 10px;
            text-align: left;
        }

    </style>
</head>
<body>

<form id="orderForm" onsubmit="return validateForm()" method="post" action="database.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="number">Number:</label>
    <input type="text" id="number" name="number" pattern="\d{10}" title="Enter a 10-digit number" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="product_name">Product Name:</label>
    <select id="product_name" name="product_name">
    <option value="Pastries Cake">Pastries Cake</option>
    <option value="Cup Cake">Cup Cake</option>
    <option value="Bread">Bread</option>
    <option value="Chocolate Cake">Chocolate Cake</option>
    <option value="Cookies">Cookies</option>
    <option value="Chocolatey Donuts">Chocolatey Donuts</option>
    <option value="Apple pie">Apple pie</option>
  </select>

    <label for="product_quantity">Product Quantity</label>
    <input type="number" id="product_quantity" name="product_quantity" min="1" max="15" required>

    <div id="cod-checkbox">
        <label for="cash_on_delivery">Cash on Delivery:</label>
        <input type="checkbox" id="cash_on_delivery" name="cash_on_delivery">
    </div>

    <input type="submit" value="Order Now">
</form>

<div id="error-message"></div>

<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var number = document.getElementById('number').value;
        var address = document.getElementById('address').value;
        var email = document.getElementById('email').value;
        var product_name = document.getElementById('product_name').value;
        var product_quantity = document.getElementById('product_quantity').value;
        var errorMessage = "";

        if (name.trim() === "") {
            errorMessage += "Name is required.<br>";
        }

        if (!/^\d{10}$/.test(number)) {
            errorMessage += "Please enter a valid 10-digit number.<br>";
        }

        if (address.trim() === "") {
            errorMessage += "Address is required.<br>";
        }

        if (!/\S+@\S+\.\S+/.test(email)) {
            errorMessage += "Please enter a valid email address.<br>";
        }

        if (product_name.trim() === "") {
            errorMessage += "Product Name is required.<br>";
        }

        if (product_quantity < 1 || product_quantity > 15 || isNaN(product_quantity)) {
            errorMessage += "Product Quantity must be between 1 and 15.<br>";
        }

        if (errorMessage !== "") {
            document.getElementById('error-message').innerHTML = errorMessage;
            return false;
        }

        alert("Order successfully received!");
        return true;
    }
</script>

   

</body>
</html>

<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: signinpage.php");
    exit;
}

// Check if the buy button was clicked and if it contains necessary parameters
if (isset($_GET['image']) && isset($_GET['value'])) {
    $image = $_GET['image'];
    $value = $_GET['value'];
} else {
    // Redirect to some error page if parameters are not provided
    header("Location: error.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantity Form</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-box {
            background-color: #fff;
            border: 2px solid #3498db;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .form-box {
            background-color: #fff;
            border: 2px solid #3498db;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
        }

        button:hover {
            background-color: #27ae60;
        }

        #error {
            color: red;
            display: none;
            margin-top: 10px;
            font-size: 16px;
        }

        .result-box {
            background-color: #fff;
            border: 2px solid #3498db;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result-item {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .proceed-button, .proceed-button1 {
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 10px;
        }


        .proceed-button1 {
            margin-top: 5px;
        }

        .proceed-button:hover, .proceed-button1:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="product-box">
        <img src="<?php echo $image; ?>" alt="Product Image" class="product-image">
    </div>

    <div class="form-box">
        <form id="quantityForm" action="toCheckout.php">
            <label for="quantity">Quantity:</label>
            <select id="quantity" onchange="calculateGrandTotal()" required>
                <!-- Add options up to 10 -->
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <button type="button" onclick="checkout()">Checkout</button>
        </form>

        <p id="error" style="display: none;">Quantity should be between 1 and 10.</p>
    </div>

    <div class="result-box">
        <div class="result-item" id="grandTotal">Grand Total: Rs.</div>
        <div class="result-item" id="discount">Discount: Rs.</div>
        <div class="result-item" id="tax">Tax: Rs.</div>
        <div class="result-item" id="finalAmount">Final Amount: Rs.</div>
    </div>

    <a href="toCheckout.php?image=<?php echo $image; ?>&value=<?php echo $value; ?>">
        <button class="proceed-button">Proceed to Payment</button>
    </a>
    <a href="bakery.php">
        <button class="proceed-button1">Back to website</button>
    </a>
</div>

<script>
    // Calculate initial grand total for 1 product
    calculateGrandTotal();

    function calculateGrandTotal() {
        const quantityInput = document.getElementById('quantity');
        const grandTotalDisplay = document.getElementById('grandTotal');
        const discountDisplay = document.getElementById('discount');
        const taxDisplay = document.getElementById('tax');
        const finalAmountDisplay = document.getElementById('finalAmount');
        const quantity = parseInt(quantityInput.value) || 1;

        if (quantity > 10 || quantity <= 0) {
            document.getElementById('error').style.display = 'block';
        } else {
            document.getElementById('error').style.display = 'none';
        }

        const total = quantity * <?php echo $value; ?>;

        // Calculate discount
        let discount = 0;
        if (quantity > 5) {
            discount = total * 0.04;
        }

        // Calculate tax
        const tax = total * 0.02;

        // Calculate final amount
        const finalAmount = total - discount + tax;

        grandTotalDisplay.textContent = `Grand Total: Rs. ${total.toFixed(2)}`;
        discountDisplay.textContent = `Discount: Rs. ${discount.toFixed(2)}`;
        taxDisplay.textContent = `Tax: Rs. ${tax.toFixed(2)}`;
        finalAmountDisplay.textContent = `Final Amount: Rs. ${finalAmount.toFixed(2)}`;
    }

    function checkout() {
        alert('Please Click On Proceed to Payment');
    }
</script>

</body>
</html>

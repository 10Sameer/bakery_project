<?php
session_start();
include "_dbconnect.php";
$loggedin = true;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location:signinpage.php");
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
      /* max-width: 300px; */
      margin: 0 auto;
      padding: 80px 20px 20px;
      display: flex;
    }
    .bottom-container {
      /* max-width: 300px; */
      margin-left: 40px;
      width: 40%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .product-box {
      background-color: #fff;
      border: 2px solid #3498db;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 70%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .product-image {
      display: block;
      margin: 0 auto;
      width: 100%;
      aspect-ratio: 3/2;
      object-fit: cover;
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
      width: 90%;
    }

    #quantityForm {
      text-align: center;
      width: 90%;

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
      width: 90%;
    }

    .result-item {
      margin-bottom: 10px;
      font-size: 16px;
    }

    .proceed-button {
      width: 100%;
      padding: 15px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 18px;
      margin-top: 20px;
    }

    proceed-button1 {
      width: 100%;
      padding: 15px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 18px;
      margin-top: 5px;
    }

    .proceed-button1 {
      width: 100%;
      padding: 15px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 18px;
      margin-top: 5px;
    }

    .proceed-button:hover,
    .proceed-button1:hover {
      background-color: #2980b9;
    }
    @media screen and (max-width: 992px){
      .container {
        flex-direction: column;
      }
      .bottom-container {
        margin-left: 0;
      }
      .product-box{
        width: 90%;
        margin: 0 auto;
      }
      .bottom-container {
        width: 100%;
      }
      
    }
    @media screen and (max-width: 768px){
      #quantityForm {
      text-align: center;
      width: 90% !important;

    }
      
    }
  </style>
</head>

<body>
  <?php include '_nav.php' ?>

  <div class="container">
    <div class="product-box">
      <img src="pic/Product-1.jpeg" alt="Product Image" class="product-image" id="productImg">
    </div>

    <div class="bottom-container">
      


      <div class="result-box">
        <div class="result-item" id="grandTotal">Grand Total: Rs.</div>
        <div class="result-item" id="discount">Discount: Rs.</div>
        <div class="result-item" id="tax">Tax: Rs.</div>
        <div class="result-item" id="finalAmount">Final Amount: Rs.</div>
      </div>
      <div class="form-box">
        <form id="quantityForm" action="toCheckout.php" method="post">
          <label for="quantity">Quantity:</label>
          <select name="productName" id="productName" onchange="changeSelection()">
            <option value="pastries">Pastries Cake</option>
            <option value="cupCake">Cup Cake</option>
            <option value="donuts">Donuts</option>
            <option value="cake">Cake</option>
            <option value="chocolate">Chocolate Cake</option>
            <option value="bread">Bread & Cookies</option>

          </select>
          <select id="quantity" name="quantity" onchange="calculateGrandTotal(changeSelection(), this.value)" required>
            <!-- Add options up to 10 -->
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
          <button type="submit">Proceed to Pay</button>
        </form>

        <p id="error" style="display: none;">Quantity should be between 1 and 10.</p>
      </div>

    </div>
  </div>

  <script>
    calculateGrandTotal(120, 1);

    function changeSelection() {
      let selectedProduct = document.getElementById('productName').value;
      let quantityInput = document.getElementById('quantity').value;
      let productImg = document.getElementById('productImg').src;
      if (selectedProduct === 'pastries') {
        document.getElementById('productImg').src = 'pic/Product-1.jpeg';
        calculateGrandTotal(120, quantityInput);
        return 120
      } else if (selectedProduct === 'cupCake') {
        document.getElementById('productImg').src = 'pic/Product-2.jpg';
        calculateGrandTotal(400, quantityInput)
        return 400
      } else if (selectedProduct === 'donuts') {
        document.getElementById('productImg').src = 'pic/Product-3.jpg';
        calculateGrandTotal(320, quantityInput)
        return 320
      } else if (selectedProduct === 'cake') {
        document.getElementById('productImg').src = 'pic/Product-4.jpg';
        calculateGrandTotal(500, quantityInput)
        return 500
      } else if (selectedProduct === 'chocolate') {
        document.getElementById('productImg').src = 'pic/Product-5.jpg';
        calculateGrandTotal(700, quantityInput)
        return 700
      } else if (selectedProduct === 'bread') {
        document.getElementById('productImg').src = 'pic/Product-6.jpg';
        calculateGrandTotal(250, quantityInput)
        return 250
      }

    }

    function calculateGrandTotal(int, quantity) {
      let quantityInput = document.getElementById('quantity');
      let grandTotalDisplay = document.getElementById('grandTotal');
      let discountDisplay = document.getElementById('discount');
      let taxDisplay = document.getElementById('tax');
      let finalAmountDisplay = document.getElementById('finalAmount');

      if (quantity > 10 || quantity <= 0) {
        document.getElementById('error').style.display = 'block';
      } else {
        document.getElementById('error').style.display = 'none';
      }

      let total = quantity * int;
      console.log(total)

      // Calculate discount
      let discount = 0;
      if (quantity > 5) {
        discount = total * 0.03;
      }

      // Calculate tax
      let tax = total * 0.13;

      // Calculate final amount
      let finalAmount = total - discount + tax;

      grandTotalDisplay.textContent = `Grand Total: Rs. ${total.toFixed(2)}`;
      discountDisplay.textContent = `Discount: Rs. ${discount.toFixed(2)}`;
      taxDisplay.textContent = `Tax: Rs. ${tax.toFixed(2)}`;
      finalAmountDisplay.textContent = `Final Amount: Rs. ${finalAmount.toFixed(2)}`;
      console.log(quantityInput.value);
    }
  </script>

</body>

</html>
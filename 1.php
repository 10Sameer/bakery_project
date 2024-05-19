<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Selection</title>
  <style>
    /* Your CSS styles */
    .add-product-button {
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

    .add-product-button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

<a href="#" onclick="addToPayment('pic/Product-1.jpeg', 120)"> <button class="add-product-button"> Buy Now</button> </a>
<a href="#" onclick="addToPayment('pic/Product-2.jpg', 400)"> <button class="add-product-button"> Buy Now</button> </a>
<a href="#" onclick="addToPayment('pic/Product-3.png', 300)"> <button class="add-product-button"> Buy Now</button> </a>
<a href="#" onclick="addToPayment('pic/Product-4.jpg', 500)"> <button class="add-product-button"> Buy Now</button> </a>
<a href="#" onclick="addToPayment('pic/Product-5.jpg', 250)"> <button class="add-product-button"> Buy Now</button> </a>

<script>
function addToPayment(image, price) {
    window.location.href = `2.php?image=${image}&price=${price}`;
}
</script>

</body>
</html>

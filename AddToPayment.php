<!-- AddtoPayment.php -->
<?php
session_start();
if (!isset($_SESSION['product']) || !isset($_SESSION['price'])) {
    header("location: index.php");
}
$product = $_SESSION['product'];
$price = $_SESSION['price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add to Payment</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Add to Payment</h2>
    <div>
        <p>Product: <?php echo $product; ?></p>
        <p>Price: <?php echo $price; ?></p>
       
    </div>
</div>

</body>
</html>

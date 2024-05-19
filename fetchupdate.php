   <?php
session_start();
include '_dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM bakerydata WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $id = $_POST['id'];
            $userName = $_POST['userName'];
            $userAddress = $_POST['userAddress'];
            $userPhone = $_POST['userPhone'];
            $userEmail = $_POST['userEmail'];
            $product = $_POST['product'];
            $quantity = $_POST['quantity'];

            // Validate quantity
            if ($quantity > 0 && $quantity <= 10) {
               
                $sql = "UPDATE bakerydata SET 
                    userName = '$userName', 
                    userAddress = '$userAddress', 
                    userPhone = '$userPhone', 
                    userEmail = '$userEmail', 
                    product = '$product', 
                    quantity = '$quantity' 
                    WHERE id = $id";

                if ($conn->query($sql) === TRUE) {
                    echo "
                    <script>alert('Record updated successfully.') </script>";

                    echo "<script>window.location.href='fetch.php';</script>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "<script>alert('Invalid quantity. Quantity must be greater than 0 and equal to 10.')</script>";
            }
        } else {

            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update Record</title>
                <style>
                   form {
                        width: 250px;
                        margin: 0 auto;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    form label {
                        display: block;
                        margin-bottom: 5px;
                    }

                    form input[type="text"],
                    form input[type="email"],
                    form select,
                    form input[type="submit"] {
                        width: 90%;
                        padding: 8px;
                        margin-bottom: 10px;
                        border: 2px solid #ccc;
                        border-radius: 5px;
                    }

                    form input[type="submit"] {
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        cursor: pointer;
                        transition: background-color 0.3s;
                        margin-top: 5px;
                    }

                    form input[type="submit"]:hover {
                        background-color: #0056b3;
                       
                    }

                </style>
            </head>
            <body>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="userName">Name:</label>
                    <input type="text" id="userName" name="userName" value="<?php echo $row['userName']; ?>"><br>
                    <label for="userAddress">Address:</label>
                    <input type="text" id="userAddress" name="userAddress" value="<?php echo $row['userAddress']; ?>"><br>
                    <label for="userPhone">Phone:</label>
                    <input type="text" id="userPhone" name="userPhone" value="<?php echo $row['userPhone']; ?>"><br>
                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" name="userEmail" value="<?php echo $row['userEmail']; ?>"><br>
                    <label for="product">Product:</label>
                    <select id="product" name="product">
                        <option value="cake" <?php if ($row['product'] == 'cake') echo 'selected'; ?>>Cake</option>
                        <option value="bread" <?php if ($row['product'] == 'bread') echo 'selected'; ?>>Bread</option>
                        <option value="pastry" <?php if ($row['product'] == 'pastry') echo 'selected'; ?>>Pastry</option>
                        
                    </select><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" max="10" required><br>
                    <input type="submit" value="Update">
                </form>
            </body>
            </html>
            
            <?php
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

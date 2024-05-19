<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fetch Table</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
<style>
    body {
        font-family: lato, sans-serif;
        font-weight: 700;
        font-style: normal;
        position: relative;
        margin: 0;
        padding: 0;
    }

    .container {
        position: relative;
    }

    .icons {
        position: absolute;
        top: -40px;
        right: 25px;
        font-size: 30px;
       margin-right: 10px;
    }

    span {
        font-size: 10px;
        margin-right: 20px;
    }
    

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 40px; 
    }
    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .view-btn,
    .delete-btn {
        display: inline-block;
        padding: 8px 12px;
        text-decoration: none;
        color: #ffffff;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .view-btn {
        background-color: #007bff;
    }

    .view-btn:hover {
        background-color: #0056b3;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

   
    @media screen and (max-width: 768px) {
        
        .logout-btn {
            display: block; 
            position: fixed; 
            right: 10px; 
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    }
</style>
</head>


<body>
<div class="icons">
    <a href="complaintFetch.php"> 
        <div id="cart-btn" class="fa-solid fa-comments">
            <span>Review</span>
        </div>
    </a>
    <a href="user-logout.php">
        <i class="fa-solid fa-right-from-bracket"></i>
    </a>
</div>
</body>
</html>



<?php
session_start();
include '_dbconnect.php';

$sql = "SELECT * FROM bakerydata";
$sql = "SELECT *, DATE_FORMAT(reg_date, '%Y-%m-%d %H:%i:%s') AS formatted_reg_date FROM Bakerydata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Product</th><th>Quantity</th><th>Time</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["userName"] . "</td>";
        echo "<td>" . $row["userAddress"] . "</td>";
        echo "<td>" . $row["userPhone"] . "</td>";
        echo "<td>" . $row["userEmail"] . "</td>";
        echo "<td>" . $row["product"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["formatted_reg_date"] . "</td>";
        echo "<td>
                <div class='action-buttons'>
                    <div class='delete-btn-container'>
                        <a href='delete.php?id=" . $row["id"] . "' class='delete-btn'>Delete</a>
                      <a href='fetchupdate.php?id=" . $row["id"] . "' class='view-btn'>Update</a>
                </div>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Review Form</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] , .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            text-decoration: none;
        }

        .btn{
            margin-top: -35px;
            margin-left: 155px;
            text-decoration: none;
            
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Product Review Form</h2>
    <form id="reviewForm" action="complaintTable.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>
        </div>

        <div class="form-group">
            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="complaintFeedback">Complaint/Feedback:</label>
            <textarea id="complaintFeedback" name="complaintFeedback" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required>
            <span class="error-message" id="phoneNumberError"></span>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>
            <span class="error-message" id="addressError"></span>
        </div>

        <input type="submit" onclick="alert('Review Submitted Successfully')" value="Submit Review">
    </form>
    <a href="bakery.php"><input class="btn" type="submit" value="Back to Website"></a>  
</div>
         

<script>
    
    function validateForm()
    {
        // Validate Phone Number
        var phoneNumber = document.getElementById("phoneNumber").value;
        var phoneNumberPattern = /^[0-9]{10}$/;
        if (!phoneNumberPattern.test(phoneNumber)) {
            document.getElementById("phoneNumberError").textContent = "Please enter a valid 10-digit phone number";
            return false;
        } else {
            document.getElementById("phoneNumberError").textContent = "";
        }

        // Validate Address
        var address = document.getElementById("address").value;
        var addressPattern = /^[a-zA-Z0-9\s,.'-]{5,}$/;
        if (!addressPattern.test(address)) {
            document.getElementById("addressError").textContent = "Please enter a valid address (minimum 5 characters, no special characters at the beginning)";
            return false;
        } else {
            document.getElementById("addressError").textContent = "";
        }

        return true;
    }
</script>

</body>
</html>

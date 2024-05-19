<?php
session_start();
include '_dbconnect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM Review WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $productName = $row["productName"];
        $complaints = $row["complaints"];
        $phoneNumber = $row["phoneNumber"];
        $address = $row["address"];
        $productImage = base64_encode($row["productImage"]); 
    } else {
        echo "Record not found";
        exit();
    }
} else {
    echo "ID parameter missing in the URL";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $complaints = $_POST['complaints'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    if(isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        $productImageData = file_get_contents($_FILES['productImage']['tmp_name']); 
        $productImage = base64_encode($productImageData); 
    }

    $sql = "UPDATE Review SET productName='$productName', complaints='$complaints', phoneNumber='$phoneNumber', address='$address', productImage='$productImage' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data updated successfully');</script>";
        header("Location: complaintFetch.php");
      
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else{

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product Review</title>
</head>
<body>
    <h2>Edit Product Review</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" value="<?php echo $productName; ?>" required><br>

        <label for="complaints">Complaints/Feedback:</label>
        <textarea id="complaints" name="complaints" rows="4" required><?php echo $complaints; ?></textarea><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" value="<?php echo $phoneNumber; ?>" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required><?php echo $address; ?></textarea><br>

        <label for="productImage">Product Image:</label><br>
        <img src="data:image/jpeg/jpg/gif/png;base64,<?php echo $productImage; ?>" alt="Product Image"><br>
        <input type="file" id="productImage" name="productImage"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
 }
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
<?php 
session_start();
include '_dbconnect.php';

$sql = "CREATE TABLE IF NOT EXISTS Review (
    productName VARCHAR(255) NOT NULL,
    productImage LONGBLOB NOT NULL,
    complaints TEXT NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetching form data
    $productName = $_POST['productName'];
    $complaints = $_POST['complaintFeedback'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    // Image handling
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $fileTmpPath = $_FILES['productImage']['tmp_name'];
        $fileName = $_FILES['productImage']['name'];
        $fileSize = $_FILES['productImage']['size'];
        $fileType = $_FILES['productImage']['type'];
        
        // Read file data
        $imageData = file_get_contents($fileTmpPath);

        // Prepare image data for insertion
        $stmt = $conn->prepare("INSERT INTO Review (productName, productImage, complaints, phoneNumber, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $productName, $imageData, $complaints, $phoneNumber, $address);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>window.location.href='bakery.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading file";
    }
}


$conn->close();
?>
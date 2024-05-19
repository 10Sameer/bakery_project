<?php 
session_start();
include '_dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Review WHERE id = $id";

   
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo  "<script> window.location.href = 'complaintFetch.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is not set.";
}

$conn->close();
?>

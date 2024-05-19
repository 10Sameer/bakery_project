<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "project";


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];


if (empty($username) || empty($email) || empty($phone) || empty($password)) {
    echo "Please fill in all fields.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
} elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
    echo "Invalid phone number format.";
} else {
 
    $check_sql = "SELECT * FROM Userdata WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "Username or email already exists.";
    } else {
   
        $sql = "INSERT INTO Userdata (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>

<!-- Code for js validation -->
<script>
function validateForm() {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('password').value;

    if (username === '' || email === '' || phone === '' || password === '') {
        alert("Please fill in all fields.");
        return false;
    }
    return true;
}
</script>

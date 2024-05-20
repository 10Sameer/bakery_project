<?php 
session_start();
include '_dbconnect.php';

$userExists = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "CREATE TABLE IF NOT EXISTS Userdata (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(12) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    $result = mysqli_query($conn,$sql);
    // check if user is already registered
    $sql2 = "SELECT * from userdata";
    $result2 = mysqli_query($conn,$sql2);
    
    while($row2 = mysqli_fetch_assoc($result2)){

        if($row2['email'] == $email ){
            echo'
            <script>
            alert("User Already Exists!")
            </script>';
            $userExists = true;
        }
    }
    
    // if not 
    
    if(!$userExists){

        $sql3 = "INSERT INTO Userdata (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
        // sql query to insert
        $result3 = mysqli_query($conn,$sql3);
        if($result3) 
        
        echo'<script>
        alert("Sign In Successfull");
        window.location.href="signinpage.php";
        </script>';
    }


   

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('userSignUp.jpg');
            background-size: cover;
        
        }

        .signup-container {
            background-color: rgba(255, 255, 255, 0.3); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            backdrop-filter: blur(2px); 
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.5s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

       
        .eye-icon {
            background-color: transparent;
            border: none;
            cursor: pointer;
            position: absolute;
            right: 30px;
            top: calc(69% - 10px); 
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form id="signup-form" action="signup.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="button" id="togglePassword" class="eye-icon" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <div class="form-group">
              <input type="submit" value="Sign Up"> 
                <input type="submit" onclick="backTo()" value="Back to sign-in Page"> 
            </div>
        </form>
        
     </div>
</body>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('password');
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

    function backTo() {
        alert('Please wait Redirecting You to Sign in Page');
        window.location.href = "signinpage.php";
    }


      
</script>

<script>
    function validateForm() {
        var nameRegex = /^[^!@#$%^&*()_+{}\[\]:;'"<>,.?\\/]+\w{2,}$/; 
        var phoneRegex = /^(?:\+977)?\d{10}$/; 
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
        var passwordRegex = /^(?=.*[!@#$%^&*()_+{}\[\]:;'"<>,.?\\/])(?=.{6,})/;

        var name = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;

        // Check if name is valid
        if (!nameRegex.test(name)) {
            alert("Name must not start with a special character and should be more than 3 letters.");
            return false; 
        }

        // Check if phone number is valid
        if (!phoneRegex.test(phone)) {
            alert("Please enter a valid phone number. It should contain 10 digits.");
            return false; 
        }

        // Check if email is valid
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false; 
        }

        // Check if password is valid
        if (!passwordRegex.test(password)) {
            alert("Password must contain at least one special character and be at least 6 characters long.");
            return false; 
        }
        
        return true;
    }
</script>


</html>

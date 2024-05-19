<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
            background-image: url('reviewComment.jpg'); 
            background-size: cover;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.3); 
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            backdrop-filter: blur(8px); 
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #fff; 
        }

        input {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.5); 
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            font-size: 16px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>User Review</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
         <button type="submit" name="login">Login</button>
    </form>
    <button type="submit" onclick="backTo()" name="login">Back To Sign in page</button>
 -->

  <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $correctUsername = 'Sameer';
        $correctPassword = 'SAM';

        $enteredUsername = isset($_POST["username"]) ? $_POST["username"] : '';
        $enteredPassword = isset($_POST["password"]) ? $_POST["password"] : '';

        if ($enteredUsername == $correctUsername && $enteredPassword == $correctPassword) {
            header("Location: complaintFetch.php");
            exit();
        } else {
            echo '<p class="error">Invalid username or password. Please try again.</p>';
           
        }

    }
    ?>   
<!--     
         <script>
              function backTo() {
        alert('Please wait Redirecting You to Sign in Page');
        window.location.href = "signinpage.php";
    }


        </script>
     -->
<!-- </div>

</body>
</html> -->

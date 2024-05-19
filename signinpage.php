 <?php 
session_start();
include '_dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    header("location: bakery.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `userdata` WHERE email = '$email' && password = '$password' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ( $num == 1) {
            $row = mysqli_fetch_assoc($result);
                if($password = $row['password']){ 
                    $_SESSION['loggedin']=true;
                    $_SESSION['email']=$email;
                    echo 
                    '<script>
                       alert("Please Proceed for Purchase")
                       window.location.href="addToCart-3.php";
                    </script>';
                

                }
                else{
                    echo 
                    '<script>
                       alert("Error! Invalid Credentials");
                     
                    </script>';
                }
            }

    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: lato;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            background-image: url('image.jpg');
            background-size: cover;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.2); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: relative; 
            backdrop-filter: blur(2px); 
        }

        .login-container h2 {
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
        .form-group input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .eye-icon {
            position: absolute;
            right: 25px; 
            top: calc(60% - 10px); 
            cursor: pointer;
            border: none;
            border-style: none;
            background-color:  #fff;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-group .switch {
            text-align: center;
            margin-top: 10px;
        }

        .form-group .switch a {
            text-decoration: none;
            color: #007bff;
        }

        .icons {
            position: absolute;
            right: 50px;
            top: 30px;
            font-size: 30px;
        }

         #cart-btn{
            font-size: 30px;
            margin-right: 20px;
            transition: transform 0.5s;
         }
         
         span{
            font-size: 12px;
            transition: transform 0.5s;
         }

        .icons a {
            text-decoration: none;
            color: #333;
          
        }

          .icons #cart-btn:hover ,span {
          transform: scale(1.2);
          color: #8d542a;
        }

    </style>
</head>
<body>
    <div class="icons">
       <a href="adminLogin.php"> <div id="cart-btn"<i class="fas fa-user"></i><span>Admin login</span></div></a>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="./signinpage.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" id="username" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="button" id="togglePassword" class="eye-icon" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <div class="form-group">
               <a href="addToCart-1.php"> <input type="submit" value="Login"> </a>
            </div>

            <div class="form-group switch">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
</body>
</html>

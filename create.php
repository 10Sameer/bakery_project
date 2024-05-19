<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$db="register";

//Create connection
$conn=mysqli_connect($servername,$username,$password,$db);

//Check connection
if($conn){
    echo"connected to database inform successfully";
}
else{
    echo"error";
}


  //retrevial for data
  $username = $_POST['username'];
  $password = $_POST['password'];

  //check if username already is created/registered
   $sql = "SELECT * FROM users where Username='$username'";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0){ 
    echo"<span class='error-msg'> Username already Exists.Please enter a different username.</span>"; 
}  else { 
     //insert new user into database 
     $sql = "INSERT INTO users(username,password)
                     VALUES ('$username','$password')";

    if( $conn->query($sql)=== TRUE)   {
        echo"<span class='success-msg'> Account successfully created.</span>"; 
    }              
}
?>
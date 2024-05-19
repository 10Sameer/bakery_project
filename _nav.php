<?php 
include '_dbconnect.php';
$loggedin = false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
   $loggedin = true;
}
?>
<link rel="stylesheet" href="style.css">
<header class="header"> 
          <div class="logo"> 
            <i class="fas fa-bread-slice"></i><span class="heading-name">Hamro Bakery </span>
          </div>            
            <div class="navbar">
                <ul>
                    <li class="item"><a href="bakery.php">Home</a></li>
                    <li class="item"><a href="#about-us">About us</a></li>
                    <li class="item"><a href="#product">Product</a></li>
                    <li class="item"><a href="#gallery">Gallery</a></li>
                    <li class="item"><a href="#contact-us">Contact us</a></li>
                </ul>
            </div>
            <?php 
            if($loggedin){
                $sql = "SELECT * FROM userdata WHERE email = '" . $_SESSION['email'] . "'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $row = mysqli_fetch_assoc($result);

                echo'
                <h4>Hello '.$row['username'].'</h4>';
                }

                
            }else{
                echo'<h4>Hello User</h4>';
            }
            ?>

            
            <div class="icons">
            <a href="user-logout.php">  <div id="cart-btn1" class="fa-solid fa-right-from-bracket"></div> </a>
            
            </div>

            <div class="toggle2" id="toggle2">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="drop-down active">
                <ul>
                    <li class="item"><a href="#home">Home</a></li>
                    <li class="item"><a href="#about-us">About us</a></li>
                    <li class="item"><a href="#product">Product</a></li>
                    <li class="item"><a href="#gallery">Gallery</a></li>
                    <li class="item"><a href="#contact-us">Contact us</a></li>
                </ul>
            </div>
     
      </header>
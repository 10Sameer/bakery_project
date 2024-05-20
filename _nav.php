<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
<style>
    #icons-container-nav{
        display: flex ;
    }
</style>

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
          

            
            <div class="icons" id="icons-container-nav">
            <?php 
            if($loggedin){
                $sql = "SELECT * FROM userdata WHERE email = '" . $_SESSION['email'] . "'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $row = mysqli_fetch_assoc($result);

                echo'
                <p>Hello '.$row['username'].'</p>';
                }

                
            }else{
                echo'<p>Hello User</p>';
            }
            ?>
            <a href="user-logout.php">  <div id="cart-btn1" class="fa-solid fa-right-from-bracket"></div> </a>
            
            </div>

            <div class="toggle2" id="toggle2">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="drop-down">
                <ul>
                    <li class="item"><a href="bakery.php">Home</a></li>
                    <li class="item"><a href="#about-us">About us</a></li>
                    <li class="item"><a href="#product">Product</a></li>
                    <li class="item"><a href="#gallery">Gallery</a></li>
                    <li class="item"><a href="#contact-us">Contact us</a></li>
                </ul>
            </div>
     
      </header>
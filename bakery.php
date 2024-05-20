<?php
session_start();
include '_dbconnect.php';
$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- ___________-----------------Font poppins------------__________________________ -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Bakery </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap');
    </style>

</head>

<body>
    <?php include '_nav.php' ?>


    <!-- First page homepage  -->
    <section>
        <div class="home" id="home">
            <h2 class="quote-home">WE BAKE THE WORLD A BETTER PLACE</h2>
            <button class="button">Get started</button>
        </div>
    </section>

    <!-- Background description image -->
    <div class="banner-id">
        <img class="banner" src="pic/banner.png" alt="">
        <div class="background-image2"></div>
    </div>


    <!-- About Us page -->
    <div class="Aboutus-page" id="about-us">
        <h2 class="Aboutus-heading"> ABOUT US</h2>
        <div class="Aboutus-grid">
            <img class="Aboutus-img" src="pic/about.jpg" alt="">
            <div class="Aboutus-text">
                <h3 class="Aboutus-first-text">Good Things Come To Those Who Bake For Others </h3>
                <p class="Aboutus-second-text">Visit Our Bakery For World Class Bakery Products.We Have Wide Ranges Of Variety In Our Shop.</p>
                <p class="Aboutus-third-text">Our Bakery Shop Is The Best Bakery Shop And In The Town.So U Would Have Not Complaints With Our Bakery Products.</p>
                <button class="Aboutus-button">Read More</button>
            </div>
        </div>

    </div>

    <!-- Product page -->
    <section class="product-bgcolor" id="product">
        <div class="Main-product-div">


            <div class="product-heading">
                <h2> Our Products</h2>
            </div>

            <div class="product-grid">

                <div class="profile">
                    <img class="profile-picture" src="pic/Product-1.jpeg">
                    <p class="product-name">
                        Pastries Cake
                    </p>

                    <div class="product-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-price">RS.120</span>
                    <a href="addToCart-3.php"> <button class="add-product-button"> Buy Now</button> </a>
                </div>

                <div class="profile">
                    <img class="profile-picture" src="pic/Product-2.jpg">
                    <p class="product-name">
                        Cup Cake
                    </p>

                    <div class="product-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-price">RS.400</span>
                    <a href="addToCart-3.php"> <button class="add-product-button"> Buy Now</button> </a>
                    </div>

                <div class="profile">
                    <img class="profile-picture" src="pic/Product-3.jpg">
                    <p class="product-name">
                        Donuts
                    </p>

                    <div class="product-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-price">RS.320</span>
                    <a href="addToCart-3.php"> <button class="add-product-button"> Buy Now</button> </a>

                </div>

                <div class="profile">
                    <img class="profile-picture" src="pic/Product-4.jpg">
                    <p class="product-name">
                        Cake
                    </p>

                    <div class="product-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-price">RS.500</span>
                    <a href="addToCart-3.php"> <button class="add-product-button"> Buy Now</button> </a>
                    </button>
                </div>

                <div class="profile">
                    <img class="profile-picture" src="pic/Product-5.jpg">
                    <p class="product-name">
                        Chocolate Cake
                    </p>

                    <div class="product-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-price">RS.700</span>
                    <a href="addToCart-3.php"> <button class="add-product-button"> Buy Now</button> </a>
                </div>

                <div class="profile">
                    <img class="profile-picture" src="pic/Product-6.jpg">
                    <p class="product-name">
                        Breads and cookies
                    </p>

                    <div class="product-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-price">RS.250</span>
                    <a href="addToCart-3.php"> <button class="add-product-button"> Buy Now</button> </a>

                </div>
            </div>


        </div>
    </section>

    <!-- Slider page -->
    <div class="slider-heading">
        <h2>
            SLIDER IMAGES
        </h2>

        <div class="main-slider">
            <section class="slider">

                <div class="slider-image">
                    <img class="image" src="pic/slider1.jpg" alt="">
                    <img class="image" src="pic/slider2.jpg" alt="">
                    <img class="image" src="pic/slider4.avif" alt="">
                    <img class="image" src="pic/slider2.jpg" alt="">

                </div>
            </section>

            <div class="slider-text">
                <h3 class="slider-info">We are the best Bakery selling in the Town.We provide fresh and delicious Bakery items to our beloved customers.Our products defines itself.
                </h3>
                <button class="slider-button">Read More</button>

            </div>
        </div>
    </div>


    <!-- Our Gallery -->
    <div class="gallery-back-color" id="gallery">
        <div class="gallery-height">
            <h1 class="gallery-heading">OUR GALLERY</h1>

            <section class="gallery-grid">
                <div class="gallery-image">
                    <img src="pic/gallery1.jpg" alt="">
                    <div class="gallery-overlay1">

                    </div>
                </div>

                <div class="gallery-image">
                    <img src="pic/gallery2.jpg" alt="">
                    <div class="gallery-overlay">

                    </div>
                </div>

                <div class="gallery-image">
                    <img src="pic/gallery3.jpg" alt="">
                    <div class="gallery-overlay">

                    </div>
                </div>

                <div class="gallery-image">
                    <img src="pic/gallery4.jpg" alt="">
                    <div class="gallery-overlay">

                    </div>
                </div>

                <div class="gallery-image">
                    <img src="pic/gallery5.jpg" alt="">
                    <div class="gallery-overlay">

                    </div>
                </div>

                <div class="gallery-image">
                    <img src="pic/gallery6.jpg" alt="">
                    <div class="gallery-overlay">

                    </div>
                </div>

            </section>
        </div>
    </div>


    <!-- Weekly Promotion -->

    <section class="promotion">

        <h1 class="promotion-heading">WEEKLY PROMOTION</h1>

        <div class="promotion-box-container">

            <div class="promotion-box">
                <div class="promotion-content">
                    <h3>chocolate cake</h3>
                    <p>Eat delicious chocolate.</p>
                </div>

                <img src="pic/promotion1.png" alt="">
            </div>

            <div class="promotion-box">
                <img src="pic/promotion2.png" alt="">
                <div class="promotion-content">
                    <h3>Special cake</h3>
                    <p>Get a discount of 10% on your favourite cake.</p>
                </div>

            </div>

        </div>

    </section>



    <!-- about Team -->

    <section class="team-bgcolor">
        <h2 class="team-heading">OUR TEAM</h2>

        <div class="team-grid">
            <div class="team-image">
                <img src="pic/sameer.jpg" alt="Sameer Bhandari">

                <div class="team-content">
                    <h3>Sameer Bhandari</h3>
                    <p> CEO </p>
                    <div class="team-socialmedia">
                        <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>

            <div class="team-image">
                <img src="pic/sameer.jpg" alt="">

                <div class="team-content">
                    <h3>Sameer Bhandari</h3>
                    <p> CEO </p>
                    <div class="team-socialmedia">
                        <a href="https://www.facebook.com/leomessi"> <i class="fab fa-facebook-f"></i></a>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>

            <div class="team-image">
                <img src="pic/sameer.jpg" alt="">

                <div class="team-content">
                    <h3>Sameer Bhandari</h3>
                    <p> CEO </p>
                    <div class="team-socialmedia">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Customer review -->
    <section class="customer-review">
        <h1 class="review-heading">CUSTOMER'S REVIEW</h1>

        <div class="review-grid">

            <div class="review-box">
                <img class="review-image" src="pic/review-1.jpg" alt="">

                <div class="review-com">
                    <h3 class="reviewer">Spiderman</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="review-text">This Is One Of The Best Bakery In The World.Every Item Here Are Very Delicious And Fresh.I Would Recommened Everyone To Visit The Bakery.</p>
                </div>
            </div>

            <div class="review-box">
                <img class="review-image" src="pic/review-1.jpg" alt="">

                <div class="review-com">
                    <h3 class="reviewer">Spiderman</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="review-text">What A Variety Of Cakes! And That Too Excellent. Home Delivery Service Is Also Very Fast.</p>
                </div>
            </div>

            <div class="review-box">
                <img class="review-image" src="pic/review-1.jpg" alt="">

                <div class="review-com">
                    <h3 class="reviewer">Spiderman</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="review-text">One Of The Best Bakery.Very Delicious Fresh And Quick Service. Great to Visit. </p>
                </div>
            </div>

        </div>

        <div class="review-btn-class">
            <a href="complaintReview.php"><button class="review-btn">Add your Review</button> </a>
        </div>

    </section>



    <!--contact us  Footer starts here -->
    <footer class="footer-main" id="contact-us">
        <h2 class="footer-heading">Contact Us</h2>

        <div class="row">

            <div class="image">
                <img src="pic/order.gif" alt="">
            </div>

            <div class="form-container">
                <form id="checkout-form" action="inserttable.php" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="userName">Name:</label>
                        <input type="text" id="userName" name="userName" required>
                    </div>

                    <div class="form-group">
                        <label for="userAddress">Address:</label>
                        <input type="text" id="userAddress" name="userAddress" required>
                    </div>

                    <div class="form-group">
                        <label for="userPhone">Phone Number:</label>
                        <input type="text" id="userPhone" name="userPhone" required>
                    </div>

                    <div class="form-group">
                        <label for="userEmail">Email:</label>
                        <input type="email" id="userEmail" name="userEmail" required>
                    </div>

                    <div class="form-group">
                        <label for="product">Product:</label>
                        <select id="product" name="product" required>
                            <option value="">Select Product</option>
                            <option value="Pastries Cake"> Pastries Cake</option>
                            <option value="Cup Cake">Cup Cake</option>
                            <option value="Donuts">Donuts</option>
                            <option value="Cake">Cake</option>
                            <option value="Chocolate Cake">Chocolate Cake</option>
                            <option value="Breads and cookies">Breads and cookies</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="10" required>
                    </div>

                    <div class="form-group">
                        <a href="payment.php"><input type="submit" value="Submit"> </a>
                    </div>
                </form>
            </div>
<script>
    function validateForm() {
        var phoneRegex = /^\d{10}$/;
        var emailRegex = /^[^\s@]+@[^\s@]+[^\s@]+$/;
        var specialCharRegex = /^[^!@#$%^&*()_+{}\[\]:;'"<>,.?\\/]+$/;

        var phoneNumber = document.getElementById("userPhone").value;
        var email = document.getElementById("userEmail").value;
        var address = document.getElementById("userAddress").value;
        var name = document.getElementById("userName").value;

        // Check if phone number is valid
        if (!phoneRegex.test(phoneNumber)) {
            alert("Please enter a valid phone number.");
            return false;
        }
        // Check if email is valid
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Check if address is valid
        if (!specialCharRegex.test(address)) {
            alert("Address should not start with a special character.");
            return false;
        }
        if (address.length < 5) {
            alert("Address should be at least 5 characters long.");
            return false;
        }

        // Check if name is valid
        if (!specialCharRegex.test(name)) {
            alert("Name should not start with a special character.");
            return false;
            if (name.length < 5) {
                alert("Name should be at least 5 characters long.");
                return false;

                return true;
            }
        }
    }
</script>

</body>

</div>


</div>
</footer>


<!-- footer -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Address</h3>
            <p>Kirtipur,Bhatkyapati</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>E-mail</h3>
            <a href="#" class="link">bhandarisameer96@gmail.com<a>
                    <a href="#" class="link">bhandarihero1@gmail.com</a>
        </div>

        <div class="box">
            <h3>Call us</h3>
            <p>+977-9814567659</p>
            <p>+977-9841445678</p>
            <p>+977-9841445128</p>
        </div>

        <div class="box">
            <h3> Opening hours</h3>
            <p>Monday - Friday: 9:00 am - 7:00 pm <br> Saturday: 7:00 am - 9:00 pm </p>
        </div>

    </div>


</section>

<!-- footer ends -->





<script src="script.js"></script>
</body>

</html>
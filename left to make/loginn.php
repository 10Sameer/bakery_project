<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 35px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 10px;
        }

        .product {
            flex: 1 1 calc(33.33% - 20px);
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            transition: box-shadow 0.3s;
        }

        .product:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product img {
            max-width: 60%;
            height: 50%;
            border-radius: 10px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            margin-bottom: 10px;
        }

        .add-to-cart-button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-button:hover {
            background-color: #45a049;
        }

        #cart {
            position: fixed;
            top: 5px;
            right: 5px;
            border: 1px solid #333;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            max-width: 300px;
            width: 100%;
            box-sizing: border-box;
        }

        #cart h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .total {
            font-weight: bold;
        }

        .grand-total {
            font-weight: 500;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>

        <div class="products-container">
            <!-- Product 1 -->
            <div class="product">
                <img src="pic/Product-1.jpeg" alt="Product 1">
                <p> Pastries Cake</p>
                <p>Rs.120</p>
                <input type="number" class="quantity-input" id="quantity1" value="0" min="0" max="10">
                <button class="add-to-cart-button" onclick="addToCart(1)">Add to Cart</button>
            </div>

            <!-- Product 2 -->
            <div class="product">
                <img src="pic/producct3.png" alt="Product 2">
                <p> Cup Cake</p>
                <p>Rs.400</p>
                <input type="number" class="quantity-input" id="quantity2" value="0" min="0" max="10">
                <button class="add-to-cart-button" onclick="addToCart(2)">Add to Cart</button>
            </div>

            <!-- Product 3 -->
            <div class="product">
                <img src="pic/Product-3.jpg" alt="Product 3">
                <p> Donuts</p>
                <p>Rs.320</p>
                <input type="number" class="quantity-input" id="quantity3" value="0" min="0" max="10">
                <button class="add-to-cart-button" onclick="addToCart(3)">Add to Cart</button>
            </div>

            <!-- Product 4 -->
            <div class="product">
                <img src="pic/Product-4.jpg" alt="Product 4">
                <p>Cake</p>
                <p>Rs.500</p>
                <input type="number" class="quantity-input" id="quantity4" value="0" min="0" max="10">
                <button class="add-to-cart-button" onclick="addToCart(4)">Add to Cart</button>
            </div>

            <!-- Product 5 -->
            <div class="product">
                <img src="pic/Product-5.jpg" alt="Product 5">
                <p>Chocolate Cake</p>
                <p>Rs.700</p>
                <input type="number" class="quantity-input" id="quantity5" value="0" min="0" max="10">
                <button class="add-to-cart-button" onclick="addToCart(5)">Add to Cart</button>
            </div>

            <div class="product">
                <img src="pic/Product-6.jpg" alt="Product 6">
                <p>Chocolate Cake</p>
                <p>Rs.250</p>
                <input type="number" class="quantity-input" id="quantity6" value="0" min="0" max="10">
                <button class="add-to-cart-button" onclick="addToCart(6)">Add to Cart</button>
            </div>
        </div>
    </div>

    <div id="cart">
        <h2>Cart</h2>
        <ul id="cart-list"></ul>
        <p class="total">Total: Rs.<span id="grand-total">0</span></p>
        <a href="tocheckout.php"> <button class="check-out">Proceed to Checkout</button> </a> 
    </div>



<script>
function validateForm() {
    var userName = document.getElementById('userName').value;
    var userAddress = document.getElementById('userAddress').value;
    var userPhone = document.getElementById('userPhone').value;
    var userEmail = document.getElementById('userEmail').value;
    var product = document.getElementById('product').value;
    var quantity = document.getElementById('quantity').value;
    var regexPhone = /^[0-9]{10}$/;
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var regexAddress = /^(?=.*[a-zA-Z])[\w\s]{5,}$/;
    var regexName = /[a-zA-Z]/;

    if (userName.trim().length < 3 || !regexName.test(userName)) {
        alert("Please enter a valid Name.");
        return false;
    }

    if (userAddress.trim().length < 5 || !regexAddress.test(userAddress)) {
        alert("Please enter a valid Address.");
        return false;
    }

    if (!regexPhone.test(userPhone)) {
        alert("Please enter a valid Phone number.");
        return false;
    }

    if (!regexEmail.test(userEmail)) {
        alert("Please enter a valid Email address.");
        return false;
    }

    if (product == "") {
        alert("Please select a Product.");
        return false;
    }

    if (quantity < 1 || quantity > 10) {
        alert("Quantity must be between 1 and 10.");
        return false;
    }

    return true;
}
</script>

    <script>
        let cart = [];

        function addToCart(productId) {
            const quantityInput = document.getElementById(`quantity${productId}`);
            const quantity = parseInt(quantityInput.value);

            if (quantity > 0) {
                const product = {
                    id: productId,
                    quantity: quantity,
                    price: getProductPrice(productId),
                };

                const existingProductIndex = cart.findIndex(item => item.id === productId);

                if (existingProductIndex !== -1) {
                    cart[existingProductIndex].quantity += quantity;
                } else {
                    cart.push(product);
                }

                updateCart();
            }
        }

        function getProductPrice(productId) {
            switch (productId) {
                case 1:
                    return 120;
                case 2:
                    return 400;
                case 3:
                    return 320;
                case 4:
                    return 500;
                case 5:
                    return 700;
                case 6:
                    return 250;
                default:
                    return 0;
            }
        }

        function updateCart() {
            const cartList = document.getElementById('cart-list');
            const grandTotalElement = document.getElementById('grand-total');

            let total = 0;

            cartList.innerHTML = '';

            cart.forEach(item => {
                const listItem = document.createElement('li');
                listItem.textContent = `Product ${item.id} x${item.quantity} = Rs.${item.price * item.quantity}`;
                cartList.appendChild(listItem);

                total += item.price * item.quantity;
            });

            grandTotalElement.textContent = total;

            // Update hidden fields in the form
            const checkoutProductInput = document.getElementById('checkout-product');
            const checkoutPriceInput = document.getElementById('checkout-price');
            
            checkoutProductInput.value = cart.map(item => `Product ${item.id} x${item.quantity}`).join(', ');
            checkoutPriceInput.value = total;
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Shopping Cart - Adidas Lebanon</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <div class="container">
        <nav>
            <a class="logo" href="index.php">Adidas</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index2.php">Men</a></li>
                <li><a href="index3.php">Women</a></li>
                <li><a href="index4.php">Kids</a></li>
                <li>
                    <a href="cart.php" class="cartlink">
                    Card
                    </a>
                </li>
            </ul>
        </nav>

        <h1>Your Shopping Cart</h1>

        <div class="cartcontainer">
            <div class="cartitems" id="cartItems">
                <div class="emptycart">Your cart is empty</div>
            </div>

            <div class="cartsummary">
                <h2>Order Summary</h2>
                <div class="summaryrow">
                    <span>Subtotal</span>
                    <span id="subtotal">$0.00</span>
                </div>
                <div class="summaryrow">
                    <span>Shipping</span>
                    <span id="shipping">$5.00</span>
                </div>
                <div class="summaryrow total">
                    <span>Total</span>
                    <span id="total">$5.00</span>
                </div>
                <button class="checkoutbtn" onclick="checkout()">Proceed to Checkout</button>
            </div>
        </div>
    </div>

    <script src="index.js"></script>
    <script src="cart.js"></script>
</body>
</html>
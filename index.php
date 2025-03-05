<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/index.css">

    <title>Home page</title>
</head>
<body>
    <!-- Include the header file -->
    <?php include('header.php'); ?>
    <div class="background"></div>

    <div class="container">
        <h1>The Future of Textile & Garment Management System is here...</h1>
        <p class="p1">Effortlessly manage your textile and garment operations with cutting-edge solutions.<br>From inventory to orders, streamline every step of your business<br>for increased efficiency and growth.</p>
        <br>
        <button class="getStart" onclick='window.location.href="./register.php"'>Get Started</button>
    </div>

    <div class="newArrivals">
        <h1>New Arrivals</h1>
        <div class="product-container">
            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-1.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>

            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-2.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>

            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-3.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>
        </div>

        <div class="product-container">
            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-4.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>

            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-5.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>

            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-6.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>
        </div>

        <div class="product-container">
            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-7.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>

            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-8.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>

            <div class="product">
                <h3>T-shirt</h3>
                <a href="./products-page.php"><img src="./Images/products/t-shirt-9.jpg" alt="product t-shirt"></a>
                <a href="./products-page.php"><p>This t-shirt is the latest one designed by Garment Zee</p></a>
            </div>
        </div>
    </div>

    <hr>

    <!-- Include the footer -->
    <?php include('footer.php'); ?>
 
</body>
</html>
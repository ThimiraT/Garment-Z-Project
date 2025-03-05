<?php 
    session_start();          
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Insert font family from google fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/products-page.css">

    <title>Products Page</title>
</head>
<body>
    <!-- include the header file -->
    <?php include('header.php'); ?>

    <div class="container">
        <div class="background"></div>
        <h1 class="topicP">Our Products</h1>

        <div class="row">

            <?php 
                $sql = "SELECT * FROM products;";
                $result = mysqli_query($connection, $sql);

                while($row = $result -> fetch_assoc()){
                    
                    $img_url = $row['img_url'];
                    $ID = $row['Product_ID'];
                    echo "<div class='product'>
                            <img src='./Images/products/$img_url' alt='product' id='prductImg'>
                            <form method='POST' action='single-product.php'>
                                <input type='hidden' value='$ID' name='productid' >
                                <button type='submit' name='buynowbtn' >Buy Now</button>
                            </form>
                           </div>";
                }
            ?>

        </div>
    </div>

    <!-- include the footer file -->
    <?php include('footer.php'); ?>
    
</body>
</html>
<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Insert font family from google fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/admin-panel.css">

    <title>Admin Profile</title>
</head>

<body>
    <!-- include the header file -->
    <?php include("header.php"); ?>

    <center>
        <h3 id="Welcome">Welcome Admin <?php echo $_SESSION['first_name']; ?>!</h3>
    </center>

    <div class="container">
        <div class="inven_manage">
            <a href="inventory-mng.php">
                <i class="fa-solid fa-warehouse" style="font-size: 75px;"></i>
                <h1>Inventory <br>
                    Management</h1>
                <div class="image1">
                </div>
            </a>
        </div>
        <div class="prod_manage">
            <a href="product-mng.php">
                <i class="fa-brands fa-product-hunt" style="font-size: 75px;"></i>
                <h1>Product <br>
                    Management</h1>
                <div class="image2">
                </div>
            </a>
        </div>
        <div class="order_manage">
            <a href="order-management.php"><i class="fa-solid fa-boxes-stacked" style="font-size: 75px;"></i>
                <h1>Order <br>
                    Management</h1>
                <div class="image3">
                </div>
            </a>
        </div>
    </div>
</body>

</html>
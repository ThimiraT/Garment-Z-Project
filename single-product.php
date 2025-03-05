<?php 
    session_start();          
    require_once 'config.php';

    if(isset($_POST['buynowbtn'])){
        $productid = $_POST['productid'];
    }

    $sql = "SELECT * FROM products WHERE Product_ID = '$productid';";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $name = $row['Product_name'];
        $price = $row['Price'];
        $description = $row['Product_description'];
        $img_url = $row['img_url'];
    }

    // Check if user is logged in
    $logged = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Insert font family from Google Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="CSS/single-product.css">

    <title>Single Product Page</title>
</head>
<body>
    <?php include('header.php'); ?>
    <center>
        <div class="product-details">
            <img class="i1" src="Images/products/<?php echo $img_url ?>" alt="Product Image" width="500px" height="500px">
           
            <h2 id="pName"><?php echo $name ?></h2>
            <h3>Price: Rs.<span id="product-price"><?php echo $price ?></span></h3>
            <p class="description">"<?php echo $description ?>"</p>

            <!-- Form with onsubmit check -->
            <form action="place-order.php" method="POST" onsubmit="return checkLogin();">
                <input type="hidden" name="productID" value="<?php echo $productid ?>">
                <input type="hidden" name="priCe" value="<?php echo $price ?>">
                <button id="buy-now-btn" type="submit" name="ordernow">Buy Now</button>
            </form>

            <br><br>
        </div>
    </center>
    <br> <br>

    <!-- Include the footer -->
    <?php include('footer.php'); ?>

    <script>
        // Function to check login status
        function checkLogin() {
            <?php if (!$logged): ?>
                alert('Please log in to buy this product.');
                window.location.href = './register.php';
                return false;
            <?php endif; ?>
            return true;
        }
    </script>
</body>
</html>

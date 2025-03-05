<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['ordernow'])) {
        $productid = $_POST['productID'];
        $price = $_POST['priCe'];
    }

    if(isset($_POST['placeorder'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phoneno = $_POST['mobileno'];
        $email = $_POST['mail'];
        $qty = $_POST['quantity'];
        $price = $_POST['Totalprice'];
        $total = $price*$qty;
        $address = $_POST['address'];
        $status = "Processing";
        $recipt_name = $_FILES['myfile']['name'];

        $destination = "./Images/recpits/".$recipt_name;

        move_uploaded_file($_FILES['myfile']['tmp_name'], $destination);

        $sql = "INSERT INTO orders (Customer_name, Price, Order_status, Order_email, Address, Receipt_url, Product_ID)
                VALUES ('$name', '$total', '$status', '$email', '$address', '$recipt_name', ' $id');";

        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "<script>
                  alert('Your order was placed successfully !');
                  </script>";
                  
            header('Location: products-page.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Insert font family from google fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/place-order.css">

    <!-- link the java script file -->
    <script src="JS/place-order.js"> </script>

    <title>Place an order</title>
</head>
<body>
    <div class="container">
        <!-- contact details -->
        <div class="contact">
            <h1>Place your order</h1>
            <h3>Call</h3>
            <p>+94 11 454 6464</p>
            <h3>Email</h3>
            <p>garmentzee@gmail.com</p>
            <h3>Address</h3>
            <p>Garment Zee, Kaduwela, Malabe</p>
        </div>
    
        <!-- place order details input form -->
        <form action="place-order.php" method="POST" enctype="multipart/form-data">
            <div class="details">
                <label for="name">Name</label>
                <br>
                <input type="text" id="customer-name" placeholder="Your name" name="name" >
                <br>
                <div class="left-right">
                    <div class="form-left">
                        <label for="tel">Phone number</label>
                        <br>
                        <input type="tel" id="tel" placeholder="Your phone number" name="mobileno">
                        <br>
                        <label for="quantity">Quantity</label>
                        <br>
                        <input type="number" id="qty" name="quantity" min="1">
                    </div>

                    <div class="form-right">
                        <label for="email">Email</label>
                        <br>
                        <input type="email" id="mail" placeholder="Your email" name ="mail">
                        <br>
                        <label for="price">Unit Price (Rs. )</label>
                        <br>
                        <input type="number" id="price" name="price" value="<?php echo $price ?>" disabled>
                        <input type="hidden" id="price" name="Totalprice" value="<?php echo $price ?>">
                    </div>
                </div>

                <label for="address">Address</label>
                <br>
                <textarea name="address" id="address"></textarea>
                <br>
                <label for="myfile">Upload your payment recipt</label>
                <br>
                <input type="hidden" value="<?php echo $productid ?>" name="id">
                <input type="file" id="myfile" name="myfile">
                <br> <br> <br>
                
                <!-- place order button -->
                <center>
                    <button type="submit" name="placeorder" id="place-btn" >Place order</button>
                </center>
            </div>
        </form>
    </div>
    
</body>
</html>
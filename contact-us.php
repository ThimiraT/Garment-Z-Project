<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['ContactUs'])) {
        echo "Clicked";
        // Sanitize inputs
        $name = mysqli_real_escape_string($connection, $_POST['YourName']);
        $email = mysqli_real_escape_string($connection, $_POST['mail']);
        $message = mysqli_real_escape_string($connection, $_POST['message']);
        
        // Insert data into the database
        $sql = "INSERT INTO contact_us (Contact_name, Contact_email, Message)
                VALUES ('$name', '$email', '$message')";
        
        $result = mysqli_query($connection, $sql);
        if($result) {
            echo "Message added";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contactus</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    
    <!-- link the css file -->
    <link rel="stylesheet" href="CSS/contact-us.css">

    <!-- Getting icons -->
    <script src="https://kit.fontawesome.com/884e0d8538.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Include the header file -->
    <?php include('header.php'); ?>

    <div class="background-overlay"></div>
    <section class="contactus">
        
        <div class="content">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Whether you have questions about our products, need assistance with an order, or simply want to share feedback, we're here to help.
                Alternatively, you can fill out the contact form below, and one of our team members will get back to you as soon as possible.

                Thank you for choosing Garment Zee. We look forward to connecting with you!
            </p>
        </div>
    <div class="container">
        <div class="box">
            <div class="icon"><i class="fa-solid fa-phone fa-2x"></i></div>
            <div class="text">
                <h3>Phone</h3>
                <p>+94 11 454 6464</p>
            </div>
        </div>
        <div class="box">
            <div class="icon"><i class="fa-solid fa-envelope fa-2x"></i></div>
            <div class="text">
                <h3>E-mail</h3>
                <p>garmentzee@gmail.com</p>
            </div>
        </div>
        <div class="box">
            <div class="icon"><i class="fa-solid fa-location-dot fa-2x"></i></div>
            <div class="text">
                <h3>Adrress</h3>
                <p>Garment Zee, Kaduwela, Malabe</p>
            </div>
        </div>
    </div>
        <div class="contactform">
    <form method="POST" action="contact-us.php">
            <div class="form">
                <input type="text" id="name" name="YourName" placeholder="Your Name" required><br>
                <input type="email" id="email" name="mail" placeholder="Your E-mail" required><br>
                <textarea type="text" id="message" name="message" placeholder="Your Message"></textarea><br>
                <center>
                    <input type="submit" id="submit" name="ContactUs" value="Submit">
                </center>
            </div>
    </form>
        </div>
    
    </section>
    <!-- Include the footer -->
    <?php include('footer.php'); ?>
</body>
</html>
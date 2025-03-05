<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Insert font family from google fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/header.css">
    <title>Header</title>
     
</head>
<body>
    
    <!-- Header -->
    <header class="header-container">
        <a href="./index.php"><img class="logo" src="./Images/logo.png" alt="logo"></a>
        
        <!-- navigation bar -->
        <nav class="navbar">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./products-page.php">Products</a></li>
                <li><a href="./contact-us.php">Contact</a></li>
                <li><a href="./about-us.php">About</a></li>
            </ul>
        </nav>

        <?php 
            if(isset($_SESSION['username'])) {
                echo "<a href='./signout.php'  class='signout-btn' ><u>Sign Out</u></a>";
            }
            else {
                echo "<div class='signupNsignin'>
                      <button class='signup-btn' onclick=\"window.location.href='./register.php'\">Sign Up</button>
                      <button class='signin-btn' onclick=\"window.location.href='./login.php'\">Sign In</button>
                      </div>";
            }
        ?> 

    </header>
    
</body>
</html>

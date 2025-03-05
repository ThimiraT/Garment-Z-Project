<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Insert font family from google fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/about-us.css">

    <title>About Us</title>
</head>
<body>
    
	<?php include("header.php");?>

	<div class = "content">
		<div class = "text">
            <center>
	            <h1 class = "topic">About Us</h1> <br>
                <p class = "p1">Welcome to Garment ZEE!</p>
            </center>
            
		    <p class = "p2">At Garment ZEE, we are committed to selling you high quality garments made from high quality raw materials.
		     With 10 years of experience, we stand out in the textile and garment management field and hope to meet your needs.
		     We are committed to customizing any textile items as per your requirement while our experienced staff work in our company.
		     Join us and renew your style.</p>
            <br>
	        
        </div>

        <div class = "about">    
             <img class = "right" src="Images/about_us.png" alt="About Us Image">
        </div>
    </div>

	<hr>
	
    <!-- include the footer -->
	<?php include ("footer.php");?>
</body>
</html>





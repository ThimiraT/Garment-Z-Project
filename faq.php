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
    <link rel="stylesheet" href="CSS/faq.css">

    <title>FAQ</title>
</head>
<body>
    <!-- include the header file -->
    <?php include('header.php'); ?>

    <hr>
    <center>
	   <h1>Frequently Asked Questions</h1><br>
	   
        <p>Welcome to Frequently Asked Questions section!
        <br> <br>
        Here we are mentioned some common questions asked by customers frequently.
        Also, we provide answers with them. So, you can reffer them and slove your questions.
        <br>
        Have any additional questions? <a href="./contact-us.php">Click here to contact us.</a>
        </p> <br>
	</center>
	
	 <div class="faq-section">
        <div class="faq-item">
            <button class="faq-question">How do I place an order?<span class="icon">▼</span></button>
            <div class="faq-answer">
                <p>You can place an order by logging into your account, browsing the catalog, selecting the desired items, and proceeding through the checkout process.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Can I customize the products?<span class="icon">▼</span></button>
            <div class="faq-answer">
                <p>Yes, you can customize garments by specifying your preferred design, material, and size during the order process.</P>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">How do I register to the website?<span class="icon">▼</span></button>
            <div class="faq-answer">
                <p>You should go to Register page. Then fill the details and tick on the accept Terms and Conditions. After click on Register button.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">How do I contact customer support?<span class="icon">▼</span></button>
            <div class="faq-answer">
                <p>You can contact customer support via email, phone, or through the message feature available on our website.</p>
            </div>
        </div>
    </div>
	
    <!-- java script part for drop down -->
	<script src = "JS/faq.js">
    </script>
	
	<hr>

    <!-- include the footer file -->
    <?php include('footer.php'); ?>
</body>
</html>
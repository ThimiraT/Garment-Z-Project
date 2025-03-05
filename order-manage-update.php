<?php
    include 'config.php';

    if(isset($_GET['updateid'])) {
        $oid = $_GET['updateid'];
        $sql = "SELECT * from orders WHERE Order_ID = $oid;";
        
        $result = mysqli_query($connection, $sql);

        $row = mysqli_fetch_assoc($result);

        $oid = $row['Order_ID'];
        $oName = $row['Customer_name'];
        $oAmount = $row['Price'];
        $oStatus = $row['Order_status'];
        $oEmail = $row['Order_email'];
        $oAddress = $row['Address'];
        $ReciptUrl = $row['Receipt_url'];
    }

    if (isset($_POST['add'])) {
        $oid = $_POST['Id'];
        $oName = $_POST['fName'];
        $oAmount = $_POST['amount'];
        $oStatus = $_POST['fStatus'];
        $oEmail = $_POST['fEmail'];
        $oAddress = $_POST['fAddress'];
        $ReciptUrl = $_POST['recipt'];

        $sql = "UPDATE `orders` SET
                Order_ID = '$oid',
                Customer_name = '$oName',
                Price = $oAmount,
                Order_status = '$oStatus',
                Order_email = '$oEmail',
                Address = '$oAddress',
                Receipt_url = '$ReciptUrl'
                WHERE Order_ID = $oid;";

        $result = mysqli_query($connection, $sql);

        if($result) {
            header('Location: order-management.php');
        }
        else {
            die(mysqli_error($connection));
        }
    }
?>

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
    <link rel="stylesheet" href="CSS/order-management.css">

    <script src="JS/order-management.js"> </script>
   
    <title>Order Management Page</title>
</head>
<body>
    <?php
    include "header.php";
    ?>

    <hr>
    <h1 id="h1Welcome">Welcome to Order Management Page !</h1>

    <div class="updateForm">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formDetails" onsubmit="return formCheck()">
            <fieldset>
                <div class="formContain">
                    <h2 class="omH">Update Order Details</h2><br>

                    <label for="orderId">Order ID :</label><br>
                    <input type="text" id="orderID" placeholder="Order ID" name="Id" value=" <?php echo $oid; ?>" required><br>

                    <label for="cName">Customer Name :</label><br>
                    <input type="text" id="cName" placeholder="Customer Name" name="fName" value=" <?php echo $oName; ?>"><br>

                    <label for="amountOfOrder">Amount Of The Order :</label><br>
                    <input type="text" id="amountOfOrder" placeholder="Amount Of The Order" name="amount" value= "<?php echo $oAmount; ?>"><br>

                    <label for="status">Order Status :</label><br>
                    <input type="text" id="status" placeholder="Order Status" name="fStatus" value= "<?php echo $oStatus; ?>"><br>

                    <label for="email">Email :</label><br>
                    <input type="email" id="Oemail" placeholder="Email" name="fEmail" value= "<?php echo $oEmail; ?>"><br>

                    <label for="address">Address :</label><br>
                    <input type="text" id="Oaddress" placeholder="Address" name="fAddress" value= "<?php echo $oAddress; ?>"><br>

                    <label for="reciptUrl">Payment Recipt :</label><br>
                    <input type="file" id="reciptUrl" placeholder="Payment Recipt" name="recipt" value= "<?php echo $ReciptUrl; ?>"><br><br>

                    <center><input type="submit" id="addBtn" value="UPDATE" name="add"></center>
                </div>
            </fieldset>    
        </form>
    </div>
    <hr>
    <!-- link the footer -->
    <?php include_once'footer.php'; ?>
</body>
</html>
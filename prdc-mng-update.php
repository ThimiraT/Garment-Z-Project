<?php include 'config.php';

if (isset($_GET['updateid'])) {
    $pno = $_GET['updateid'];
    $sql = "SELECT * FROM products WHERE Product_ID=$pno;";

    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($result);

    $id = $row['Product_ID'];
    $pname = $row['Product_name'];
    $pprice = $row['Price'];
    $pdescription = $row['Product_description'];
    $pquentity = $row['Stock_quantity'];
}

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['price'];
    $pdescription = $_POST['discription'];
    $pqty = $_POST['qty'];

    $sql = "UPDATE products SET Product_name='$pname', Price=$pprice, Product_description='$pdescription', stock_quantity=$pqty
            WHERE Product_ID='$pno';";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('Location: product-mng.php');
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
    <link rel="stylesheet" href="CSS/product-management.css">

    <title>Product Management Page</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <hr>
    <div class="pcontainer">
        <h1>Welcome To Product Managemnet Page!</h1>
        
        <div class="form">
            <br>
            <h2>Update Product</h2>
            <form action="" method="post" name="addproduct">
                <table>
                    <tr>
                        <td>
                            <label for="ID">Product ID</label><br>
                        </td>
                        <td>
                            <input type="text" placeholder="Product Id" name="id"
                            value=<?php echo $id; ?>><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Name">Product name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Product Name" name="pname"
                            value=<?php echo $pname; ?>><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="price">Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Price" name="price"
                            value=<?php echo $pprice; ?>><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dicription">Product description</label>
                        </td>
                        <td>
                            <textarea name="discription" id="discription" rows="4" column="80" style="border: none; border-radius: 5px; width: 87%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);"><?php echo htmlspecialchars($pdescription); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="quantity">Quantity</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Quantity" name="qty"
                            value=<?php echo $pquentity; ?>><br>
                        </td>
                    </tr>
                </table>
                
                <center>
                    <button type="submit" value="submit" class="btn" name="add" style="border: 0.5px solid #00aaff; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); font-size: 24px; color: #00aaff; padding: 10px;">Update</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
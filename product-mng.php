<?php
include 'config.php';

session_start();

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $discription = $_POST['discription'];
    $qty = $_POST['qty'];

    $sql = "INSERT INTO products (Product_Id, Product_name, Price, Product_description, Stock_quantity)
            VALUES('$id', '$name', '$price', '$discription','$qty');";
        
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('Location:product-mng.php');
        exit;
    }
    else {
        die("Error: " . mysqli_error($connection));
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

    <!-- form validation -->
    <script>
        function validForm() {
            let id = document.forms["addinven"]["id"].value;
            let pname = document.forms["addinven"]["pname"].value;
            let qty = document.forms["addinven"]["qty"].value;
            let price = document.forms["addinven"]["price"].value;

            if (id == "") {
                alert("Product ID Must be filled out.");
                return false;
            }
            if (pname == "") {
                alert("Product name must be filled out.");
                return false;
            }
            if (qty == "" || isNaN(qty)) {
                alert("Please enter a vaid quantity");
                return false;
            }
            if (price == "" || isNaN(price)) {
                alert("Please enter a valid price");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <hr>
    <div class="pcontainer">
        <h1>Welcome to Products Managemnet Page !</h1>
        <div class="form">
            <br>
            <h2>Add Product</h2>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="addinven" onsubmit="return validForm()">
                <table>
                    <tr>
                        <td>
                            <label for="ID">Product ID</label><br>
                        </td>
                        <td>
                            <input type="text" placeholder="Product Id" name="id" required><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="Name">Product name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Product Name" name="pname"><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="price">Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Price" name="price"><br>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <label for="discription">Product description</label>
                        </td>
                        <td>
                            <textarea name="discription" id="discription" rows="4" column="80"  style="border: none; border-radius: 5px; width: 87%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="quantity">Quantity</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Quantity" name="qty"><br>
                        </td>
                    </tr>
                </table>
                <center>
                    <button type="submit" class="btn" name="add" style="border: 0.5px solid #00aaff; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); font-size: 24px; color: #00aaff; padding: 10px;">Add Product</button>
                </center>
            </form>
        </div>

        <br>
        <hr>

        <h2 style="color: #0069b4; text-align: center;">Product Details</h2>
        <br>

        <?php
        include 'prdc-mng-display.php';
        ?>
    </div>


</body>

</html>
<?php include 'config.php';

if (isset($_GET['invenupdateid'])) {
    $ino = $_GET['invenupdateid'];

    $sql = "SELECT * FROM inventory WHERE Inventory_ID=$ino;";

    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($result);

    $id = $row['Inventory_ID'];
    $iname = $row['Inventory_name'];
    $iCurrentQty = $row['Available_stock'];
    $iCostPrice = $row['costPrice'];
}

if (isset($_POST['addinven'])) {
    $id = $_POST['id'];
    $iname = $_POST['invenName'];
    $iCurrentQty = $_POST['CurrntQty'];
    $iCostPrice = $_POST['costprice'];


    $sql = "UPDATE inventory SET Inventory_name='$iname', Available_stock='$iCurrentQty', costPrice='$iCostPrice' WHERE Inventory_ID='$id';";

    $iresult = mysqli_query($connection, $sql);

    if ($iresult) {
        header('Location: inventory-mng.php');
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
    <link rel="stylesheet" href="CSS/inventory-management.css">

    <title>Inventory Management Page</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <hr>
    <div class="Icontainer">
        <div class="form-section" id="formPopup">
            <h2>Update Inventory</h2>
            <form action="" method="post" name="addinven">
                <table>
                    <tr>
                        <td>
                            <label for="ID">Inventory ID</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Inventory Id" name="id" required
                            value=<?php echo $id; ?>><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID">Inventory Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Inventory Name" name="invenName"
                            value=<?php echo $iname; ?>><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID">Current Quentity</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Current Quentity" name="CurrntQty"
                            value=<?php echo $iCurrentQty; ?>><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID">Cost Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Cost Price" name="costprice"
                            value=<?php echo $iCostPrice; ?>><br>
                        </td>
                    </tr> 
                </table>
                <center>
                    <button type="submit" value="add" class="btn" name="addinven" style="border: none; border-radius: 8px">Update</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
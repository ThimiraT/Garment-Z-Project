<!-- Delete data -->
<?php
    include 'config.php';

    if(isset($_GET['deleteid'])) {
        $ino = mysqli_real_escape_string($connection, $_GET['deleteid']);

        $sql="DELETE FROM products WHERE Product_ID=$ino";
        $result=mysqli_query($connection,$sql);
    
        if($result){
            header('Location:product-mng.php');
        }
        else{
            die(mysqli_error($connection));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/prdc-mng-displa.css">
    <title>Inventory management display</title>
</head>

<body>
    <div id="prdc-display">
        <table id="table">
            <thead>
                <tr>
                    <th>Inventory ID</th>
                    <th>Inventory Name</th>
                    <th>Current Stocks</th>
                    <th>Unit Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * From inventory;";

                $result = mysqli_query($connection, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $iId = $row['Inventory_ID'];
                        $iname = $row['Inventory_name'];
                        $iCurntS = $row['Available_stock'];
                        $iCostPrice = $row['costPrice'];
                        
                        echo '  <tr>
                                    <td scope="row">' . $iId . '</td>
                                    <td>' . $iname . '</td>
                                    <td>' . $iCurntS . '</td>
                                    <td>' . $iCostPrice . '</td>
                                    <td>
                                        <a href="inven-mng-update.php?invenupdateid=' . $iId . '"style="background-color: #0069b4;
                                                                                                 padding:5px; 
                                                                                                 color: white; 
                                                                                                 border: none; 
                                                                                                 border-radious: 10px; 
                                                                                                 text-decoration: none;">Update</a>
                                                                                                
                                        <a href="inven-mng-delete.php?deleteid=' . $iId . '"style="background-color: red;
                                                                                            padding:5px; 
                                                                                            color: white; 
                                                                                            border: none; 
                                                                                            border-radious: 10px; 
                                                                                            text-decoration: none;">Delete</a>
                                    </td>
                                </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
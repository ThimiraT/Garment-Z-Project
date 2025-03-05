<?php 
//Connet Database
    include 'config.php';

    session_start();

    //Insert data to the database
    if (isset($_POST['addinven'])) {
        $iId = $_POST['id'];
        $iname = $_POST['invenName'];
        $iCurntQty = $_POST['CurrntQty'];
        $iCostPrice = $_POST['costprice'];

        $sql = "INSERT INTO inventory (Inventory_ID, Inventory_name, Available_stock, costPrice)
                VALUES ('$iId', '$iname', '$iCurntQty', '$iCostPrice');";
        
        $result = mysqli_query($connection, $sql);

        if ($result) {
            header('Location:inventory-mng.php');
            exit;
        } 
        else {
            die("Error: ". mysqli_error($connection));
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
    <style>
        #formPopup{
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: aliceblue;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="inven-container">
        <h1 id="topic">Welcome to Inventory Management Page !</h1>
        <center>
            <button id="openFormbtn" style="margin-left: 50px; font-family: poppins; color: white; background-color: #00aaff; border: none; border-radius: 8px; width: 200px">Add Inventory</button>
        </center>
        <br>
        <div id="overlay"></div>

        <div class="form-section" id="formPopup">
            <center>
                <h2 style="color: #0069b4;">Add Inventory</h2>
            </center>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="addinven">
                <table>
                    <tr>
                        <td>
                            <label for="ID">Inventory ID</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Inventory Id" name="id" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID">Inventory Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Inventory Name" name="invenName"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID">Current Quentity</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Current Quantity" name="CurrntQty"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ID">Cost Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Cost Price" name="costprice"><br>
                        </td>
                    </tr>
                </table>
                <center>
                    <button type="submit"  class="btn" name="addinven" style="margin-right: 15px; width: 40%; border-radius: 8px; border: 0.5px solid #00aaff;">Add</button>
                    <button id="closePopupBtn"  style="margin-left: 15px; width: 40%; width: 40%; border-radius: 8px; border: 0.5px solid #00aaff;">Close</button>
                </center>
            </form>
        </div>
    </div>

    <script>
        const openFormBtn = document.getElementById('openFormbtn');
        const cloasePopupBtn = document.getElementById('closePopupBtn');
        const popupForm = document.getElementById('formPopup');
        const overlay = document.getElementById('overlay');

        function openForm() {
            formPopup.style.display = 'block';
            overlay.style.display = 'block';
        }

        function closePopup() {
            formPopup.style.display = 'none';
            overlay.style.display = 'none';
        }

        openFormBtn.addEventListener('click', openForm);
        closePopupBtn.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);
    </script>

</body>

</html>
<hr>
<br>

<?php
    include 'inven-mng-display.php';
?>
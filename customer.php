<!-- php part -->
<?php 
    session_start();

    require_once 'config.php';

    if(isset($_POST['changeBtn'])) {
        $sql = "SELECT password FROM user_info WHERE username = '" . $_SESSION['username'] . "' ";
        $result = mysqli_query($connection, $sql);

        if($result) {
            $row = mysqli_fetch_assoc($result);

            $password = $row['password'];

            if($password == $_POST['current-pwd']) {
                $newPassword = $_POST['new-pwd'];

                $sql = "UPDATE user_info SET password ='$newPassword' WHERE username = '" . $_SESSION['username']. "' ";
                $result = mysqli_query($connection, $sql);

                if($result) {
                    echo "<script>
                            alert('Your password is changed successfully!');
                          </script>";
                }
            }
        }
    }

    if(isset($_POST['delBtn'])) {
        $sql = "DELETE FROM user_info WHERE username = '" . $_SESSION['username'] . "';";
        $result = mysqli_query($connection, $sql);
        
        if($result) {
            header('Location: signout.php');
        }
    }
?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/customer.css">

    <!-- link the JS file -->
     <script src="JS/customer.js"></script>

    <title>Customer profile</title>
</head>
<body>
    <!-- include the header file -->
    <?php include('header.php'); ?>
    
    <h1>Hello <?php if(isset($_SESSION['first_name'])) {
        echo htmlspecialchars($_SESSION['first_name']);
    }
    else {
        //redirect to login page when user is not logged in
        header('Location: login.php');
        exit();
    } ?> !</h1>

    <div class="banner">
        <a href="./products-page.php"><img src="./Images/customer-banner.png" alt="products banner"></a>
        <button onclick="window.location.href='./products-page.php'">Buy Products</button>
    </div> <hr>

    <form action="customer.php" method="POST">
        <div class="settings">
            <h2>Password Settings</h2>
            
            <div class="form-grp">
                <div class="texts">
                    <label for="current-pwd"> Enter current password:</label>
                    <br>
                    <label for="new-pwd"> Enter new Password:</label>
                    <br>
                    <label for="confirm-pwd"> Confirm new Password:</label>
                </div>
                
                <div class="inputs">
                    <input type="password" id="current-pwd" name="current-pwd">
                    <br>
                    <input type="password" id="new-pwd" name="new-pwd">
                    <br>
                    <input type="password" id="confirm-pwd" name="confirm-pwd">
                </div>
            </div>

            <div class="btns">
                <button id="delete-btn" name="delBtn" type="submit" onclick="del(event)">Delete Account</button>
                <button id="change-btn" name="changeBtn" type="submit" onclick="change(event)">Change Password</button>
            </div>
        </div>
    </form>
    
    <!-- include the footer file -->
    <?php include('footer.php'); ?>
</body>
</html>
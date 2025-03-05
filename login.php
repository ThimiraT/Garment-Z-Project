<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user_info WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['password'];

            if ($password == $stored_password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['user_type'] = $row['user_type'];

                if($row['acc_status'] == 'active') {
                    if ($_SESSION['user_type'] == 'user') {
                        header('Location: customer.php');
                    } else if ($_SESSION['user_type'] == 'admin') {
                        header('Location: admin-panel.php');
                    } else if ($_SESSION['user_type'] == 'manager') {
                        header('Location: managerdash.php');
                    } else {
                        header('Location: employee.php');
                    }
                }
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "Username not found.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    </style>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="CSS/login.css">

    <!-- Link to JavaScript -->
    <script src="JS/login.js"></script>

    <title>Sign In</title>
</head>
<body>
    <div class="formOut">
        <form action="login.php" method="post">
            <fieldset>
                <div class="formContain">
                    <h1 id="log">Login</h1>
                    <input type="text" name="username" id="username" placeholder="Username" required><br><br>
                    <input type="password" name="password" id="password" placeholder="Password" required><br><br>
                    <input type="checkbox" id="showPw" onclick="togglePassword()"> Show Password
                    <br><br>

                    <?php if (isset($error)): ?>
                        <p class="error"> <?php echo $error; ?> </p>
                    <?php endif; ?>

                    <center><input type="submit" name="submit" class="loginBtn" value="Log in"></center>
                </div>
                <div class="clickReg">
                    <p>Don't have an account? <a id="regLink" href="register.php">Register Now</a></p>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
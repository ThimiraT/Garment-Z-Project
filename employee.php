<?php
session_start();

require_once 'config.php';

if(isset($_POST['change'])) {
    $sql = "SELECT password FROM user_info WHERE username = '".$_SESSION['username']."' ";
    $result = mysqli_query($connection, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);

        $password = $row['password'];

        // Check if current password matches the one in the database
        if($password == $_POST['current-password']) {
            $newPass = $_POST['new-password'];
            $confirmPass = $_POST['confirm-password'];

            // Check if new password and confirm password match
            if($newPass == $confirmPass) {
                $sql = "UPDATE user_info SET password='$newPass' WHERE username = '".$_SESSION['username']."' ";
                $result = mysqli_query($connection, $sql);

                if($result) {
                    echo "<script>
                          alert('Your password was successfully changed!');
                          </script>";
                }
            } else {
                echo "<script>
                      alert('New password and confirm password do not match. Please try again.');
                      </script>";
            }
        } else {
            echo "<script>
                  alert('Current password is incorrect. Please try again.');
                  </script>";
        }
    }
}

    if(isset($_POST['delete'])) {

        mysqli_begin_transaction($connection);
    
        $sql1 = "DELETE FROM employee_salary WHERE username = '" . $_SESSION['username'] . "';";
        $result1 = mysqli_query($connection, $sql1); 
    
        $sql2 = "DELETE FROM user_info WHERE username = '" . $_SESSION['username'] . "';";
        $result2 = mysqli_query($connection, $sql2);
    
        mysqli_commit($connection);
        header('Location: signout.php');
        
    }

    $sql = "SELECT * FROM employee_salary WHERE username = '" . $_SESSION['username'] . "';";
    $result = mysqli_query($connection, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);

        $Working_days = $row['Working_days'];
        $Working_hours = $row['Working_hours'];
        $Hour_rate = $row['Hour_rate'];
        $total_salary = $row['total_salary'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link the style sheet -->
    <link rel="stylesheet" href="CSS/employee.css">

    <title>Employee profile</title>
</head>
<body>
    <!-- include the header file -->
    <?php include('header.php'); ?>

    <h1 id="greeting">Welcome to <?php echo $_SESSION['first_name']; ?>'s employee profile !</h1>
    <div class="container">
    <!-- Profile Section -->
        <div class="profile">
            <h2>Employee Profile</h2><br>
            <p><b>Name <span class = "icon"> : </span></b> <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></p>
            <p><b>Working Days <span class = "icon"> : </span></b> <?php echo $Working_days; ?> days/month</p>
            <p><b>Working Hours <span class = "icon"> : </span></b> <?php echo $Working_hours; ?> hours/day</p>
            <p><b>Hour Rate <span class = "icon"> : </span></b> <?php echo $Hour_rate; ?> Rs./hour</p>
            <p><b>Salary <span class = "icon"> : </span></b> <?php echo $total_salary; ?>/=</p><br>
        </div>

        <!-- Passowrd Settings Section -->
        <div class="settings">
            <h2>Password Settings</h2>
            <form action="employee.php" method="post">
                <label for="current-password">Current Password:</label>
                <input type="password" name="current-password" id="current-password" placeholder="Enter current password">
                
                <label for="new-password">New Password:</label>
                <input type="password" name="new-password" id="new-password" placeholder="Enter new password">
                
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm new password"><br>
                
                <center>
                    <button type="submit" name="change" class="btn-change">Change Password</button><br><br>
                    <button type="submit" name="delete" class="btn-delete">Delete Account</button>
                </center>
            </form>
        </div>
    </div>
<hr>
    <!-- include the footer file -->
    <?php include('footer.php'); ?>
</body>
</html>
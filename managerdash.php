<!--php part -->
<?php
    session_start();
    require_once 'config.php';
//Admin OR Employee Check
    $accountStatus = "None";
    if(isset($_POST['check']))
    {
        $Input = $_POST['Searchbox'];
        $sql = "SELECT acc_status FROM user_info WHERE username = '$Input' ";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            $accountStatus = $row['acc_status'];
        }
    }
//Admin Or Employee Active 
    if(isset($_POST['activate']))
    {
        $Input = $_POST['Searchbox'];
        $sql = "UPDATE user_info 
                SET acc_status = 'active'
                WHERE username = '$Input';";
        $result = mysqli_query($connection, $sql);
<<<<<<< Updated upstream
        if($result){}
=======
        if($result)
        {
            
        }
>>>>>>> Stashed changes
    }
//Admin Or Employee Delete
    if(isset($_POST['delete']))
    {
        $Input = $_POST['Searchbox'];
        $sql = "DELETE FROM user_info WHERE username = '$Input';";
        $result = mysqli_query($connection, $sql);

        if($result)
        {
            echo "Deleted";
        }
    }

    // Add admin
    if(isset($_POST['Addadmin']))
    {
        echo "Clicked";
        $name = $_POST['Name'];
        $Lname = "";
        $username = $_POST['UserName'];
        $email = $_POST['mail'];
        $mobileno1 = $_POST['mobileno1'];
        $mobileno2 = $_POST['mobileno2'];
        $address = $_POST['address'];
        $usertype = $_POST['usertyp'];
        $pwd = $_POST['Password'];
        $acc_status = "active";

        $sql = "INSERT INTO user_info (username, password, first_name,last_name, Email, Phone_number_1, Phone_number_2, Address, user_type, acc_status)
                VALUES ('$username', '$pwd', '$name','$Lname', '$email', '$mobileno1', '$mobileno2', '$address', '$usertype', '$acc_status');";
        
        $result = mysqli_query($connection, $sql);
        if($result)
        {
            echo "added";
        }

    }
// Add Employee and insert initial salary
if(isset($_POST['Addemployee'])) {
    echo "Clicked";
    $name = $_POST['Name'];
    $Lname = "";
    $username = $_POST['UserName'];
    $email = $_POST['mail'];
    $mobileno1 = $_POST['mobileno1'];
    $mobileno2 = $_POST['mobileno2'];
    $address = $_POST['address'];
    $usertype = "employee"; // Changed to employee
    $pwd = $_POST['Password'];
    $acc_status = "active";

    // Insert into user_info table
    $sql = "INSERT INTO user_info (username, password, first_name, last_name, Email, Phone_number_1, Phone_number_2, Address, user_type, acc_status)
            VALUES ('$username', '$pwd', '$name','$Lname', '$email', '$mobileno1', '$mobileno2', '$address', '$usertype', '$acc_status');";
    
    $result = mysqli_query($connection, $sql);
    
    if($result) {
        echo "Employee added";

        // After adding employee, insert into employee_salary table with initial salary
        $sqlSalary = "INSERT INTO employee_salary (username, total_salary) VALUES ('$username', 0)";
        $resultSalary = mysqli_query($connection, $sqlSalary);

        if ($resultSalary) {
            echo "Salary initialized for employee: $username";
        } 
        else {
            echo "Error initializing salary for employee.";
        }
    } 
    else {
        echo "Error adding employee.";
    }
}

// Store Salary when calculated
if (isset($_POST['salary']) && isset($_POST['employeeUsername'])) {
    $salary = $_POST['salary'];
    $employeeUsername = $_POST['employeeUsername'];

    // Update the employee's salary in the database
    $stmt = $connection->prepare("UPDATE employee_salary SET total_salary = ? WHERE username = ?");
    $stmt->bind_param("ds", $salary, $employeeUsername);

    if ($stmt->execute()) {
        echo "Salary successfully stored in the database.";
    }
    else {
        echo "Error storing salary.";
    }
}

// Close the connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    
    <link rel="stylesheet" href="CSS/manager.css">

    <script src="JS/manager.js"> </script>

    <title>Managerdashbord</title>
</head>

<body>
    <!-- include the header file -->
    <?php include('header.php'); ?>

    <div class="hello">
            <h1>Hello <?php echo $_SESSION['first_name']; ?> !</h1>
        </div>
            </div>
    <br>
 <!-- Active Or Remove Part -->
            <div class="addremove">
                <div class="removeborder">
                    <form method="POST" action="managerdash.php">
                        <h2>Admin-Employee</h2>
<<<<<<< Updated upstream
                        <input type="text" name="Searchbox" placeholder="Admin Id" required>
=======
                        <input type="text" name="Searchbox" placeholder="Username :" required>
>>>>>>> Stashed changes
                        <button type="submit" name="check" class="check">Check</button>
                        <p>Account status : <?php echo $accountStatus ?> </p>
                        <center>
                            <button type="submit" name="activate" class="active">Activate</button>
                            <button type="submit" name="delete" class="remove">Remove</button>
                        </center>
                    </form>
                </div>
            </div>
    <br>
    <br>

 <!-- New Add Part -->
            <div class="addpart">
                <div class="form">
                    <form method="POST" action="managerdash.php">
                        <h2>Add Admin</h2>
                        <p>Name :</p>
                        <input type="text"   placeholder="Admin name" name="Name" >
                        <p>Admin username :</p>
                        <input type="text"   placeholder="Admin Id" name="UserName">
                        <p>Password :</p>
                        <input type="password"   placeholder="Admin Password" name="Password" >
                        <p>E mail :</p>
                        <input type="email"  placeholder="example@gmail.com" name="mail" >
                        <p>Phone Number 1 :</p>
                        <input type="tel" placeholder="0xxxxxxxx" name="mobileno1" >
                        <p>Phone Number 2 :</p>
                        <input type="tel" placeholder="0xxxxxxxx" name="mobileno2">
                        <p>Address :</p>
                        <input type="text"  placeholder="Address of the admin" name="address" >
                        <input type="hidden" value="admin" name="usertyp">
                        <br>
                        <br>
                        <input type="submit" class="sbutton" name="Addemployee" placeholder="Add Admin">
                        <input type="reset"  class="rbutton"placeholder="Reset">
                    </form>
                </div>

                <div class="form">
                    <form method="POST" action="managerdash.php">
                        <h2>Add Employee</h2>
                        <p>Name :</p>
                        <input type="text"   placeholder="Employee name" name="Name">
                        <p>Employee username :</p>
                        <input type="text"   placeholder="Employee Id" name="UserName">
                        <p>Password :</p>
                        <input type="password"   placeholder="Admin Password" name="Password">
                        <p>E mail :</p>
                        <input type="email"  placeholder="example@gmail.com" name="mail">
                        <p>Phone Number 1 :</p>
                        <input type="tel" placeholder="0xxxxxxxx" name="mobileno1">
                        <p>Phone Number 2 :</p>
                        <input type="tel" placeholder="0xxxxxxxx" name ="mobileno2">
                        <p>Address :</p>
                        <input type="text"  placeholder="Address of the employee" name="address">
                        <input type="hidden" value="admin" name="usertyp">
                        <br>
                        <br>
                        <input type="submit" class="sbutton" name="Addemployee" placeholder="Add Employee">
                        <input type="reset"  class="rbutton"placeholder="Reset">
                    </form>
                </div>
            </div>
    <br>  

    <!--Salary Calculation Part-->
    <div class="salarycal">
    <h2>Employee Salary Calculation </h2>
    <div class="separate-display">
        <form onsubmit="return false;">
            <div class="salform">
                <p>Employee username :</p>
                <input type="text" id="employeeUsername" placeholder="Employee username" required>
                <p>Working Days :</p>
                <input type="number" id="days" min="1" placeholder="Days" required>
                <p>Working Hours :</p>
                <input type="number" id="hours" min="0" placeholder="Hours" required>
                <p>Hour Rate :</p>
                <input type="number" id="rate" min="0" placeholder="Hour Rate" required>
                <br><br>
                <button type="submit" class="scalculate" onclick="calculateSalary()">Calculate</button>
            </div>
        </form>

        <div class="sal-display">
            <h3>Salary:</h3>
            <h2 id="salary">Rs.0.00</h2>
            <button class="addbase" onclick="storeSalary()">Add to Data Base</button>
        </div>
    </div>
</div>
            
</body>
</html>
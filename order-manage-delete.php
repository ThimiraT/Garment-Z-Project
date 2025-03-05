<?php
    include 'config.php';

    if(isset($_GET['deleteid']))
    {
        $oid = mysqli_real_escape_string($connection, $_GET['deleteid']);

        $sqlQuery = "DELETE FROM orders WHERE Order_ID = $oid";
        $result = mysqli_query($connection, $sqlQuery);

        if($result)
        {
            header('Location: order-management.php');
        }
        else{
            die(mysqli_error($connection));
        }
    }
?>
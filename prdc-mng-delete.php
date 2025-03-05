<?php
    include 'config.php';
        
    if(isset($_GET['deleteid'])){
        $no = mysqli_real_escape_string($connection, $_GET['deleteid']);

        $sql="DELETE FROM products WHERE Product_ID=$no";
        $result=mysqli_query($connection,$sql);
    
        if($result){
            header('Location:product-mng.php');
        }
        else{
            die(mysqli_error($connection));
        }
    }
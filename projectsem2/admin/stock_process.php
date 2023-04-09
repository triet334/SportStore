<?php

    session_start();
    $unique_id=$_GET['unique_id'];
    include 'config_admin.php';
    $query=mysqli_query($con,"select * from admin where unique_id='$unique_id'");
    $admin=mysqli_fetch_row($query);
    if($admin[12]==$unique_id){
        $_SESSION['admin_code']=$admin[1];
        $_SESSION['admin_pass']=$admin[2];
        $_SESSION['admin_avatar']=$admin[11];
        $_SESSION['gender']=$admin[5];
        $_SESSION['admin_lname']=$admin[4];
        $_SESSION['admin_fname']=$admin[3];
        $_SESSION['admin_email']=$admin[6];
        $_SESSION['admin_phone']=$admin[7];
        $_SESSION['admin_dob']=$admin[8];
        $_SESSION['admin_doj']=$admin[9];
        $_SESSION['admin_status']=$admin[10];
        $_SESSION['unique_id']=$admin[12];
        header('Location:stock.php');
    }
    else{
        echo "<script>alert('Admin invalid')</script>";
        echo "<script>window.location.assign('login.php')</script>";
    }
?>
<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config_admin.php";
    $admin= $_GET['logout_id'];
    $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);
    if(isset($logout_id)){
        $sql = mysqli_query($con, "update admin set unique_id = null  WHERE unique_id='$admin'");
        if($sql){
            session_unset();
            session_destroy();
            header("location:login.php");
        }
    }
}else{  
    header("location:login.php");
}

?>
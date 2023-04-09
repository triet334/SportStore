<?php
session_start();
if(isset($_SESSION['login']['username'])){
    include_once "config.php";
    $user= $_GET['logout_id'];
    $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);
    if(isset($logout_id)){
        $sql = mysqli_query($con, "update admin set unique_id = null  WHERE unique_id='$user'");
        if($sql){
            session_unset();
            session_destroy();
            header("location:index.php");
        }
    }
}else{  
    header("location:login.php");
}

?>
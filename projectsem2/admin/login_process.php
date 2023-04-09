<?php
session_start();
include 'config_admin.php';

if (isset($_POST['admin_code'], $_POST['admin_pass'])) {
    $admin_code = $_POST['admin_code'];
    $admin_pass = $_POST['admin_pass'];
    $query = mysqli_query($con, "select * from admin where admin_code='$admin_code' ");
    $admin = mysqli_fetch_row($query);
    if ($admin_code === $admin[1] && $admin_pass === $admin[2]) {

        $ran_id = md5(mt_rand(10000, 90000));
        $query3 = mysqli_query($con, "update admin set unique_id='$ran_id' where admin_code='$admin_code'");
        $_SESSION['admin_code'] = $admin_code;
        $_SESSION['admin_avatar'] = $admin[11];
        $_SESSION['gender'] = $admin[5];
        $_SESSION['admin_fname'] = $admin[3];
        $_SESSION['unique_id'] = $ran_id;
        header("location:staff.php");
    } else {
        echo "<script>alert('Wrong ID or Password')</script>";
        echo "<script>window.location.assign('login.php')</script>";
    }
} elseif ($_GET['unique_id']) {
    $unique_id = $_GET['unique_id'];
    $query = mysqli_query($con, "select * from admin where unique_id='$unique_id'");
    $admin = mysqli_fetch_row($query);
    $_SESSION['admin_code'] = $admin[1];
    $_SESSION['admin_avatar'] = $admin[11];
    $_SESSION['gender'] = $admin[5];
    $_SESSION['admin_fname'] = $admin[3];
    $_SESSION['unique_id'] = $admin[12];
    header("location:staff.php");
}
// $ran_id=rand(time(),1000000000);
// $query2=mysqli_query($con,"update admin set admin_status ='$status', unique_id='$ran_id' where admin_code='$admin_code'");
?>
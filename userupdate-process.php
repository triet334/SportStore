<?php
session_start();
// dùng để kết nối tới database
include_once("config.php");

if (isset($_SESSION['login']['username'])) {
} else {
    header("location:index.php");
}

if (isset($_POST["submit"])) {
    $user_id = $_SESSION['login']['username'];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    //Tạo biến chứa câu lệnh Insert SQL
    $sql = "Update user
            Set first_name = '$first_name', last_name = '$last_name', gender = '$gender', phone = '$phone'
            Where user_id = '$user_id'
            ";
    $stmt = mysqli_prepare($con, $sql);
    //Set giá trị cho các tham số
    if (mysqli_stmt_execute($stmt) > 0) {
        $messageSuccess = "Update successfull!";
        echo "<script type='text/javascript'>alert('$messageSuccess');</script>";
        header("location:user-detail.php");
        
    } else {
        $messageFail = "Fail!";
        echo "<script type='text/javascript'>alert('$messageFail');</script>";
    }
}
<?php
include 'config_admin.php';
if (isset($_POST['update'])) {
    $admin_code=$_POST['admin_code'];
    $admin_pass = $_POST['admin_pass'];
    $admin_email = $_POST['email'];
    $admin_phone = $_POST['phone'];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));
    $extension = array('jpeg', 'jpg', 'png');
    if (in_array($file_ext, $extension) === false) {
        $errors[] = 'Only jpeg, jpg,png';
    }
    if ($file_size > 2097152) { //2mb
        $errors[] = "file size <= 2mb";
    }

    $target = 'pic/admin/' . basename($file_name);
    $sql = "update admin set password='$admin_pass',admin_email='$admin_email',admin_phone='$admin_phone',admin_avatar='$file_name' where admin_code='$admin_code'";
    if ($errors == null) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo '<script> alert("Upload sucess.")</script>';
        } else {
            '<script> alert("Upload fail.")</script>';
        }
    } else {
        echo implode(' ', $errors);
    }
    $sql = "update admin set password='$admin_pass',admin_email='$admin_email',admin_phone='$admin_phone',admin_avatar='$file_name' where admin_code='$admin_code'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("Location:staff.php");
    } else {
        echo 'update fail';
    }
}

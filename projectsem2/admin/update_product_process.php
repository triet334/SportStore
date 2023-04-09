<?php
include 'config_admin.php';
if (isset($_POST['admin_code'])) {
    $admin_code = $_POST['admin_code'];
    $p_id = $_POST['p_id'];
    $p_name = $_POST['product_name'];
    $c_id = $_POST['category'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $gender = $_POST['gender'];
    $discount_id = $_POST['discount'];

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
    $target = 'pic/product/' . basename($file_name);
    if ($errors == null) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo '<script> alert("Upload sucess.")</script>';
        } else {
            '<script> alert("Upload fail.")</script>';
        }
    } else {
        echo implode(' ', $errors);
    }
}
$sql="update product
    set product_name='$p_name',cate_id='$c_id',price='$price',discount_id='$discount_id',product_image='$file_name',unit='$unit',gender='$gender',admin_confirm='$admin_code'
    where product_id='$p_id'";

if($query=mysqli_query($con,$sql)){
    header("Location:success.php");
}
else {
    echo "fail";
}


?>
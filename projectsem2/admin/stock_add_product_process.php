<?php
include 'config_admin.php';
if(isset($_POST['submit'])){
    $name= $_POST['product_name'];
    $cate=$_POST['category'];
    $discount=$_POST['discount'];
    $price=$_POST['price'];
    $unit=$_POST['unit'];
    $gender=$_POST['gender'];
    $admin_code=$_POST['admin_code'];
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
    $product_id=$ran_id = md5(mt_rand(10000, 90000));
    date_default_timezone_set('Asia/Bangkok');
    $date=date('Y-m-d H:i:s');
    if($discount!="null"){
    $sql="insert into product(product_id,product_name,cate_id,price,discount_id,product_image,unit,gender,create_at,admin_confirm) values ('$product_id','$name','$cate','$price','$discount','$file_name','$unit','$gender','$date','$admin_code');";
    
    }else{
        $sql="insert into product(product_id,product_name,cate_id,price,product_image,unit,gender,create_at,admin_confirm) values ('$product_id','$name','$cate','$price','$file_name','$unit','$gender','$date','$admin_code');";

    }$query=mysqli_query($con,$sql);
    if ($query) {
        header("Location:success.php");
    } else {
        echo 'update fail';
    }

}

?>
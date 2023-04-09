<?php 
include 'config_admin.php';
if(isset($_POST['submit'])){
    $admin_code=$_POST['admin_code'];
    $p_id=$_POST['p_id'];
    $p_name=$_POST['p_name'];
    $c_id=$_POST['c_id'];
    $price=$_POST['price'];
    $p_image=$_POST['p_image'];
    $unit=$_POST['unit'];
    $gender=$_POST['gender'];
    $reason=$_POST['reason'];
}
date_default_timezone_set('Asia/Bangkok');
$date=date('Y-m-d H:i:s');
$sql="delete from product where product_id='$p_id'";
$sql2="insert into deleted_product (product_id,product_name,cate_id,price,product_image,unit,gender,reason,create_at) values ('$p_id','$p_name','$c_id','$price','$p_image','$unit','$gender','$reason','$date') ";

if($query=mysqli_query($con,$sql)){
    if($query2=mysqli_query($con,$sql2)){
        header("Location:success.php");
    }
}else if(!$query1){
    echo 'Product is on progress. Cannot delete.';
}
    

?>
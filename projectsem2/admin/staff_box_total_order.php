<?php
include 'config_admin.php';
$sql_total_order="select count(order_id) as result from order_detail";
$query_total_order=mysqli_query($con,$sql_total_order);
$count_total_order=mysqli_fetch_assoc($query_total_order);
echo $count_total_order['result'];
?>
<?php
include "config_admin.php";
if (isset($_GET['id'])) {
    if ($_GET['id'] != null) {
        $id = $_GET['id'];
        $sql = "select user_id,phone,email from user where (user_id like '%$id%' or phone like '%$id%' or email like '%$id%')";
        $query = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_row($query)) {
            echo "<li ><a href='customer_info.php?id=$data[0]' target='_blank'>$data[0]-$data[1]-$data[2]</a></li>";
        }
    }else{
        return false;
    }
}
?>
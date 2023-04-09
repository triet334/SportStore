<?php
    include 'config_admin.php';
    $sql_total_admin="select count(admin_code) as result from admin where unique_id is not null ";
    $query_total_admin=mysqli_query($con,$sql_total_admin);
    if(mysqli_num_rows($query_total_admin)==0){
        echo 'No admin online';
    }else{
    $count_total_admin=mysqli_fetch_assoc($query_total_admin);
    echo $count_total_admin['result'];
    }
    
                        
?>
<?php
    include 'config_admin.php';
    $sql_customer="select count(user_id) as result
                    from user";
    $query=mysqli_query($con,$sql_customer);
    $data=mysqli_fetch_assoc($query);
    echo $data['result'];

?>
<?php

    session_start();
    include_once "config_admin.php";
    if(!isset($_SESSION['admin_code'])){
        header("location:admin_chat.php");
    }else{
    $outgoing_id = $_SESSION['admin_code'];
    
    
    $sql_noti = "select * from admin left join chat 
    on admin.admin_code=chat.outgoing_msg_id 
    WHERE not admin_code = '$outgoing_id' and chat.msg_status='new' 
    ORDER BY admin_id DESC";
    $sql = "select * from admin WHERE not admin_code = '$outgoing_id' ORDER BY admin_id DESC";

    
    $query_noti=mysqli_query($con, $sql_noti);
    $query = mysqli_query($con, $sql);
    $output="";
    if(mysqli_num_rows($query) == 0){
        $output .= "No new messages";
    }elseif(mysqli_num_rows($query) > 0){
        include "data_msg.php";
    }
    
    echo $output;
}
?>
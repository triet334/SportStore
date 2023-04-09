<?php

    session_start();
    include_once "config_admin.php";
    
    $outgoing_id = $_SESSION['admin_code'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM admin WHERE NOT admin_code = '$outgoing_id' AND (admin_fname LIKE '%$searchTerm%' OR admin_lname LIKE '%$searchTerm%') ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data_msg.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>
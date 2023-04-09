<?php 

    session_start();
    if(isset($_SESSION['admin_code'])){
        include_once "config_admin.php";
        $outgoing_id = $_SESSION['admin_code'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        mysqli_query($con, "update chat set msg_status='old' where (incoming_msg_id='$outgoing_id' and outgoing_msg_id='$incoming_id' and msg_status='new')");

        $message = mysqli_real_escape_string($con, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO chat (incoming_msg_id, outgoing_msg_id, msg,msg_status)
                                        VALUES ('$incoming_id', '$outgoing_id', '$message','new')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>
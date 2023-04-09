<?php 
    $errors = array (
        //thông báo thành công
        1=> "Your payment success!!",
        //thông báo thất bại
        2=> "Error. Pls check query!!!",
    );
    $error_id = isset($_GET['msg'])?(int)$_GET['msg']:0;
    if($error_id !=0 && in_array($error_id,[1,2])){
        echo $errors[$error_id];
    }   else {
        echo "The purchase history";
    }

?>
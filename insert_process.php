<?php

    //kết nối database
    include 'config.php';
    if (isset($_POST['btn'])) {
        $OID = $_POST['OID'];
        $UID = $_POST['UID'];
        $OT = $_POST['OT'];
        $PID = $_POST['EM'];
        $OST = $_POST['OST'];
        $ORS = $_POST['PN'];
        $PMT = $_POST['PMT'];
        $ADR = $_POST['ADR'];
        $Unit = "$";
        $dem = $_POST['dem'];
        for ($i = 0; $i < $dem; $i++) {
            $data[$i] = $_POST["t" . $i];
        }
        print_r($data);
        for ($i = 0; $i < $dem; $i++) {
            mysqli_query($con, "Insert into order_item (order_id,product_id,quantity) values('$OID','$data[$i]',1)");
        }
        $query = "Insert into order_detail (order_id,user_id,order_total,payment_id,order_status,
            payment_method,address_delivery,unit) 
            Values ('$OID','$UID','$OT','$PID','$OST','$PMT','$ADR','$Unit')";
        //xét điều kiện để xuất thông báo
        if (mysqli_query($con, $query)) {
            $msg = 1;
        } else {
            $msg = 2;
        }
        header("location:payment.php?msg=" . $msg . "");
    }
?>

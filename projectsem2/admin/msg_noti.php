<?php
include 'config_admin.php';
if (isset($_GET['admin_code'])) {

    $admin_code = $_GET['admin_code'];
    // $sql="select count(msg_status) as result from chat where incoming_msg_id='$admin_code'";
    $sql = "select * from chat where (incoming_msg_id='$admin_code' and msg_status='new')";

    $query = mysqli_query($con, $sql);
    // $data=mysqli_fetch_assoc($query);
    // echo $data['result'];

    $arr = array();
    $x = 0;
    while ($row = mysqli_fetch_assoc($query)) {
        $arr[$x]['outgoing_msg_id'] = $row['outgoing_msg_id'];
        $x++;
    }
    $count=0;
    $empty = "";
    foreach ($arr as $rs) {
        if ($rs != $empty) {
            $empty=$rs;
            $count++;
        }
        
    }
    echo $count;
} else {
    header("Location:login.php");
}
?>
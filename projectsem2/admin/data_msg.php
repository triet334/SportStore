<?php
while ($row = mysqli_fetch_assoc($query)) {
    $temp=$row['admin_code']; 
    $sql2 = "select * from chat where (incoming_msg_id = '$temp'
                or outgoing_msg_id = '$temp') and (outgoing_msg_id = '$outgoing_id' 
                or incoming_msg_id = '$outgoing_id') order by msg_id DESC LIMIT 1";
    $query2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['outgoing_msg_id'])) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    } else {
        $you = "";
    }
    ($row['unique_id'] == null) ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['admin_code']) ? $hid_me = "hide" : $hid_me = "";
    if(isset($row2['msg_status'])&&$row2['msg_status']=='new'&&($row2['outgoing_msg_id']==$temp)){
        $output .= '<a style="text-decoration:none;" href="chat_box.php?admin_code=' . $row['admin_code'] . '">
                    <div class="content">
                    <img src="pic/admin/' . $row['admin_avatar'] . '" alt="">
                    <div class="details">
                        <span>' . ucwords($row['admin_fname']) . " " . ucwords($row['admin_lname']) . '</span>
                        <p style="color:blue;">' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
    }else{
    $output .= '<a style="text-decoration:none;" href="chat_box.php?admin_code=' . $row['admin_code'] . '">
                    <div class="content">
                    <img src="pic/admin/' . $row['admin_avatar'] . '" alt="">
                    <div class="details">
                        <span>' . ucwords($row['admin_fname']) . " " . ucwords($row['admin_lname']) . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
    }
}
?>
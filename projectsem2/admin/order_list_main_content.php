<?php
include 'config_admin.php';
if (isset($_GET['unique_id'])) {
    $unique_id = $_GET['unique_id'];
    $admin_code = $_GET['admin_code'];
} else {
    echo 'fail';
}
if ($_GET['show'] != null && $_GET['search_term'] != null) {
    $search_term = $_GET['search_term'];
    $max_order_show = $_GET['show'];
    $sql_order_list_main_content = "select 
    o.order_id,o.user_id,o.order_total,o.payment_id,o.create_at,o.order_status,o.order_reason,a.admin_lname,a.admin_fname,o.payment_method,o.address_delivery 
    from order_detail as o 
    left join admin as a on a.admin_code=o.admin_confirm 
    where (o.order_id like '%$search_term%' or o.user_id like '%$search_term%' or o.order_total like '%$search_term%' or o.payment_method like '%$search_term%' or o.create_at like '%$search_term%' or o.order_status like '%$search_term%' or o.order_reason like '%$search_term%' or a.admin_lname like '%$search_term%' or a.admin_fname like '%$search_term%') order by o.create_at DESC limit $max_order_show";
} else if ($_GET['show'] == null && $_GET['search_term'] != null) {
    $search_term = $_GET['search_term'];
    $sql_order_list_main_content = "select 
    o.order_id,o.user_id,o.order_total,o.payment_id,o.create_at,o.order_status,o.order_reason,a.admin_lname,a.admin_fname,o.payment_method,o.address_delivery
    from order_detail as o 
    left join admin as a on a.admin_code=o.admin_confirm 
    where (o.order_id like '%$search_term%' or o.user_id like '%$search_term%' or o.order_total like '%$search_term%' or o.payment_method like '%$search_term%' or o.create_at like '%$search_term%' or o.order_status like '%$search_term%' or o.order_reason like '%$search_term%' or a.admin_lname like '%$search_term%' or a.admin_fname like '%$search_term%') 
    order by o.create_at DESC";
} else if ($_GET['show'] != null && $_GET['search_term'] == null) {
    $max_order_show = $_GET['show'];
    $sql_order_list_main_content = "select o.order_id,o.user_id,o.order_total,o.payment_id,o.create_at,o.order_status,o.order_reason,a.admin_lname,a.admin_fname,o.payment_method,o.address_delivery from order_detail as o left join admin as a on a.admin_code=o.admin_confirm order by o.create_at DESC limit $max_order_show";
} else {
    $sql_order_list_main_content = "select o.order_id,o.user_id,o.order_total,o.payment_id,o.create_at,o.order_status,o.order_reason,a.admin_lname,a.admin_fname,o.payment_method,o.address_delivery from order_detail as o left join admin as a on a.admin_code=o.admin_confirm order by o.create_at DESC";
}

$query_order_list_main_content = mysqli_query($con, $sql_order_list_main_content);
echo "<thead class='thead-dark'>
<tr>
<th>Order id</th>
<th>User id</th>
<th>Order total</th>
<th>Payment method</th>
<th>Order item</th>
<th>Create at</th>
<th>Order status</th>
<th>Admin</th>
<th>Order detail</th>
<th>Confirm</th>
<th>Cancel</th>
</tr>
</thead>";
while ($order_list_main_content = mysqli_fetch_array($query_order_list_main_content)) {
    $reason = '';
    $longstring1 = substr($order_list_main_content[6], 28, strlen($order_list_main_content[6]));
    $longstring = substr($order_list_main_content[6], 0, 28) . "<span id='dots'>...</span><span id='more'>$longstring1</span>";
    echo "<tbody>
    <tr>
    <td>$order_list_main_content[0]</td>
    <td>$order_list_main_content[1]</td>
    <td>$order_list_main_content[2]</td>
    <td>$order_list_main_content[9]</td>
    <td style='text-align:center;'><a href='order_item.php?order_id=$order_list_main_content[0]&payment_id=$order_list_main_content[3]&method=$order_list_main_content[9]&address=$order_list_main_content[10]'target='_blank'><i class='fas fa-eye' style='font-size: 1.5em;padding-top:8px;'></a></td>
    <td>$order_list_main_content[4]</td>
    <td>$order_list_main_content[5]</td>
    <td>" . ucwords($order_list_main_content[8]) . " " . ucwords($order_list_main_content[7]) . "</td>";
    if ($order_list_main_content[5] == 'Completed') {
        echo "<td><a href='external_order_detail.php?order_id=$order_list_main_content[0]'  class='btn btn-primary'>Order detail</a></td>
        <td class='action'>";
        echo "<td></td>";
    } elseif ($order_list_main_content[5] == 'Canceled') {

        if (strlen($order_list_main_content[6]) > 28) {
            echo "<td colspan='3'><p>$longstring <a href='full_reason.php?reason=$order_list_main_content[6]' target='_blank' id='seemorebtn'>Read more</a></p></td>";
        } else {
            echo "<td colspan='3'><p>$order_list_main_content[6]</p></td>";
        }
    } else {
        echo "<td><a href='external_order_detail.php?order_id=$order_list_main_content[0]'  class='btn btn-primary'>Order detail</a></td>
        <td class='action'>";
        echo "<a href='confirmBTN.php?order_id=$order_list_main_content[0]&unique_id=$unique_id&admin_code=$admin_code'><button class='btn btn-success'>Confirm</button></a>
    </td>
    <td>
    <a href='cancelBTN.php?order_id=$order_list_main_content[0]&unique_id=$unique_id&admin_code=$admin_code'>
    <button class='btn btn-danger'>Cancel</button></a>
    </td>";
        echo "</tr>
</tbody>";
    }
}
?>

<html>
<style>
    #more {
        display: none;
    }

    #seemorebtn {
        border-radius: 5px;
    }
</style>
</html>
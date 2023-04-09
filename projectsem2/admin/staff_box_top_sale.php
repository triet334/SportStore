<?php
include "config_admin.php";
$sql = "select p.product_name,oi.quantity
    from order_detail as od
    left join order_item as oi on od.order_id=oi.order_id
    left join product as p on oi.product_id=p.product_id
    where od.order_status='Completed'";
$query = mysqli_query($con, $sql);
$arr = [];
$i = 0;
while ($data = mysqli_fetch_assoc($query)) {
    $arr[$i]['product_name'] = $data['product_name'];
    $arr[$i]['quantity'] = $data['quantity'];
    $i++;
}
for ($i = 0; $i < sizeof($arr); $i++) {
    $temp_name = '';
    $temp_quantity = '';
    $n = 0;
    for ($z = $i + 1; $z < sizeof($arr); $z++) {
        if ($arr[$i]["product_name"] == $arr[$z]["product_name"]) {
            $temp_name = $arr[$z]["product_name"];
            $temp_quantity = $arr[$z]["quantity"];

            $arr[$z]["product_name"] = $arr[$i + 1 + $n]["product_name"];
            $arr[$z]["quantity"] = $arr[$i + 1 + $n]["quantity"];

            $arr[$i + 1 + $n]["product_name"] = $temp_name;
            $arr[$i + 1 + $n]["quantity"] = $temp_quantity;

            $n++;
        }
    }
}
$finale = [];
$temp_name = '';
$temp_quantity = 0;
$n = 0;
for ($i = 0; $i < sizeof($arr); $i++) {

    if ($temp_name == $arr[$i]["product_name"]) {
        $temp_quantity = $temp_quantity + $arr[$i]["quantity"];
    } else {
        $finale[$n]["product_name"] = $temp_name;
        $finale[$n]["quantity"] = $temp_quantity;
        $temp_name = $arr[$i]["product_name"];
        $temp_quantity = $arr[$i]["quantity"];
        $n++;
        $finale[$n]["product_name"] = $temp_name;
        $finale[$n]["quantity"] = $temp_quantity;
    }
}

for ($i = 0; $i < sizeof($finale); $i++) {
    $swapped = false;
    for ($j = 0; $j < sizeof($finale) - $i - 1; $j++) {
        if ($finale[$j]["quantity"] < $finale[$j + 1]["quantity"]) {
            $t1 = $finale[$j]['product_name'];
            $t2 = $finale[$j]["quantity"];

            $finale[$j]["product_name"] = $finale[$j + 1]["product_name"];
            $finale[$j]["quantity"] = $finale[$j + 1]["quantity"];

            $finale[$j + 1]["product_name"] = $t1;
            $finale[$j + 1]["quantity"] = $t2;

            $swapped = true;
        }
    }
    if ($swapped == false)
        break;
}

if (sizeof($finale) != 0) {
    for ($i = 0; $i < sizeof($finale)-1; $i++) {
        echo "<li>
        <a href='#'>
        <span class='product'>" . $finale[$i]["product_name"] . "</span>
        </a>
        <span class='price'>" . $finale[$i]["quantity"] . "</span>
        <li>";
    }
}else{
    echo "<span>No data to show</span>";
}
?>

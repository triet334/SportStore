<?php
include 'config_admin.php';
if (isset($_GET['order_id'])&&isset($_GET['payment_id'])&&isset($_GET['method'])&&isset($_GET['address'])) {
    $order_id = $_GET['order_id'];
    $payment_id=$_GET['payment_id'];
    $method=$_GET['method'];
    $address=$_GET['address'];
    $query = mysqli_query($con, "select o.order_id,p.product_name,o.quantity,p.price,p.discount_id,d.discount_percent,p.unit,p.product_image
    from order_item as o 
    left join product as p 
    on o.product_id=p.product_id 
    left join discount as d 
    on p.discount_id=d.discount_id
    where o.order_id='$order_id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of item</title>
    <link rel="stylesheet" href="css/cancelBTN.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <div class="wrapper" style="max-width: 1100px;">
        <label>
            <a href="order_list_process.php?unique_id=<?php echo $unique_id ?>" class="cancel-icon fas fa-times" style='text-decoration: none;'></a>
        </label>
        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        <div class="content" style="max-width: 950px;">
            <header>Order no.<?php echo $order_id; ?></header>
            <?php
                if($method=='COD'){
                    echo '<h4>Payment method: COD<h4>';
                    echo "<h4>Address: $address</h4>";
                }else{
                    echo '<h4>Payment method: MOMO<h4>';
                    echo "<h4>Payment: $payment_id</h4>";
                    echo "<h4>Address: $address</h4>";
                } 
            ?>
            <table style="border-top: 2px solid #999;border-bottom: 2px solid #999; width: 850px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>name</th>
                        <th>quantity</th>
                        <th>discount</th>
                        <th>price</th>
                    </tr>
                </thead>
                <?php
                $count = 1;
                $total = 0;
                while ($data = mysqli_fetch_row($query)) {
                    if($data[4]!=null){
                    $price_after_discount = $data[3]-(($data[3] * $data[5]) / 100);
                    $total = $price_after_discount * $data[2] + $total;
                    }else{
                        $total=$data[3]*$data[2];
                    }
                    if ($data[4] == null) {
                        echo "<tr>
                    <td>$count</td>
                    <td><img src='../admin/pic/product/$data[7]' alt='' style='width:80px;'></td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td></td>
                    <td>$data[3]</td>
                    </tr>";
                    } else {
                        echo "<tr>
                    <td>$count</td>
                    <td><img src='../admin/pic/product/$data[7]' alt='' style='width:80px;'></td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td><i class='fas fa-star' style='color:yellow;'></i>$data[5]%</td>
                    <td><i style='text-decoration:line-through;'>$data[3] $data[6]</i> $price_after_discount $data[6]</td>
                    </tr>";
                    }
                    $count++;
                    $unit=$data[6];
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php echo "<td>Total: $total $unit </td>";?>
                </tr>
            </table>
        </div>

    </div>
</body>
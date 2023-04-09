<?php
include 'config_admin.php';
session_start();
if (isset($_GET['order_id'])) {
    $_SESSION['order_id'] = $_GET['order_id'];
    $order_id = $_SESSION['order_id'];
    $query = mysqli_query($con, "select 
    o.order_id,o.user_id,o.order_total,o.payment_id,o.create_at,o.order_status,o.order_reason,a.admin_lname,a.admin_fname,p.product_name,oi.quantity,p.price,d.discount_percent,u.first_name,u.last_name,u.phone,u.email 
    from order_detail as o 
    left join admin as a 
    on a.admin_code=o.admin_confirm 
    left join order_item as oi 
    on oi.order_id=o.order_id
    left join product as p
    on p.product_id=oi.product_id
    left join discount as d
    on d.discount_id=p.discount_id
    left join user as u
    on u.user_id=o.user_id
    where o.order_id='$order_id'");
    $query2 = mysqli_query($con, "select 
    o.order_id,o.user_id,o.order_total,o.payment_id,o.create_at,o.order_status,o.order_reason,a.admin_lname,a.admin_fname,p.product_name,oi.quantity,p.price,d.discount_percent,u.first_name,u.last_name,u.phone,u.email 
    from order_detail as o 
    left join admin as a 
    on a.admin_code=o.admin_confirm 
    left join order_item as oi 
    on oi.order_id=o.order_id
    left join product as p
    on p.product_id=oi.product_id
    left join discount as d
    on d.discount_id=p.discount_id
    left join user as u
    on u.user_id=o.user_id
    where o.order_id='$order_id'");
    require_once('tcpdf/tcpdf.php');
    $external = mysqli_fetch_array($query);
    $pdf = new TCPDF('p', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->AddPage();
    $pdf->setFont('times', 'B', 30);


    $pdf->Cell(130, 30, '', 0, 1);
    $pdf->Image("../admin/pic/admin/logo_adidas.jpg",20,20,20);

    $pdf->Cell(130, 5, 'Sporties store', 0, 0);
    $pdf->Cell(59, 5, 'Invoice', 0, 1);

    $pdf->setFont('times', '', 17);
    $pdf->Cell(130, 5, '[Staff name]: ' . ucwords($external[8]) . " " .ucwords($external[7]), 0, 0);
    $pdf->Cell(59, 5, 'Invoice #:'.$external[0], 0, 1);

    $pdf->Cell(34, 5, '[Address]:', 0, 0, 'R');
    $pdf->Cell(96, 5, '49 CMT8 HCM city', 0, 0);
    $pdf->Cell(59, 5, 'Date: ' . $external[4], 0, 1);

    $pdf->Cell(34, 5, '[Phone]:', 0, 0, 'R');
    $pdf->Cell(96, 5, '09 888 777 555', 0, 1);

    $pdf->Cell(34, 5, '[Email]:', 0, 0, 'R');
    $pdf->Cell(96, 5, 'sporties@adidas.com', 0, 1);


    $pdf->Cell(34, 5, '', 0, 1);


    $pdf->Cell(34, 5, 'Bill to ' .ucwords($external[13])." ". ucwords($external[14]), 0, 1);
    $pdf->Cell(34, 5, 'ID: '.$external[1], 0, 1);
    $pdf->Cell(34, 5, 'Address: ' . $external[3], 0, 1);
    $pdf->Cell(34, 5, 'Phone: ' . $external[15], 0, 1);
    $pdf->Cell(34, 5, 'Email: ' . $external[16], 0, 1);


    $pdf->Cell(34, 5, ' ', 0, 1);

    $pdf->Cell(64, 5, 'Product name ', 1, 0);
    $pdf->Cell(25, 5, 'Quantity ', 1, 0);
    $pdf->Cell(30, 5, 'Price per ', 1, 0);
    $pdf->Cell(25, 5, 'Discount ', 1, 0);
    $pdf->Cell(15, 5, 'Unit', 1, 0);
    $pdf->Cell(30, 5, 'Amount ', 1, 1);



    while ($external2 = mysqli_fetch_array($query2)) {

        $pdf->Cell(64, 5, '' . $external2[9], 1, 0);
        $pdf->Cell(25, 5, '' . $external2[10], 1, 0);
        $pdf->Cell(30, 5, '' . $external2[11], 1, 0);
        if ($external2[12] != null) {
            $pdf->Cell(25, 5, '' . $external2[12]." %", 1, 0);
        } else {
            $pdf->Cell(25, 5, '', 1, 0);
        }
        $pdf->Cell(15, 5, '$', 1, 0);
        if ($external2[12] != null) {
            $pdf->Cell(30, 5, '' . ($external2[10] * $external2[11] * $external2[12]) / 100, 1, 1);
        } else {
            $pdf->Cell(30, 5, '' . $external2[10] * $external2[11], 1, 1);
        }
    }
    $pdf->Cell(119, 5, '', 0, 0);
    $pdf->Cell(40, 5, 'Total', 1, 0);
    $pdf->Cell(30, 5, '' . $external[2], 1, 1);

    $pdf->Cell(105, 30, '', 0, 1);
    $pdf->Cell(105, 5, '', 0, 0);
    $pdf->Cell(30, 5, '.........., Date....month....year...',0 , 1);
    $pdf->Cell(130, 5, '', 0, 0);
    $pdf->Cell(30, 5, 'Signature',0 , 1);



    $pdf->Output('Invoice_no_'.$external[0].".pdf","D");
} else {
    echo 'something wrong';
}
header('Location:order_list.php');

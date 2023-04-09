<?php
    include 'config_admin.php';
    $sql_recent_sale_board = "select * from order_detail Limit 5";
    $query_recent_sale_board = mysqli_query($con, $sql_recent_sale_board);
    echo '
    <thead >
    <th class="topic">Date</th>
    <th class="topic">Customer</th>
    <th class="topic">Order status</th>
    <th class="topic">Total</th>
    </thead>';
    while ($recent_sale_board = mysqli_fetch_array($query_recent_sale_board)) {
    echo "
    <tbody>
    <td> $recent_sale_board[4] </td>
    <td> $recent_sale_board[1] </td>
    <td> $recent_sale_board[6] </td>
    <td> $recent_sale_board[2] </td>
    </tbody>
    ";
    }
                            
 ?>
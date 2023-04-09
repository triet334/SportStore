<?php
include 'config_admin.php';
                        $sql_total_sale="select count(order_id) as result from order_detail where order_status='Completed'";
                        $query_total_sale=mysqli_query($con,$sql_total_sale);
                        $count_total_sale=mysqli_fetch_assoc($query_total_sale);
                        echo $count_total_sale['result'];
                        ?>
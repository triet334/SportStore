<?php
//dùng để lưu trữ sản phẩm vào giỏ hàng
session_start();

// dùng để kết nối tới database
include 'config.php';
if (isset($_SESSION['login']['username'])) {
} else {
    header("location:index.php");
}
$user_id = $_SESSION['login']['username'];
?>

<!doctype html>
<html lang="en">

<head>
    <title><?php
        echo $_SESSION['login']['username'];
        ?>'s Order</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="themify-icons/themify-icons.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="header">
        <div id="promotion">
            <div><a href="#">Free Standard Shipping & Returns</a></div>
            <div><a href="#">End Of Year Sale: Up To 40% Off Select Style</a></div>
            <div><a href="#">Easy Return</a></div>
        </div>

        <div id="navbar">
            <div id="navbar-leftside">
                <div id="logo"><a href="index2.php">
                        <img style="width: 80px;height: 60px;" src="IMG/adidas-logo.jpg" alt="">
                    </a></div>
            </div>
            <div id="navbar-mid">
                <ul>
                    <li id="men">
                        <a href="#">Men</a>
                        <ul id="men-subnav">
                            <li><a href="product-men-ru-2.php">Running</a></li>
                            <li><a href="product-men-so-2.php">Soccer</a></li>
                            <li><a href="product-men-ba-2.php">Basketball</a></li>
                            <li><a href="product-men-te-2.php">Tennis</a></li>
                        </ul>
                    </li>
                    <li id="women">
                        <a href="#">Women</a>
                        <ul id="women-subnav">
                            <li><a href="product-women-ru-2.php">Running</a></li>
                            <li><a href="product-women-so-2.php">Soccer</a></li>
                            <li><a href="product-women-ba-2.php">Basketball</a></li>
                            <li><a href="product-women-te-2.php">Tennis</a></li>
                        </ul>
                    </li>
                    <li id="policy"><a href="">Policy</a>
                        <ul id="policy-subnav">
                            <li><a href="">Payment</a></li>
                            <li><a href="">Delivery</a></li>
                            <li><a href="">Return</a></li>
                        </ul>
                    </li>
                    <li id="about"><a href="">About Us</a></li>
                </ul>
            </div>
            <div id="navbar-rightside">
                <a href="cart2.php">
                    <li class="ti-shopping-cart"></li>
                </a>

                <div id="user-wrapper">
                    <a href="#">
                        <?php
                        echo $_SESSION['login']['username'];
                        ?>
                    </a>
                    <ul id="user">
                        <li><a href="user-detail.php">Your Account</a></li>
                        <li><a href="payment.php">Your Order</a></li>
                        <li><a href="logout.php?logout_id=<?php echo $_SESSION['login']['username'] ?>"> Log Out</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row">

            <div style="margin-top: 200px;" class="col-md-12">
                <div class="alert alert-warning alert=dismissible fade show " role="alert">
                    <?php include 'msg.php' ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            </div>

            <div class="col-md-12">

                <div class="float-left">
                    <h1>The purchase history</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order_id</th>
                            <th scope="col">User_id</th>
                            <th scope="col">Total_Payments</th>
                            <th scope="col">Email</th>
                            <th scope="col">Order_status</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Payment_method</th>
                            <th scope="col">Address_delivery</th>
                            <th scope="col">Unit</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include 'config.php';
                        $query = "Select * from order_detail where user_id = '$user_id'";
                        $result = mysqli_query($con, $query);
                        ?>
                        <?php if ($result->num_rows > 0) : ?>
                            <?php while ($array = mysqli_fetch_row($result)) : ?>
                                <tr>
                                    <th scope="row"><?php echo $array[0]; ?> </th>
                                    <td><?php echo $array[1] ?></td>
                                    <td><?php echo $array[2] ?></td>
                                    <td><?php echo $array[3] ?></td>
                                    <td><?php echo $array[6] ?></td>
                                    <td><?php echo $array[7] ?></td>
                                    <td><?php echo $array[9] ?></td>
                                    <td><?php echo $array[10] ?></td>
                                    <td><?php echo $array[11] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" rowspan="2" header="">No Data</td>
                            </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
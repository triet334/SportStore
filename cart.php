<?php
//dùng để lưu trữ sản phẩm vào giỏ hàng
session_start();

// dùng để kết nối tới database
include 'config.php';

//dùng để xóa sản phẩm khỏi giỏ hàng, trên nút remove
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
if (isset($_POST['submit'])) {
    $id = $_POST['username'];
    $password = $_POST['password'];
    $query = "select user_id,user_password from user where user_id = '$id';";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_array();
    if ($password === $row['user_password'] && $id === $row['user_id']) {
        $LoginSuccessfull = "Login Successful";
        echo "<script type='text/javascript'>alert('$LoginSuccessfull');</script>";
        $_SESSION['login']['username'] =  $_POST['username'];
        header("location:cart2.php");
    } else {
        $LoginFail = "Username or Password is incorrect!";
        echo "<script type='text/javascript'>alert('$LoginFail');</script>";
    }
    mysqli_free_result($result);
    mysqli_close($con);
}
?>
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="themify-icons/themify-icons.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="main">
        <div id="header">
            <div id="promotion">
                <div><a href="">Free Standard Shipping & Returns</a></div>
                <div><a href="">End Of Year Sale: Up To 40% Off Select Style</a></div>
                <div><a href="signup.php">Become A Member | Join now</a></div>
            </div>

            <div id="navbar">
                <div id="navbar-leftside">
                    <div id="logo"><a href="index.php">
                            <img style="width: 80px;height: 60px;" src="IMG/adidas-logo.jpg" alt="">
                        </a></div>
                </div>
                <div id="navbar-mid">
                    <ul>
                        <li id="men">
                            <a href="">Men</a>
                            <ul id="men-subnav">
                                <li><a href="product-men-ru.php">Running</a></li>
                                <li><a href="product-men-so.php">Soccer</a></li>
                                <li><a href="product-men-ba.php">Basketball</a></li>
                                <li><a href="product-men-te.php">Tennis</a></li>
                            </ul>
                        </li>
                        <li id="women">
                            <a href="">Women</a>
                            <ul id="women-subnav">
                                <li><a href="product-women-ru.php">Running</a></li>
                                <li><a href="product-women-so.php">Soccer</a></li>
                                <li><a href="product-women-ba.php">Basketball</a></li>
                                <li><a href="product-women-te.php">Tennis</a></li>
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
                    <a style="cursor: pointer;" onclick="openFormLogin()">Login</a>
                    <a href="cart.php">
                        <li class="ti-shopping-cart"></li>
                    </a>
                </div>
            </div>
        </div>
        <div onclick="closeFormLogin()" class="formlogin">
            <div onclick="stoppropagation()" class="formlogin-modal">
                <div class="formlogin-close"><i onclick=" closeFormLogin()" class="ti-close"></i></div>
                <header class="formlogin-header">
                    Log in to Sport Store
                </header>
                <hr>
                <div class="formlogin-body">
                    <form action="" method="post">
                        <input style="display: block;" name="username" type="text" placeholder="Username" class="username-input">
                        <input style="display: block;" name="password" type="password" placeholder="Password" class="username-input">
                        <button name="submit" type="submit">Login</button>
                    </form>
                </div>
                <hr>
                <div class="link-create">
                    <a href="signup.php">Create new account</a>
                </div>
            </div>
        </div>
        <!-- phần dữ liệu trong cart -->
        <div class="cart-body container-fluid">
            <div class="row">
                <!-- Card list -->
                <div class="col-md-7">
                    <div class="shopping-cart">
                        <!-- tiêu đề -->
                        <h3>Your Shopping Cart</h3>
                        <hr>
                        <!-- code php xuất dữ liệu -->
                        <?php

                        $total = 0; //biến đếm tổng số tiền


                        if (isset($_SESSION['cart'])) {

                            // đưa id vô biến tạm
                            $product_id = array_column($_SESSION['cart'], 'id');

                            //câu truy vấn sql
                            $sql = "select * from product";

                            //biến chứa câu truy vấn và kết nối tới database
                            $res = mysqli_query($con, $sql);

                            //vòng lập xuất dư liệu trong cart
                            while ($row = mysqli_fetch_assoc($res)) {
                                foreach ($product_id as $id) {
                                    if ($row['product_id'] == $id) {
                                        echo "
                                        <form action=\"cart.php?action=remove&id={$row['product_id']}\" method=\"post\" class=\"cart-items\">
                                                        <div class=\"border rounded\">
                                                            <div class=\"row bg-white\">
                                                                <div class=\"col-md-3 pl-0\">
                                                                    <img src=\"{$row['product_image']}\" class=\"img-fluid\">
                                                                </div>
                                                                <div class=\"col-md-6\">
                                                                    <h5 class=\"pt-2\">Name: {$row['product_name']}</h5>
                                                                    <p class=\"cart-product-description\">{$row['product_description']}</p>
                                                                    <h5 class=\"pt-2\">Price: {$row['price']}</h5>
                                                                    <button type=\"submit\" class=\"button-remove\" name=\"remove\">Remove</button>
                                                                </div>
                                                                <div class=\"col-md-3 py-5\">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                        ";
                                        // biến tính tổng số tiền
                                        $total = $total + $row['price'];
                                    }
                                }
                            }
                        } else {
                            echo "<h5>Cart is Empty !!!</h5>";
                        }
                        ?>

                    </div>
                </div>

                <!-- Giá tiền chi tiết Details -->
                <div class="price col-md-4 border rounded mt-5 mb-1 bg-white">
                    <div class="price-detail pt-4">

                        <h6>PRICE DETAILS</h6>
                        <hr>

                        <div class="row price-details">

                            <div class="col-md-6">
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $count  = count($_SESSION['cart']);
                                    echo "<h6>Price ($count items)</h6>";
                                } else {
                                    echo "<h6>Price (0 items)</h6>";
                                }
                                ?>
                                <h6>Delivery Charges</h6>
                                <hr>
                                <h6>Amount Payable</h6>
                            </div>
                            <div class="col-md-6">

                                <h6>$<?php echo $total; ?></h6>
                                <h6 class="text-success">FREE</h6>
                                <hr>
                                <h6>$<?php echo $total; ?></h6>

                            </div>

                        </div>

                        <hr>
                        <input type="text" placeholder="Enter your promo code" id="promocode" size="20">
                        <br><br>
                        <button type="button" class="btn btn-dark mb-4" id="payments"><a href="login-payment.php">Payment</a></button>
                        <button type="button" class="btn btn-dark mb-4" id="refresh"><a href="cart.php">Refresh</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">Services</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="copyright">Sport Store © 2022</p>
            </footer>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        //bật và tắt form đăng nhập
        var formlogin = document.querySelector('.formlogin');

        function openFormLogin() {
            formlogin.classList.add('open');
        }

        function closeFormLogin() {
            formlogin.classList.remove('open');
        }

        function stoppropagation() {
            event.stopPropagation();
        }
        // -------------------------------------------------------------
    </script>
</body>

</html>
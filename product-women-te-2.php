<?php
//dùng để lưu trữ sản phẩm vào giỏ hàng
session_start();

// dùng để kết nối tới database
include 'config.php';

// lập trình trên nút "add"
if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {

        // đưa id sản phẩm vô mảng tạm
        $item_array_id = array_column($_SESSION['cart'], "id");

        // kiểm tra id sản phẩm có trong giỏ hàng chưa, nếu có xuất ra thông báo đã có
        if (in_array($_POST['id'], $item_array_id)) {
            echo "<script> alert('Product is already added in the cart !!!') </script>";
            echo "<script> window.location ='product-women-te-2.php' </script>";
        } else {

            // nếu ko có thêm vô giỏ hàng
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'id' => $_POST['id']
        );
        // tạo 1 biến session mới
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
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
        header("location:product-women-te-2.php");
    } else {
        $LoginFail = "Username or Password is incorrect!";
        echo "<script type='text/javascript'>alert('$LoginFail');</script>";
    }
    mysqli_free_result($result);
    mysqli_close($con);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Women Tennis</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- css and icons -->
    <link rel="stylesheet" href="CSS/product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="themify-icons/themify-icons.css?v=<?php echo time(); ?>">

</head>

<body>

    <div id="main">
        <div id="header">
            <!-- thanh đen trên cùng -->
            <div id="promotion">
                <div><a href="#">Free Standard Shipping & Returns</a></div>
                <div><a href="#">End Of Year Sale: Up To 40% Off Select Style</a></div>
                <div><a href="#">Easy Return</a></div>
            </div>

            <!-- thanh navbar -->
            <div id="navbar">

                <!-- Chỗ để logo -->
                <div id="navbar-leftside">
                    <div id="logo"><a href="index2.php">
                            <img style="width: 80px;height: 60px;" src="IMG/adidas-logo.jpg" alt="">
                        </a></div>
                </div>

                <!-- các nút link -->
                <div id="navbar-mid">
                    <ul>
                    <li id="men">
                            <a href="">Men</a>
                            <ul id="men-subnav">
                                <li><a href="product-men-ru-2.php">Running</a></li>
                                <li><a href="product-men-so-2.php">Soccer</a></li>
                                <li><a href="product-men-ba-2.php">Basketball</a></li>
                                <li><a href="product-men-te-2.php">Tennis</a></li>
                            </ul>
                        </li>
                        <li id="women">
                            <a href="">Women</a>
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
                    <!-- nút Shopping cart -->
                    <a href="cart2.php">
                        <li class="ti-shopping-cart"></li>
                    </a>

                    <div id="user-wrapper">
                        <a href="">
                            <?php
                            echo $_SESSION['login']['username'];
                            ?>
                        </a>
                        <ul id="user">
                            <li><a href="user-detail.php">Your Account</a></li>
                            <li><a href="payment.php">Your Order</a></li>
                            <li><a href="logout.php"> Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="body">
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

            <!-- phần thân để chứa dữ liệu từ database -->
            <div class="container">
                <div id="productTitle">WOMEN'S TENNIS CLOTHING, SHOES AND ACCESSORIES</div>
                <div class="row text-center py-3">
                    <?php
                    //câu truy vấn
                    $sql = "select * from product where cate_id = 'TE' and gender = 'female'";

                    //biến chứa câu truy vấn và kết nối tới database
                    $res = mysqli_query($con, $sql);

                    //vòng lập xuất dữ liệu
                    while ($row = mysqli_fetch_assoc($res)) {

                        //xuất dữ liệu có định dạng, ko có thẻ form thì ko đẩy dữ liệu vô giỏ hàng đc
                        echo "
                        <div class=\"product-wrapper col-md-3 col-sm-6\">
                            <form action=\"product-women-te-2.php\" method=\"post\">
                                <div class=\"owl-carousel\">
                                    <div class=\"item\">
                                        <a href=\"#\"><img src=\"{$row['product_image']}\" alt=\"Image\" class=\"img-fluid card-img-top\"></a>
                                        <div class=\"product-price\">
                                            <p>\${$row['price']}</p>
                                        </div>
                                        <h5>{$row['product_name']}</h5>
                                        <p>{$row['product_description']}</p>
                                        <button type=\"submit\" name=\"add\"><i class=\"ti-shopping-cart\"></i></button>
                                        <input type='hidden' name='id' value='{$row['product_id']}'>
                                        <a href=\"view2.php?product_id={$row['product_id']}\">View</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        ";
                    }

                    //giải phóng biến $res
                    mysqli_free_result($res);
                    //đóng kết nối
                    mysqli_close($con);
                    ?>
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
        // phần này dùng cho thanh menu ẩn khi cuộn xuống và hiện khi cuộn lên
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("header").style.top = "0";
                document.getElementById("body").style.marginTop = "112px";
            } else {
                document.getElementById("header").style.top = "-112px";
                document.getElementById("body").style.marginTop = "0";
            }
            prevScrollpos = currentScrollPos;
        }
        // phần này dùng cho thanh menu ẩn khi cuộn xuống và hiện khi cuộn lên

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

        // phần này dùng cho việc tắt thông báo covid
        function closeAlertCovid() {
            document.getElementById('covid-alert').style.display = "none";
        }

        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 14,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
</body>

</html>
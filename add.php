<?php
//dùng để lưu trữ sản phẩm vào giỏ hàng
session_start();

// dùng để kết nối tới database
include 'config.php';
if (isset($_GET['dem'])) {
    $dem = $_GET['dem'];
    for ($i = 0; $i < $_GET['dem']; $i++) {

        $data[$i] = $_GET["id" . $i];
    }
}

for ($i = 0; $i < sizeof($data); $i++) {
    $t[$i] = $data[$i];
}

if (isset($_SESSION['login']['username'])) {
} else {
    header("location:index.php");
}
$username = $_SESSION['login']['username'];
$query = "select * from user where user_id = '$username'";
$result = mysqli_query($con, $query);
$data = $result->fetch_all();
mysqli_free_result($result);
mysqli_close($con);



?>
<!doctype html>
<html lang="en">

<head>
    <title>Payment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="themify-icons/themify-icons.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="main">
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
                            <input type="text" placeholder="Username" class="username-input">
                            <br>
                            <input type="password" placeholder="Password" class="username-input">
                            <br>
                            <button>Login</button>
                        </form>
                    </div>
                    <footer class="formlogin-footer">
                        <button>Forgot your password?</button>
                    </footer>
                    <hr>
                    <div class="link-create">
                        <a href="">Create new account</a>
                    </div>
                </div>
            </div>

            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">

                        <div class="page-header">
                            <h2>Payment details</h2>
                        </div>

                        <form action="insert_process.php" method="post" id="form">
                            <div class="form-group">
                                <label>Order Code</label>
                                <input type="text" name="OID" class="form-control" value="<?php $order_id = $ran_id = md5(mt_rand(10000, 90000));
                                                                                            echo $order_id ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="UID" class="form-control" value="<?php echo $username ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Total Payments</label>
                                <input type="text" name="OT" class="form-control" value="<?php
                                                                                            if (isset($_SESSION['total'])) {
                                                                                                echo $_SESSION['total'];
                                                                                            } else {
                                                                                                echo "No item";
                                                                                            }
                                                                                            ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" value="<?php
                                                            foreach ($data as $item) { ?><?php echo $item[7] ?><?php } ?>" id="email" name="EM" class="form-control" placeholder="Your email" required>
                                <span id="email_error"></span>
                                <span id="text"></span>
                            </div>
                            <div class="form-group">
                                <label>Order Status</label>
                                <input type="text" name="OST" class="form-control" value="Pending" readonly>

                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input value="<?php
                                                foreach ($data as $item) { ?><?php echo $item[6] ?><?php } ?>" type="text" name="PN" id="phone" placeholder="Enter your phone number" class="form-control" required>
                                <span id="phone_error"></span>
                            </div>
                            <div class="form-group">
                                <label>Payment Methods</label><br>
                                <input type="radio" name="PMT" value="MOMO" required>MOMO<br>
                                <input type="radio" name="PMT" value="COD">COD
                            </div>
                            <div class="form-group">
                                <label>Address Delivery</label>
                                <input type="text" name="ADR" class="form-control" required>
                            </div>
                            <?php
                            for ($i = 0; $i < $_GET['dem']; $i++) {
                                echo "  <div>
                                        <input type='hidden' name='t$i' value='$t[$i]'>                             
                                        </div>";
                            }
                            echo "<div>
                            <input type='hidden' name='dem' value='$dem'>                             
                            </div>"
                            ?>
                            <button type="submit" id="btn" class="btn btn-primary" name="btn" onclick="return validate();">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        span {
            color: red;
            display: block;
            padding: 5px 0px;
        }
    </style>
    <script>
        // Lấy giá trị của một input
        function getValue(id) {
            return document.getElementById(id).value.trim();
        }

        // Hiển thị lỗi
        function showError(key, mess) {
            document.getElementById(key + '_error').innerHTML = mess;
        }

        // hàm kiểm tra Phone và Email
        function validate() {
            var flag = true;
            var phone = getValue('phone');
            if (phone != '' && !/^[0-9]{10}$/.test(phone)) {
                flag = false;
                showError('phone', 'Invalid Phone number !!!');
            }
            var email = getValue('email');
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (!mailformat.test(email)) {
                flag = false;
                showError('email', 'Invalid email address !!!');
            }
            return flag;
        }
    </script>
</body>

</html>
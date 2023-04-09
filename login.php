<?php
session_start();
// dùng để kết nối tới database
include_once("config.php");

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
        header("location:index2.php");
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
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="themify-icons/themify-icons.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="wrapper">
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
                                <li><a href="">Running</a></li>
                                <li><a href="">Soccer</a></li>
                                <li><a href="">Basketball</a></li>
                                <li><a href="">Tennis</a></li>
                            </ul>
                        </li>
                        <li id="women">
                            <a href="">Women</a>
                            <ul id="women-subnav">
                                <li><a href="">Running</a></li>
                                <li><a href="">Soccer</a></li>
                                <li><a href="">Basketball</a></li>
                                <li><a href="">Tennis</a></li>
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
                    <form action="index.html" method="post">
                        <input type="input" name="" id="search" placeholder="Search">
                    </form>
                    <a style="cursor: pointer;" onclick="openFormLogin()">Login</a>
                    <a href="cart.php">
                        <li class="ti-shopping-cart"></li>
                    </a>
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
                            <input type="text" name="username" placeholder="Username" class="username-input">
                            <br>
                            <input type="password" name="password" placeholder="Password" class="username-input">
                            <br>
                            <button type="submit" name="submit">Login</button>
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

            <div class="form-signup-wrapper">
                <form class="form-login" action="login.php" method="post">
                    <h1>LOGIN</h1>
                    <label class="" for="">Username</label>
                    <input type="text" name="username" placeholder="First Name" required>
                    <label class="" for="">Password</label>
                    <input type="password" name="password" placeholder="Last Name" required>
                    <button style="margin-top: 20px;border: none;" type="submit" name="submit">Login</button>
                    <button style="margin-top: 20px;border: none;"><a style="text-decoration: none;color: #000;" href="signup.php">Doesn't Have Account Yet?</a></button>
                </form>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        // tắt thông báo màu xám
        function closeAlertCovid() {
            document.getElementById('covid-alert').style.display = "none";
        }
        // -------------------------------------------------------------

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
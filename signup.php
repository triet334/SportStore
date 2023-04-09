<?php
session_start();
// dùng để kết nối tới database
include_once("config.php");

if (isset($_POST["submit"])) {
    $user_id = $_POST["username"];
    $user_password = $_POST["password"];
    $encrypted_user_password = md5($user_password); //Mã hóa mật khẩu của user
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    //Tạo biến chứa câu lệnh Insert SQL
    $sql = "Insert into user(user_id,user_password,encrypted_password,first_name,last_name,gender,phone,email) values (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($con, $sql);
    //Set giá trị cho các tham số
    mysqli_stmt_bind_param($stmt, "ssssssss", $user_id, $user_password,$encrypted_user_password, $first_name, $last_name, $gender, $phone, $email);
    if (mysqli_stmt_execute($stmt) > 0) {
        $messageSuccess = "Register successfull!";
        echo "<script type='text/javascript'>alert('$messageSuccess');</script>";
        
    } else {
        $messageFail = "Fail!";
        echo "<script type='text/javascript'>alert('$messageFail');</script>";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/signup.css?v=<?php echo time(); ?>">
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
                    <div id="logo"><a href="index.php ">
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

            <div class="form-signup-wrapper">
                <form class="form-signup text-center" action="signup.php" method="post">
                    <h1>REGISTER</h1>
                    <label class="text-center" for="">Your Name</label>
                    <input type="text" name="fname" placeholder="First Name" required>
                    <input type="text" name="lname" placeholder="Last Name" required>
                    <label class="text-center" for="">Gender</label>
                    <div class="radio-gender">
                        <input type="radio" id="male" name="gender" value="male">
                        <p>Male</p>
                        <input type="radio" id="female" name="gender" value="female">
                        <p>Female</p>
                        <input type="radio" id="other" name="gender" value="other">
                        <p>Other</p>
                    </div>
                    <label class="text-center" for="">Phone Number</label>
                    <input type="text" name="phone" placeholder="Enter phone number" required>
                    <label class="text-center" for="">Email</label>
                    <input type="text" name="email" placeholder="Enter email" required>
                    <label class="text-center" for="">Login Details</label>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button class="register-button" type="submit" name="submit">Register <i class="ti-arrow-right"></i></button>
                </form>

                <div>
                    <h1>CREATE AN ACCOUNT</h1>
                    <p style="margin-top: 24px;"><i class="ti-check"></i> So you can purchase our product</p>
                    <p><i class="ti-check"></i> View your personal order history</p>
                    <p><i class="ti-check"></i> Add or change email preferences</p>
                    <p><i class="ti-check"></i> And many more privilege as our special customer</p>
                </div>
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
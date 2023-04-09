<?php
//dùng để lưu trữ sản phẩm vào giỏ hàng
session_start();

// dùng để kết nối tới database
include 'config.php';
if (isset($_SESSION['login']['username'])) {
} else {
    header("location:index.php");
}
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
    <link rel="stylesheet" href="CSS/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="themify-icons/themify-icons.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="main">
        <div id="header">
            <div id="promotion">
                <div><a href="#">Free Standard Shipping & Returns</a></div>
                <div><a href="#">End Of Year Sale: Up To 40% Off Select Style</a></div>
                <div><a href="#">Become A Member | Join now</a></div>
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
                            <li><a href="payment.php">Your's Order</a></li>
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
                            <input style="display: block;" type="text" placeholder="Username" class="username-input">
                            <input style="display: block;" type="password" placeholder="Password" class="username-input">
                            <button type="submit">Login</button>
                        </form>
                    </div>
                    <footer class="formlogin-footer">
                        <button>Forgot your password?</button>
                    </footer>
                    <hr>
                    <div class="link-create">
                        <a href="signup.php">Create new account</a>
                    </div>
                </div>
            </div>

            <div id="covid-alert">
                <p>Dear customers, due to current Government regulations related to COVID-19 prevention & control,
                    delivery time will be longer than expected and we are temporarily unable to deliver to some areas.
                    We sincerely apologize for any inconvenience caused by this issue.
                </p>
                <li type="button" onclick="closeAlertCovid()" class="ti-close"></li>
            </div>

            <!-- About us -->
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="font-size: 40px;">About Us</h2>
                    <h3 class="section-subheading text-muted">SPORT STORE Compassion for Sprots</h3>
                    <h5 class="section-subheading" style="color: black;">
                        SPORT STORE is selling various types of Equipments/Shoes/Clothes for both MEN and WOMEN. The company
                        determined to deliver style to shoppers worldwide. Our store offers a huge collection of goods
                        at affordable prices, and our payment and shipping options are simply unmatched. What are you
                        waiting for? Start shopping online today and find out more about what makes us so special.
                    </h5>
                </div>
            </div><br>

            <!-- Creators -->
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="font-size: 40px;">Our Creator</h2>
                    <h3 class="section-subheading text-muted">Group 5, Class T1.2104.E0</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="rounded-circle" src="IMG/nam.png" style="width: 100%;" alt="..." />
                            <h4>Le Vinh Nam</h4>
                            <p class="text-muted">Front and Back-End Developer</p>
                            <p class="text-muted">Student1316201</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="rounded-circle" src="IMG/Triết.png" style="width: 100%;" alt="..." />
                            <h4>Dang Ngoc Minh Triet</h4>
                            <p class="text-muted">Front-End Developer</p>
                            <p class="text-muted">Student1313754</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="rounded-circle" src="IMG/quan.jpg" style="width: 100%;" alt="..." />
                            <h4>Doan Nguyen Hong Quan</h4>
                            <p class="text-muted">Front-End Developer</p>
                            <p class="text-muted">Student1275264</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="rounded-circle" src="IMG/Khoa.png" style="width: 100%;" alt="..." />
                            <h4>Trinh Hoang Đang Khoa</h4>
                            <p class="text-muted">Back-End Developer</p>
                            <p class="text-muted">Student1316194</p>
                        </div>
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
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
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
        // -------------------------------------------------------------

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
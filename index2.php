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
    <title>Home</title>
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

            <div id="ultraboot-promo">
                <div id="wrapper-ultraboot">
                    <video playinline muted autoplay loop id="ultraboot-video" src="MEDIA/running-ss22-ultraboost-launch-catlp-masthead-large-d_xr1it4.mp4"></video>
                    <div id="ultraboot-content">
                        <p id="ultraboot-content-p1">SAY HELLO TO <br>
                            ULTRABOOST 22
                        </p>
                        <p id="ultraboot-content-p2">
                            Updated with a 360° fit improvement <br> and 4% more energy return.
                        </p>
                        <button type="button" id="ultraboot-content-btn">
                            <a href="#">Shop Now<li class="ti-arrow-right"></li></a>
                        </button>
                    </div>
                </div>
            </div>

            <p id="video-header">What's Hot</p>
            <div id="video-collection">
                <div class="video-collection-child">
                    <a href="">
                        <video playinline muted autoplay loop src="MEDIA/dtc-Training22Q1-hp-teaser-carousel-v2-d_c9ucyy.mp4"></video>
                        <br>
                        <h6>TRAIN TO CHILL</h6>
                        <br><br>
                        <p>
                            Raising your BPM or bringing it down. Exclusive drops only available at adidas have you
                            corvered
                        </p>
                    </a>
                </div>
                <div class="video-collection-child">
                    <a href="">
                        <video playinline muted autoplay loop src="MEDIA/running-ss22-adizero-hp-teaser-carousel-3d-d_jjbnqe.mp4"></video>
                        <br>
                        <h6>SOME SHOES, SOME YEAR</h6>
                        <br><br>
                        <p>
                            With the help of the adizero, our athletes ran the record in 2021. <br> <br>
                            2021 is all but done, but we're just getting started.
                        </p>
                    </a>
                </div>
                <div class="video-collection-child">
                    <a href="">
                        <img style="width: 100%;" src="IMG/arsenal.jpg" alt="">
                        <br><br>
                        <h6>THE CANNON RETURNS.</h6>
                        <br> <br>
                        <p>
                            Celebrating the 50th anniversary of Arsenal's historic Double in 1971. Get the new Away
                            jersey now.
                        </p>
                    </a>
                </div>
                <div class="video-collection-child">
                    <a href="">
                        <video playinline muted autoplay loop src="MEDIA/football-fw21-teamgeist-generic-hp-tc.mp4"></video>
                        <br>
                        <h6>TEAMGEIST BY SHUKYU</h6>
                        <br><br>
                        <p>
                            Bringing back the vibe from 2006, SHUKYU Magazine revived the iconic Teamgeist collection in
                            Tokyo.
                        </p>
                    </a>
                </div>
                <div class="video-collection-child">
                    <a href="product-men-te-2.php">
                        <img style="width: 100%;" src="IMG/tennis.jpg" alt="">
                        <br><br>
                        <h6>BARRICADE. CONTROL THE COURT.</h6>
                        <br>
                        <p>
                            The iconic Barricade is now back, reimagined.
                        </p>
                    </a>
                </div>
            </div>

            <p id="carousel-header">New Arrival</p>
            <!-- Set up your HTML -->
            <div class="owl-carousel">
                <div class="item">
                    <a href="product-men-so-2.php"><img src="IMG/MEN/SO/SO1.PNG" alt=""></a>
                    <div>
                        <p>180$</p>
                    </div>
                    <p>Predator Edge.1</p>
                </div>
                <div class="item">
                    <a href="product-women-ru-2.php"><img src="IMG/WOMEN/RU/RU3.PNG" alt=""></a>
                    <div>
                        <p>70$</p>
                    </div>
                    <p>EQ21 Run Shoes</p>
                </div>
                <div class="item">
                    <a href="product-men-ba-2.php"><img src="IMG/MEN/BA/BA1.PNG" alt=""></a>
                    <div>
                        <p>90$</p>
                    </div>
                    <p>Forum 84 Hi Shoes</p>
                </div>
                <div class="item">
                    <a href="product-women-te-2.php"><img src="IMG/WOMEN/TE/TE8.PNG" alt=""></a>
                    <div>
                        <p>17$</p>
                    </div>
                    <p>Tennis Tieband</p>
                </div>
                <div class="item">
                    <a href="product-men-so-2.php"><img src="IMG/MEN/SO/SO5.PNG" alt=""></a>
                    <div>
                        <p>65$</p>
                    </div>
                    <p>Arsenal 21/22 Jersey</p>
                </div>
                <div class="item">
                    <a href="<p id="carousel-header">New Arrival</p>
            <!-- Set up your HTML -->
            <div class="owl-carousel">
                <div class="item">
                    <a href="product-men-so.php"><img src="IMG/MEN/SO/SO1.PNG" alt=""></a>
                    <div>
                        <p>180$</p>
                    </div>
                    <p>Predator Edge.1</p>
                </div>
                <div class="item">
                    <a href="product-women-ru.php"><img src="IMG/WOMEN/RU/RU3.PNG" alt=""></a>
                    <div>
                        <p>70$</p>
                    </div>
                    <p>EQ21 Run Shoes</p>
                </div>
                <div class="item">
                    <a href="product-men-ba.php"><img src="IMG/MEN/BA/BA1.PNG" alt=""></a>
                    <div>
                        <p>90$</p>
                    </div>
                    <p>Forum 84 Hi Shoes</p>
                </div>
                <div class="item">
                    <a href="product-women-te.php"><img src="IMG/WOMEN/TE/TE8.PNG" alt=""></a>
                    <div>
                        <p>17$</p>
                    </div>
                    <p>Tennis Tieband</p>
                </div>
                <div class="item">
                    <a href="product-women-so-2.php"><img src="IMG/MEN/SO/SO5.PNG" alt=""></a>
                    <div>
                        <p>65$</p>
                    </div>
                    <p>Arsenal 21/22 Jersey</p>
                </div>
                <div class="item">
                    <a href=""><img src="IMG/WOMEN/SO/SO5.PNG" alt=""></a>
                    <div>
                        <p>65$</p>
                    </div>
                    <p>MU 21/22 Jersey</p>
                </div>
            </div>"><img src="IMG/WOMEN/SO/SO5.PNG" alt=""></a>
                    <div>
                        <p>65$</p>
                    </div>
                    <p>MU 21/22 Jersey</p>
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
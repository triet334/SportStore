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
    <title>Policy</title>
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

            <div class="container">
                <h2 class="section-heading text-uppercase text-center" style="font-size: 30px;">sport store policies, payment, delivery, return and terms</h2>
                <h3 class="section-subheading text-muted">This Privacy Policy sets out the manner in which Sporting Store,
                    uses, discloses and otherwise manages the personal information of our customers.
                    This Privacy Policy applies to the privacy practices at our Sporting Store,
                    on our website where this policy is posted including
                    , and through other interactions with our customers.</h3><br>
                <h3>Returns</h3>
                <h5 class="section-subheading" style="color: black;">
                    Our policy lasts 14 days. If 14 days have gone by since your purchase, unfortunately we can’t offer you a refund or exchange.
                    To be eligible for a return, your item must be unused and in the same condition that you received it. It must also be in the original packaging.
                    Several types of goods are exempt from being returned. Perishable goods such as food and drinks cannot be returned. We also do not accept products that are intimate or sanitary goods, hazardous materials, or flammable liquids or gases.
                    Additional non-returnable items:
                    Gift cards
                    Downloadable software products
                    Some health and personal care items
                    To complete your return, we require a receipt or proof of purchase.
                    Please do not send your purchase back to the manufacturer.
                    There are certain situations where only partial refunds are granted (if applicable)
                    Clothing obvious signs of use
                    Electronic Items that have been opened
                    Any item not in its original condition, is damaged or missing parts for reasons not due to our error
                    Any item that is returned more than 30 days after delivery
                </h5><br>

                <h3>Shipping</h3>
                <h5 class="section-subheading" style="color: black;">
                    To return your product, you should mail your product to: My Sports and More Ltd , 22 St John's Walk, Telford TF42FT
                    You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable. If you receive a refund, the cost of return shipping will be deducted from your refund.
                    Depending on where you live, the time it may take for your exchanged product to reach you, may vary.
                    If you are shipping an item of considerable value, you should consider using a trackable shipping service or purchasing shipping insurance. We don’t guarantee that we will receive your returned item.
                </h5><br>

                <h3>Terms of Service</h3>
                <h5 class="section-subheading" style="color: black;">
                    OVERVIEW
                    SPORT STORE and More offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.
                    By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.
                    Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.
                    Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.
                </h5>
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
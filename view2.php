<?php
//session
session_start();

//kết nối database
include 'config.php';

// lập trình trên nút "add"
if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {

        // đưa id sản phẩm vô mảng tạm
        $item_array_id = array_column($_SESSION['cart'], "id");

        // kiểm tra id sản phẩm có trong giỏ hàng chưa, nếu có xuất ra thông báo đã có
        if (in_array($_POST['id'], $item_array_id)) {
            echo "<script> alert('Product is already added in the cart !!!') </script>";
            echo "<script> window.location ='product.php' </script>";
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
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/view.css?v=<?php echo time(); ?>">
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

            <!-- chỗ chứa thông tin chi tiết -->
            <div class="container">
                <div class="page-header">
                    <h1>Product Details</h1>
                </div>
                <?php
                //xét điều kiện, lấy id sản phẩm và id ko trống
                if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
                    //câu truy vấn
                    $sql = "SELECT * FROM product WHERE product_id='" . $_GET['product_id'] . "'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        //xuất có định dạng
                        if ($row['cate_id'] == 'shoe') {
                            echo "
                            <form method=\"post\">
                                <div class=\"row view_body\">
                                    <div class=\"col-md-6 col-sm-6 view_img\">
                                        <div class\"\">
                                            <img src=\"{$row['product_image']}\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                                        </div>
                                    </div>
                                    <div class=\"col-md-4 col-sm-6 discription\">
                                        <h5 class=\"card-name\">{$row['product_name']}</h5>
                                        <p class=\"card-cate\">
                                            {$row['cate_id']}
                                        </p>
                                        <h5 class=\"card-price\">
                                            <span class=\"price\">{$row['price']} $</span>
                                        </h5>
                                        <div class=\"size-selector\">
                                            <div class=\"size-header\">
                                                <h5>Choose your shoes size:</h5>
                                            </div>
                                            <div class=\"sizes\" data-auto-id=\"size-selector\">
                                                <button class=\"btn-size\">
                                                    <span>5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>5.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>6 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>6.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>7 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>7.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>8 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>8.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>9 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>9.5 UK</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class=\"stars\">
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                        </div>
                                        <button type=\"submit\" class=\"btn btn-success my-1\" name=\"add\">Add to Cart <i class=\"ti-shopping-cart\"></i></button>
                                        <input type='hidden' name='id' value='{$row['product_id']}'>
                                    </div>
                                </div>
                            </form>
                                    ";
                        } else if ($row['cate_id'] == 'smartphone') {
                            echo "
                            <form method=\"post\">
                                <div class=\"row view_body\">
                                    <div class=\"col-md-6 col-sm-6 view_img\">
                                        <div class\"\">
                                            <img src=\"{$row['product_image']}\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                                        </div>
                                    </div>
                                    <div class=\"col-md-4 col-sm-6 discription\">
                                        <h5 class=\"card-name\">{$row['product_name']}</h5>
                                        <p class=\"card-cate\">
                                            {$row['cate_id']}
                                        </p>
                                        <h5 class=\"card-price\">
                                            <span class=\"price\">{$row['price']} $</span>
                                        </h5>
                                        <div class=\"size-selector\">
                                            <div class=\"size-header\">
                                                <h5>Choose your clothes size:</h5>
                                            </div>
                                            <div class=\"sizes\" data-auto-id=\"size-selector\">
                                                <button class=\"btn-size\">
                                                    <span>SM</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>MD</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>LG</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>XLG</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>XXLG</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class=\"stars\">
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                        </div>
                                        <button type=\"submit\" class=\"btn btn-success my-1\" name=\"add\">Add to Cart <i class=\"ti-shopping-cart\"></i></button>
                                        <input type='hidden' name='id' value='{$row['product_id']}'>
                                    </div>
                                </div>
                            </form>
                                    ";
                        } else {
                            echo "
                            <form method=\"post\">
                                <div class=\"row view_body\">
                                    <div class=\"col-md-6 col-sm-6 view_img\">
                                        <div class\"\">
                                            <img src=\"{$row['product_image']}\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                                        </div>
                                    </div>
                                    <div class=\"col-md-4 col-sm-6 discription\">
                                        <h5 class=\"card-name\">{$row['product_name']}</h5>
                                        <p class=\"card-cate\">
                                            {$row['cate_id']}
                                        </p>
                                        <h5 class=\"card-price\">
                                            <span class=\"price\">{$row['price']} $</span>
                                        </h5>
                                        <div class=\"size-selector\">
                                            <div class=\"size-header\">
                                                <h5>Choose your shoes size:</h5>
                                            </div>
                                            <div class=\"sizes\" data-auto-id=\"size-selector\">
                                                <button class=\"btn-size\">
                                                    <span>5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>5.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>6 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>6.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>7 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>7.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>8 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>8.5 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>9 UK</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>9.5 UK</span>
                                                </button>
                                            </div>
                                            <div class=\"size-header\">
                                                <h5>Choose your clothes size:</h5>
                                            </div>
                                            <div class=\"sizes\" data-auto-id=\"size-selector\">
                                                <button class=\"btn-size\">
                                                    <span>SM</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>MD</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>LG</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>XLG</span>
                                                </button>
                                                <button class=\"btn-size\">
                                                    <span>XXLG</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class=\"stars\">
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                            <a>⭐</a>
                                        </div>
                                        <button type=\"submit\" class=\"btn btn-success my-1\" name=\"add\">Add to Cart <i class=\"ti-shopping-cart\"></i></button>
                                        <input type='hidden' name='id' value='{$row['product_id']}'>
                                    </div>
                                </div>
                            </form>
                                    ";
                        }
                    }
                }
                ?>
            </div>

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

        // javascript rating
        const starWrapper = document.querySelector(".stars");
        const stars = document.querySelectorAll(".stars a");

        stars.forEach((star, clickedIdx) => {
            star.addEventListener("click", () => {
                starWrapper.classList.add("disabled");

                stars.forEach((otherStar, otherIdx) => {
                    if (otherIdx <= clickedIdx) {
                        otherStar.classList.add("active");
                    } else {
                        otherStar.classList.remove("active");
                    }
                });

                console.log(`star of index ${clickedIdx + 1} was clicked`);
                // Post to backend your star ranking, nếu kịp giờ 
            });
        });
    </script>
</body>

</html>
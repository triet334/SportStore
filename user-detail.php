<?php
//dùng để lưu trữ sản phẩm vào giỏ hàng
session_start();

// dùng để kết nối tới database
include 'config.php';
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
    <title>
        <?php
        echo $_SESSION['login']['username'];
        ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/user-detail.css?php echo time(); ?>">
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
        <hr>
        <div id="body">
            <div id="formupdate-wrapper" class="formupdate-wrapper close" onclick="closeFormUpdate()">
                <form onclick="stoppropagation()" action="userupdate-process.php" class="formupdate" method="POST">
                    <?php
                    foreach ($data as $item) { ?>
                        <label for="">First Name</label>
                        <input name="fname" type="text" value="<?php echo $item[3] ?>"></input>
                        <br>
                        <label for="">Last Name</label>
                        <input name="lname" type="text" value="<?php echo $item[4] ?>"></input>
                        <br>
                        <label for="">Gender</label>
                        <select name="gender" id="">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <br>
                        <label for="">Phone</label>
                        <input name="phone" type="text" value="<?php echo $item[6] ?>"></input>
                        <br>
                        <button name="submit" type="submit">Update</button>
                        <div id=" "><a style="cursor: pointer;" onclick="closeFormUpdate()">Close</a></div>
                    <?php } ?>
                </form>
            </div>
            <div id="user-information-wrapper">
                <form action="user-detail.php" method="POST" id="user-information">
                    <?php
                    foreach ($data as $item) { ?>
                        <label for="">Username</label>
                        <input readonly type="text" value="<?php echo $item[0] ?>"></input>
                        <br>
                        <label for="">First Name</label>
                        <input readonly type="text" value="<?php echo $item[3] ?>"></input>
                        <br>
                        <label for="">Last Name</label>
                        <input readonly type="text" value="<?php echo $item[4] ?>"></input>
                        <br>
                        <label for="">Gender</label>
                        <input readonly type="text" value="<?php echo $item[5] ?>"></input>
                        <br>
                        <label for="">Phone</label>
                        <input readonly type="text" value="<?php echo $item[6] ?>"></input>
                        <br>
                        <label for="">Email</label>
                        <input readonly type="text" value="<?php echo $item[7] ?>"></input>
                        <br>
                        <div id="button-open-form"><a onclick="openFormUpdate()">Update</a></div>
                    <?php } ?>
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
        //bật và tắt form update thông tin
        

        function openFormUpdate() {
            var formupdatewrapper = document.getElementById("formupdate-wrapper");
            formupdatewrapper.classList.remove("close");
        }

        function closeFormUpdate() {
            var formupdatewrapper = document.getElementById("formupdate-wrapper");
            formupdatewrapper.classList.add("close");
        }

        function stoppropagation() {
            event.stopPropagation();
        }
        // -------------------------------------------------------------
    </script>
</body>

</html>
<?php
include_once 'header.php';
?>

<head>
    <link rel="stylesheet" href="css/stock.css">
</head>

<body>
    <?php
    session_start();
    include 'config_admin.php';


    if ($_SESSION['unique_id']) {
        $unique_id = $_SESSION['unique_id'];
        $admin_code = $_SESSION['admin_code'];
        $admin_avatar = $_SESSION['admin_avatar'];
        $admin_gender = $_SESSION['gender'];
        $admin_fname = $_SESSION['admin_fname'];
    } else {


        header('Location:login.php');
    }
    $sql = "select 
    p.product_id,p.product_name,p.price,p.product_image,c.cate_name,d.discount_percent,p.unit,p.discount_id,p.gender,c.cate_id,d.discount_name
            from product as p
            left join category as c on p.cate_id=c.cate_id
            left join discount as d on p.discount_id=d.discount_id
            ";
    $query = mysqli_query($con, $sql) or trigger_error("SQL", E_USER_ERROR);
    ?>
    <!-- Login for login form -->


    <div class="sidebar">
        <div class="logo-details">
            <img src="pic/admin/logo_adidas.jpg" alt="" width="55px" style="padding-left: 4px; border-radius: 1px;">
            <span class="logo_name" style="padding-left: 20px;">Sporties</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="login_process.php?unique_id=<?php echo $unique_id ?>">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Overview</span>
                </a>
            </li>
            <li>
                <a href="personal_process.php?unique_id=<?php echo $unique_id ?>">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Personal</span>
                </a>
            </li>
            <li>
                <a href="order_list_process.php?unique_id=<?php echo $unique_id ?>">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Order list</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
            </li> -->
            <li>
                <a href="#">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Stock</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Total order</span>
                </a>
            </li> -->
            <li>
                <a href="customer.php?unique_id=<?php echo $unique_id ?>">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Customer</span>
                </a>
            </li>
            <li>
                <a href="chat_process.php?unique_id=<?php echo $unique_id ?>">
                    <i class='bx bx-message'></i>
                    <button class="btn btn-danger msg_noti">
                    </button>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href="achieve_process.php?unique_id=<?php echo $unique_id ?>">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Achieve</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
            </li>
            <li class="log_out" id="">
                <a href="logout.php?logout_id=<?php echo $unique_id ?>" onclick="return confirm('Are you sure to logout ?')">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
            </div>
            <div class="search-box">
                <input type="text" id="name2search" value="" placeholder="Search name...">
                <a href="" style="text-decoration: none;" class='bx bx-search searchbtn'></a>

            </div>

            <div class="profile-details">
                <img src="../admin/pic/admin/<?php
                                                    if ($admin_avatar == null) {
                                                        $admin_avatar = "default.png";
                                                        echo $admin_avatar;
                                                    } else {
                                                        echo $admin_avatar;
                                                    } ?>">
                <span class="admin_name">Hi ,<?php
                                                if ($admin_gender == 'male') {
                                                    echo "Mr. " . ucwords("$admin_fname");
                                                } else {
                                                    echo "Mrs. " . ucwords("$admin_fname");
                                                } ?>
                </span>

            </div>
        </nav>

        <!-- Logined main content -->
        <div class="home-content">

            <head>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" type="text/css" href="css/stock.css">
                <link rel="preconnect" href="https://fonts.googleapis.com">

            </head>

            <body>
                <a href="stock_add_product.php?admin_code=<?php echo $admin_code; ?>" class="btn btnAdd" target="_blank"><i class="fa-solid fa-plus">Add product</i></a>
                <main>
                    <header>
                        <ul class="indicator">
                            <li data-filter="all" class="active"><a href="#">All</a></li>
                            <?php
                            $query2 = mysqli_query($con, "select p.product_id,p.product_name,p.price,p.product_image,c.cate_name,d.discount_percent,p.unit,p.discount_id
                            from product as p
                            left join category as c on p.cate_id=c.cate_id
                            left join discount as d on p.discount_id=d.discount_id");
                            $i = 0;
                            $arr = [];
                            // $count_row = mysqli_num_rows($query2);
                            while ($data = mysqli_fetch_assoc($query2)) {
                                // print_r($data);
                                $arr[$i] = $data['cate_name'];
                                $i++;
                            }

                            for ($i = 0; $i < sizeof($arr); $i++) {
                                $temp = '';
                                $n = 0;
                                for ($z = $i + 1; $z < sizeof($arr); $z++) {
                                    if ($arr[$i] == $arr[$z]) {
                                        $temp = $arr[$z];
                                        $arr[$z] = $arr[$i + 1 + $n];
                                        $arr[$i + 1 + $n] = $temp;
                                        $n++;
                                    }
                                }
                            }
                            $temp = "";
                            for ($i = 0; $i < sizeof($arr); $i++) {
                                if ($temp != $arr[$i]) {
                                    echo "<li data-filter='$arr[$i]' ><a href='#'>$arr[$i]</a></li>";
                                    $temp = $arr[$i];
                                }
                            }

                            ?>
                            <!-- <li data-filter="ao"><a href="#">ao</a></li>
                            <li data-filter="Watch"><a href="#">Watch</a></li>
                            <li data-filter="Shoes"><a href="#">Shoes</a></li>
                            <li data-filter="Mobile"><a href="#">Mobiles</a></li>
                            <li data-filter="Accessories"><a href="#">Accessories</a></li> -->
                        </ul>
                        <div class="filter-block">
                            <div class="filter-condition">
                                <span>Price</span>
                                <select name="" id="select">
                                    <option value="Default">Default</option>
                                    <option value="LowToHigh">Low to high</option>
                                    <option value="HighToLow">High to low</option>
                                </select>
                            </div>
                            <div class="filter-gender">
                                <span>Gender</span>
                                <select name="" id="select-gender">
                                    <option value="Default">Default</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </header>
                    <div class="product-field">
                        <ul class="items">
                            <?php
                            while ($data = mysqli_fetch_row($query)) {
                                $price_after_discount = $data[2] - ($data[2] * $data[5]) / 100;
                                if ($data[7] != null) {
                                    echo "
                                            <li data-category='' data-price='' data-name='' data-gender=''>
                                                    <picture>
                                                    <img src='$data[3]' alt='' style='min-width:280px;max-width:300px;'>
                                                </picture>
                                                
                                                <div class='detail'>
                                                    <p class='icon'>
                                                    <span><i class='far fa-heart'></i></span>
                                                    <span><i class='far fa-share-square'></i></span>
                                                    <span><i class='fas fa-shopping-basket'></i></span>
                                                    </p>
                                                    <strong>$data[4]</strong>
                                                    <span class='gender'>$data[8]</span>
                                                    <span class='name'>$data[1]</span>
                                                <small><a href='delete_product.php?p_id=" . $data[0] . "&p_name=" . $data[1] . "&c_id=" . $data[9] . "&price=" . $data[2] . "&p_img=" . $data[3] . "&unit=" . $data[6] . "&gender=" . $data[8] . "&admin_code=" . $admin_code . "' style='text-decoration: none;'target='_blank'>Delete</a></small>
                                                <small><a href='update_product.php?p_id=" . $data[0] . "&p_name=" . $data[1] . "&c_id=" . $data[9] . "&price=" . $data[2] . "&p_img=" . $data[3] . "&unit=" . $data[6] . "&gender=" . $data[8] . "&admin_code=" . $admin_code . "&discount_id=" . $data[7] . "&c_name=" . $data[4] . "&discount_name=" . $data[10] . "' style='text-decoration: none;'target='_blank'>Update</a></small>
                                                </div>
                                                <h5 style='text-decoration: line-through black;'>$data[2] $data[6]</h5>
                                                <h6>Sale$data[5]%<h6>
                                                <h3>$data[6]</h3>
                                                <h4>$price_after_discount</h4>
                                            </li>
                                            ";
                                } else {
                                    echo "
                                                <li data-category='' data-price='' data-name='' data-gender=''>
                                                    <picture>
                                                    <img src='$data[3]' alt='' style='min-width:280px;max-width:300px;'>
                                                    </picture>
                                                <div class='detail'>
                                                <p class='icon'>
                                                <span><i class='far fa-heart'></i></span>
                                                <span><i class='far fa-share-square'></i></span>
                                                <span><i class='fas fa-shopping-basket'></i></span>
                                                </p>
                                                <strong>$data[4]</strong>
                                                <span class='gender'>$data[8]</span>
                                                <span class='name'>$data[1]</span>
                                                <small><a href='delete_product.php?p_id=" . $data[0] . "&p_name=" . $data[1] . "&c_id=" . $data[9] . "&price=" . $data[2] . "&p_img=" . $data[3] . "&unit=" . $data[6] . "&gender=" . $data[8] . "&admin_code=" . $admin_code . "' style='text-decoration: none;' target='_blank'>Delete</a></small>
                                                <small><a href='update_product.php?p_id=" . $data[0] . "&p_name=" . $data[1] . "&c_id=" . $data[9] . "&price=" . $data[2] . "&p_img=" . $data[3] . "&unit=" . $data[6] . "&gender=" . $data[8] . "&admin_code=" . $admin_code . "&discount_id=" . $data[7] . "&c_name=" . $data[4] . "&discount_name=" . $data[10] . "'style='text-decoration: none;'target='_blank'>Update</a></small>
                                                </div>
                                                <h3>$data[6]</h3>
                                                <h4>$data[2]</h4>
                                                </li>
                                            ";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </main>
            </body>
            <!-- <div class="pagination">
                <a href="javascript:prevPage()" id="btn_prev"style="border: solid 1px;">Prev</a>
                <span id="page"style="border: solid 1px;"></span> 
                <a href="javascript:nextPage()" id="btn_next"style="border: solid 1px;">Next</a>
                
            </div> -->
            <input type="hidden" class="bx bx-message value_noti" value="<?php echo $admin_code; ?>">
        </div>
    </section>

    <script type="text/javascript">
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
    <script src="javascript/stock.js"></script>
    <script src="javascript/msg_noti.js"></script>
</body>

</html>
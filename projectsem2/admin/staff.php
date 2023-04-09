<?php
include_once 'header.php';
?>

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
    ?>
    <!-- Login for login form -->


    <div class="sidebar">
    <div class="logo-details">
            <img src="pic/admin/logo_adidas.jpg" alt="" width="55px" style="padding-left: 4px; border-radius: 1px;">
            <span class="logo_name" style="padding-left: 20px;">Sporties</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
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
                <a href="stock_process.php?unique_id=<?php echo $unique_id ?>">
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
                <a href="customer_process.php?unique_id=<?php echo $unique_id ?>">
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
                <span class="dashboard">Dashboard</span>
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
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Order</div>
                        <div class="number total_order"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Update:</span>
                        </div>
                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <div class="number total_sale"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Update:</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Admin Online</div>
                        <div class="number admin_online"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Update:</span>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Customer</div>
                        <div class="number customer_count"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Update:</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-download cart four'></i>
                </div>
            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Sales</div>
                    <div class="sales-details">
                        <table class="table table-striped recent_sale">
                        </table>
                    </div>
                </div>
                <div class="top-sales box">
                    <div class="title">Top Seling Product</div>
                    <ul class="top-sales-details">
                        <!-- <li>
                            <a href="#">
                                <img src="images/sunglasses.jpg" alt="">
                                <span class="product">Vuitton Sunglasses</span>
                            </a>
                            <span class="price">$1107</span>
                        </li> -->
                        
                    </ul>
                </div>
            </div>
            <input type="hidden" class="bx bx-message value_noti" value="<?php echo $admin_code;?>">
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
    <script src="javascript/staff.js"></script>
    <script src="javascript/msg_noti.js"></script>
</body>

</html>
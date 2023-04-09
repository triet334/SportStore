<?php
include_once 'header.php';
session_start();
include 'config_admin.php';

if ($_SESSION['unique_id']) {
    $admin_code = $_SESSION['admin_code'];
    $admin_pass = $_SESSION['admin_pass'];
    $admin_avatar = $_SESSION['admin_avatar'];
    $admin_gender = $_SESSION['gender'];
    $admin_fname = $_SESSION['admin_fname'];
    $admin_lname = $_SESSION['admin_lname'];
    $admin_gender = $_SESSION['gender'];
    $admin_email = $_SESSION['admin_email'];
    $admin_phone = $_SESSION['admin_phone'];
    $admin_dob = $_SESSION['admin_dob'];
    $admin_doj = $_SESSION['admin_doj'];
    $admin_status = $_SESSION['admin_status'];
    $unique_id = $_SESSION['unique_id'];
} else {

    header('Location:login.php');
}
?>

<body>
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
                <a href="#">
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
        <div class="home-content" style="padding-top: 1px;">

            <head>
                <link rel="stylesheet" href="css/achieve.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
            </head>

            <body>
                <div class="wrapper-achieve" style="margin-top: 100px;">
                    <input type="radio" name="slider" checked id="home">
                    <input type="radio" name="slider" id="blog">
                    <input type="radio" name="slider" id="code">
                    <input type="radio" name="slider" id="help">
                    <input type="radio" name="slider" id="about">
                    <div class='achieve-nav'>
                        <label for="home" class="home"><i class="fas fa-home"></i>Completed</label>
                        <label for="blog" class="blog"><i class="fas fa-ban"></i>Canceled</label>
                        <label for="code" class="code"><i class="fas fa-blog"></i>Attendance</label>
                        <label for="help" class="help"><i class="far fa-envelope"></i>Feedback</label>
                        <label for="about" class="about"><i class="far fa-user"></i>Achievement</label>
                        <div class="slider"></div>
                    </div>
                    <section>
                        <div class="content content-1">
                            <div class="title">Your Completed Transaction</div>
                            <table class='table table-bordered'>
                                <thead>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Time</th>
                                </thead>
                                <tbody class="table_pagi_completed">
                                <?php $sql_completed = "select order_id,user_id,modified_at from order_detail where (admin_confirm='$admin_code' and order_status='Completed')";
                                $query_completed = mysqli_query($con, $sql_completed);
                                while ($completed = mysqli_fetch_row($query_completed)) {
                                    echo "
                                <tr>
                                    <th>$completed[0]</th>
                                    <th>$completed[1]</th>
                                    <th>$completed[2]</th>
                                </tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="content content-2">
                            <div class="title">Your Canceled Transaction</div>
                            <table class='table table-bordered'>
                                <thead>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Time</th>
                                </thead>
                                <tbody class="table_pagi_canceled">
                                    <?php $sql_canceled = "select order_id,user_id,modified_at from order_detail where (admin_confirm='$admin_code' and order_status='Canceled')";
                                    $query_canceled = mysqli_query($con, $sql_canceled);

                                    while ($canceled = mysqli_fetch_row($query_canceled)) {
                                        echo "
                                <tr>
                                    <th>$canceled[0]</th>
                                    <th>$canceled[1]</th>
                                    <th>$canceled[2]</th>
                                </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="content content-3">
                            <div class="title">This is your attendance</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, debitis nesciunt! Consectetur officiis, libero nobis dolorem pariatur quisquam temporibus. Labore quaerat neque facere itaque laudantium odit veniam consectetur numquam delectus aspernatur, perferendis repellat illo sequi excepturi quos ipsam aliquid est consequuntur.</p>
                        </div>
                        <div class="content content-4">
                            <div class="title">This is Feedback</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim reprehenderit null itaq, odio repellat asperiores vel voluptatem magnam praesentium, eveniet iure ab facere officiis. Quod sequi vel, rem quam provident soluta nihil, eos. Illo oditu omnis cumque praesentium voluptate maxime voluptatibus facilis nulla ipsam quidem mollitia! Veniam, fuga, possimus. Commodi, fugiat aut ut quorioms stu necessitatibus, cumque laborum rem provident tenetur.</p>
                        </div>
                        <div class="content content-5">
                            <div class="title">This is a personal Achievement</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia sequi aliquam. Voluptatem distinctio nemo culpa veritatis nostrum fugit rem adipisci ea ipsam, non veniam ut aspernatur aperiam assumenda quis esse soluta vitae, placeat quasi. Iste dolorum asperiores hic impedit nesciunt atqu, officia magnam commodi iusto aliquid eaque, libero.</p>
                        </div>
                    </section>
                    
                </div>

            </body>

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
    <script src="javascript/msg_noti.js"></script>

</body>
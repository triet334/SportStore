<?php
include_once 'header.php';
?>

<body>
    <?php
    
    session_start();
    include 'config_admin.php';

    if ($_SESSION['unique_id'] ) {
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
        $unique_id=$_SESSION['unique_id'];
    } else {

        header('Location:login.php');
    }

    mysqli_close($con);
    ?>
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
                <a href="#">
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
            <li class="log_out" >
                <a href="logout.php?logout_id=<?php echo $unique_id?>" onclick="return confirm('Are you sure to logout ?')">
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

            <div class="profile-details" >
                <img src="../admin/pic/admin/<?php if ($admin_avatar == null) {
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
        <div class="home-content" class="admin_info" >

            <form action="admin_update.php" method="post" style="margin:0 20% 2% 20%; font-size: 1.5em;" enctype="multipart/form-data">
                <h2 style="text-align: center;">Admin infomation</h2>
                <div class="form-group">
                    <label for="my-input">Admin code:</label>
                    <input id="my-input" name="admin_code" class="form-control" type="text" value="<?php echo $admin_code ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Password:</label>
                    <input id="my-input" class="form-control" name="admin_pass" type="password" value="<?php echo $admin_pass ?>">
                </div>
                <div class="form-group">
                    <label for="my-input">First name:</label>
                    <input id="my-input" class="form-control" type="text" value="<?php echo $admin_fname ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Last name:</label>
                    <input id="my-input" class="form-control" type="text" value="<?php echo $admin_lname ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Gender:</label>
                    <input id="my-input" class="form-control" type="text" value="<?php echo $admin_gender ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Email:</label>
                    <input id="my-input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="email" type="text" value="<?php echo $admin_email ?>">
                </div>
                <div class="form-group">
                    <label for="my-input">Phone:</label>
                    <input id="my-input" class="form-control" pattern="[0-9]{9,12}" name="phone" type="text" value="<?php echo $admin_phone ?>">
                </div>
                <div class="form-group">
                    <label for="my-input">Date of birth:</label>
                    <input id="my-input" class="form-control" type="text" value="<?php echo $admin_dob ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Date of join:</label>
                    <input id="my-input" class="form-control" type="text" value="<?php echo $admin_doj ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Admin status:</label>
                    <input id="my-input" class="form-control" type="text" value="<?php echo $admin_status ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="my-input">Avatar:</label><br>
                    <img style="width: 2em;" src="../admin/pic/admin/<?php if ($admin_avatar == null) {
                                                                                $admin_avatar = "default.png";
                                                                                echo $admin_avatar;
                                                                            } else {
                                                                                echo $admin_avatar;
                                                                            } ?>">
                    <br><br>
                    <input type="file" name="image">
                </div>     
                <input type="submit" name="update" value="Update" class="btn btn-danger">
                
                
                <a href="staff.php?admin_code=<?php echo $admin_code ?>&admin_pass=<?php echo $admin_pass ?>" class="btn btn-primary">Cancel</a>
            </form>
            <input type="hidden" class="bx bx-message value_noti" value="<?php echo $admin_code;?>">

        </div>
    </section>

    <script>
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

</html>
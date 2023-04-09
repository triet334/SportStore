<?php
include_once 'header.php';
session_start();
include 'config_admin.php';

if ($_SESSION['unique_id']) {
  $unique_id = $_SESSION['unique_id'];
  $admin_avatar = $_SESSION['admin_avatar'];
  $admin_gender = $_SESSION['gender'];
  $admin_fname = $_SESSION['admin_fname'];
  $admin_lname = $_SESSION['admin_lname'];
  $admin_email = $_SESSION['admin_email'];
  $admin_phone = $_SESSION['admin_phone'];
  $admin_dob = $_SESSION['admin_dob'];
  $admin_doj = $_SESSION['admin_doj'];
  $admin_status = $_SESSION['admin_status'];
  $admin_code=$_SESSION['admin_code'];
} else {

  header('Location:login.php');
}

mysqli_close($con);
?>

<body>
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
        <a href="customer_process.php?unique_id=<?php echo $unique_id ?>">
          <i class='bx bx-user'></i>
          <span class="links_name">Customer</span>
        </a>
      </li>
      <li>
        <a href="#">
          <div>
            <i class='bx bx-message'></i>
            <button class="btn btn-danger msg_noti">
            </button>

          </div>
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
      <li class="log_out" id="" style="display: <?php echo $login ?>;">
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
    <div class="home-content" class="admin_info">
      <div class="wrapper">
        <section class="users">
          <header>
            <div class="content">

              <img src="pic/admin/<?php echo $admin_avatar ?>" alt="">
              <div class="details">
                <span><?php echo ucwords($admin_fname) . " " . ucwords($admin_lname) ?></span>
                <p><?php if (isset($unique_id)) {
                      echo 'Active now';
                    } ?></p>
              </div>
            </div>
            <a href="logout.php?logout_id=<?php echo $unique_id ?>" onclick="return confirm('Are you sure to logout ?')" class="logout">Logout</a>
          </header>
          <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
          </div>
          <div class="users-list">
          </div>
        </section>
      </div>
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
  <script src="javascript/users.js"></script>
  <script src="javascript/msg_noti.js"></script>
</body>

</html>
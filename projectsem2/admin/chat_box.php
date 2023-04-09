<?php

session_start();
include_once "config_admin.php";
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        if (!isset($_SESSION['admin_code'])) {
          header("location: login.php");
        } else {
          $user_id = $_GET['admin_code'];
          $friend_id = $_SESSION['admin_code'];
          mysqli_query($con, "update chat set msg_status='old' where (incoming_msg_id='$friend_id' and outgoing_msg_id='$user_id')");

          // $user_id = mysqli_real_escape_string($con, $_GET['admin_code']);
          $sql = mysqli_query($con, "Select * from admin Where admin_code = '$user_id'");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          } else {
            header("location: admin_chat.php");
          }
        }
        ?>
        <a href="admin_chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="pic/admin/<?php echo $row['admin_avatar']; ?>" alt="">
        <div class="details">
          <span><?php echo ucwords($row['admin_fname']) . " " . ucwords($row['admin_lname']) ?></span>
          <p><?php echo $row['admin_status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="insert-chat.php" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>

</html>
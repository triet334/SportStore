<?php
include 'config_admin.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select user_id,first_name,last_name,gender,phone,email,last_log_in from user where user_id='$id'";
    $query = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_row($query)) {
        echo "<div class='rounder'>
        <div class='ground'>
        <div class='wrapper-customer'>
            <div class='left'>
                <img src='pic/admin/default.png' alt='user' width='350'>
                <h4>$data[0]</h4>
                
            <div class='social_media'>
            <ul>
                <li><a href='#'><i class='fab fa-facebook-f'></i></a></li>
                <li><a href='#'><i class='fab fa-twitter'></i></a></li>
                <li><a href='#'><i class='fab fa-instagram'></i></a></li>
            </ul>
        </div>
        </div>
        <div class='right'>
            <div class='info'>
                <h3>Information</h3>
                <div class='info_data'>
                    <div class='data'>
                        <h4>Email</h4>
                        <p>$data[5]</p>
                    </div>
                    <div class='data'>
                        <h4>Phone</h4>
                        <p>$data[4]</p>
                    </div>
                    <div class='data'>
                        <h4>Name</h4>
                        <p>$data[1] $data[2]</p>
                    </div>
                </div>
        </div>
    
        <div class='projects'>
            <h3>More</h3>
            <div class='projects_data'>
                <div class='data'>
                    <h4>Gender</h4>
                    <p>$data[3]</p>
                </div>
                <div class='data'>
                    <h4>Last sign in</h4>
                    <p>$data[6].</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>";
    }
} else {
    echo "no id";
}
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</html>
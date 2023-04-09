<?php
include 'config_admin.php';
if(isset($_GET['order_id'])&&isset($_GET['admin_code'])){
$order_id = $_GET['order_id'];
$unique_id = $_GET['unique_id'];
$admin_code = $_GET['admin_code'];
}else{
    echo 'fail.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Transaction</title>
    <link rel="stylesheet" href="css/cancelBTN.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <div class="wrapper">
        <label>
            <a href="order_list_process.php?unique_id=<?php echo $unique_id ?>" class="cancel-icon fas fa-times" style='text-decoration: none;'></a>
        </label>
        <div class="icon"><i class="far fa-envelope"></i></div>
        <div class="content">
            <header>Cancel transaction</header>
            <p>Before cancel transaction admin need to put a reason in the form below. Thank you.</p>
        </div>
        <form action="cancelBTN.php" method="POST">
            <!-- show sucess message once email send successfully -->
            <!-- <div class="alert success-alert">
                <p></p>
            </div> -->
            <!-- show error message if somehow mail can't be sent -->
            <!-- <div class="alert error-alert">
                <p></p>
            </div> -->
            <!-- show error message if user entered email is not valid -->
            <!-- <div class="alert error-alert">
                <p></p>
            </div> -->
            <div class="field">
                <input type="hidden" name="order_id" value='<?php echo $order_id;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="admin_code" value='<?php echo $admin_code;?>' >
            </div>
            <div class="field">
                <input type="text" name="reason"  placeholder="Reason" required>
            </div>
            <div class="field btn">
                <div class="layer"></div>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <div class="text">All information will saved into data</div>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $reason = $_POST['reason'];
    $order_id1=$_POST['order_id'];
    $admin_code1=$_POST['admin_code'];
    $query = mysqli_query($con, "update order_detail set order_status='Canceled',order_reason='$reason',admin_confirm='$admin_code1' where order_id='$order_id1'");
    header('Location:order_list.php');

} else {
}
?>
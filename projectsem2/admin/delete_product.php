<?php
include 'config_admin.php';
if(isset($_GET['admin_code'])){
    $admin_code=$_GET['admin_code'];
    $p_id=$_GET['p_id'];
    $p_name=$_GET['p_name'];
    $c_id=$_GET['c_id'];
    $price=$_GET['price'];
    $p_image=$_GET['p_img'];
    $unit=$_GET['unit'];
    $gender=$_GET['gender'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete product</title>
    <link rel="stylesheet" href="css/add_product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <div class="wrapper" style="height: 500px;top: 32%;">
        <div class="icon"><i class="far fa-envelope"></i></div>
        <div class="content">
            <header>Delete product</header>
            <p>Before delete product admin need to put a reason in the form below. Thank you.</p>
        </div>
        <form action="delete_product_process.php" method="POST">
            <div class="field">
                <input type="text" name="reason"  placeholder="Reason" required>
            </div>
            <div class="field btn">
                <div class="layer"></div>
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="text">All information will saved into data</div>
            <div class="field">
                <input type="hidden" name="p_id" value='<?php echo $p_id;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="p_name" value='<?php echo $p_name;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="c_id" value='<?php echo $c_id;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="price" value='<?php echo $price;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="p_image" value='<?php echo $p_image;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="unit" value='<?php echo $unit;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="gender" value='<?php echo $gender;?>' >
            </div>
            <div class="field">
                <input type="hidden" name="admin_code" value='<?php echo $admin_code;?>' >
            </div>
        </form>
    </div>
</body>

</html>
<?php
include 'config_admin.php';
if(isset($_GET['admin_code'])){
    $admin_code=$_GET['admin_code'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="css/add_product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <div class="wrapper" style="max-width: 480px;">
        <div class="icon"><i class="fa fa-plus"></i></div>
        <div class="content">
            <header>Add product</header>
        </div>
        <form action="stock_add_product_process.php" method="POST" enctype="multipart/form-data">

            <div class='field'>
                <label>Name</label>
                <input type='text' name='product_name' value='' placeholder='product name..' required>
            </div>
            <div class='field'>
                <label>Category</label>
                <select name='category' id='' required>
                    <option value="">-----</option>
                    <?php
                    $query = mysqli_query($con, "select cate_id,cate_name from category");
                    while ($data = mysqli_fetch_row($query)) {
                        echo "<option value='" . $data[0] . "'>" . $data[1] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class='field'>
                <label>Discount</label>
                <select name='discount' id=''>
                    <option value="null">--None--</option>
                    <?php
                    $query2 = mysqli_query($con, "select discount_id,discount_name from discount");
                    while ($data2 = mysqli_fetch_row($query2)) {
                        echo "<option value='" . $data2[0] . "'>" . $data2[1] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class='field'>
                <label>Price</label>
                <input type="number" pattern="[0-9]+([\,.][0-9]+)?" step="0.01" name='price' value='' placeholder='enter price..' required>
            </div>
            <div class='field'>
                <label>Unit</label>
                <input type='text' name='unit' value='' placeholder='enter unit...' required>
            </div>
            <div class='field'>
                <label>Gender</label>
                <select name='gender' id=''>
                    <option value='male'>Male</option>
                    <option value='female'>Female</option>
                </select>
            </div>
            <div class='field'>
                <label>Image</label>
                <input type="file" name="image" style="padding-top: 10px;" required>

            </div>

            <div class="field btn">
                <div class="layer"></div>
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class='text'>All information will save into data</div>
            <div class="field">
                <input type="hidden" name="admin_code" value='<?php echo $admin_code;?>' >
            </div>
        </form>
        
    </div>
</body>

</html>
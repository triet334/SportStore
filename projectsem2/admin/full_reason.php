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
            <a href="order_list_process.php?unique_id=<?php echo $unique_id ?>"></a>
        </label>
        <div class="icon"><i class="far fa-envelope"></i></div>
        <div class="content">
            <header>Reason of cancellation</header>
            <div class="field">
            <p><?php if(isset($_GET['reason'])){
                $reason=$_GET['reason'];
                echo $reason;
            }?></p>
            </div>
        </div>

    </div>
</body>

</html>
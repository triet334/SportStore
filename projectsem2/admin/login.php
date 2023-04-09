<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Login Form</title>
   <link rel="stylesheet" href="css/login.css">
</head>

<body>
   <div class="wrapper">
      <div class="title">
         Login Form
      </div>
      <form action="login_process.php" method="post">
         <div class="field">
            <input type="text" name="admin_code" required>
            <label>Staff code</label>
         </div>
         <div class="field">
            <input type="password" name="admin_pass" required>
            <label>Password</label>
         </div>
         <div class="field">
            <input type="submit" name="login" value="Login">
         </div>
      </form>
   </div>
</body>

</html>
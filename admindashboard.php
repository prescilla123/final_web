<?php
@include 'config.php';


session_start();

if(!isset($_SESSION['admin_email'])){
    header('location:login_form.php');
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

    <div class="content">
        <h3>hi<span>admin</span></h3>
        <h1>welcome<span>  <?php echo $_SESSION['admin_email']?></span></h1>
        <p><b>This is an admin page</b></p>
        <a href="login_form.php"  class="btn"><b>Login</b></a>
        <a href="register_form.php"  class="btn"><b>Register</b></a>
        <a href="crudadmin.php"  class="btn"><b>View User</b></a>
        <a href="logout.php"  class="btn"><b>Log Out</b></a>
        
    </div>
    </div>
    
</body>
</html>
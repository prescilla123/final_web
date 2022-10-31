<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    // $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    // $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $address = mysqli_real_escape_string($conn, $_POST['address']);
    // $password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $confirmpassword = md5($_POST['confirmpassword']);
    // $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0){
        
        $row = mysqli_fetch_array($result);
        
        if($row['user_type'] == 'admin'){

            $_SESSION['admin_email'] = $row['email'];
            header('location:admindashboard.php');

        }elseif($row['user_type'] == 'user'){
            
            $_SESSION['user_email'] = $row['email'];
            setcookie("email", $row['email'], time() + (30*24*60*60));
            setcookie("password", $row['password'], time() + (30*24*60*60));
            header('location:userpage.php');
        }
    }else{
        $error[] = 'Incorrect Email or Password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        
        ?>
        <input type="email" value="<?php if (isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>" name="email" required placeholder="Enter Your Email Address">
        <input type="password" value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"  name="password" required placeholder="Enter Your Password">
        <!-- <select name="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select> -->
        <input type="submit" name="submit" value="Login Now" class="form-btn">
        <p>Don't Have An Account?<a href="register_form.php">Register Now</a></p>
    </form>

    </div>
    
</body>
</html>
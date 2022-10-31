<?php
@include 'config.php';

if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'This account already exists!';
    
    }else{
        if($password != $confirmpassword){
            $error[] = 'Password Did Not Matched!';
        }else{
            $insert = "INSERT INTO user(firstname,lastname,email,address,password,confirmpassword,user_type) VALUES('$fname','$lname','$email','$address','$password','$confirmpassword','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">

    <form action="" method="post">
        <h3>Register Now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        
        ?>
        <input type="text" name="fname" required placeholder="Enter Your First Name">
        <input type="text" name="lname" required placeholder="Enter Your Last Name">
        <input type="email" name="email" required placeholder="Enter Your Email">
        <input type="address" name="address" required placeholder="Enter Your Address">
        <input type="password" name="password" required placeholder="Enter Your Password">
        <input type="password" name="confirmpassword" required placeholder="Enter Your Confirm Password">
        <select name="user_type">
            <option value="user">User</option>
            <option value="admin"></option>
        </select>
        <input type="submit" name="submit" value="Register Now" class="form-btn">
        <p>Already Have An Account?<a href="login_form.php">Login Now</a></p>

    </form>


    </div>
    
</body>
</html>
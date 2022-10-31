<?php
	include 'config.php';


// session_start();

// if(isset($_SESSION['admin_name'])){
//     header('location:login_form.php');
// }
$result = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<center>
<table width='80%' border=3px>
<br><br><br><br><br><br><br><br><br><br><
<tr>
    <th>First Name</th> 
    <th>Last Name</th> 
    <th>Email</th>
    <th>Address</th>
    <th>Password</th> 
    <th>Confirm Password</th> 
    <th>User Type</th> 
    <th>Update</th>
</tr>
</center>
<?php  
while($user_data = mysqli_fetch_array($result)) {         
    echo "<tr>";
    echo "<td>".$user_data['firstname']."</td>";
    echo "<td>".$user_data['lastname']."</td>";
    echo "<td>".$user_data['email']."</td>";
    echo "<td>".$user_data['address']."</td>";
    echo "<td>".$user_data['password']."</td>";
    echo "<td>".$user_data['confirmpassword']."</td>";
    echo "<td>".$user_data['user_type']."</td>";   
    echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='deleteuser.php?id=$user_data[id]'>Delete</a></td></tr>";        
}
?>
</table>
<center>
<br/><br/><br/><br/><br/><br/>
<button><a href="add.php">Add New User</a></button>
<button><a href="admindashboard.php">Back To Home</a></button>

</center>
</body>
</html>
<?php
	if(isset($_POST['Submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		$user_type = $_POST['user_type'];
		
	
		include_once("config.php");
				

		$result = mysqli_query($conn, "INSERT INTO user(firstname,lastname,email,address,password,confirmpassword,user_type) VALUES('$firstname','$lastname','$email','$address','$password','$confirmpassword','$user_type')");
		

		echo "User added successfully. <a href='crudadmin.php'>View User</a>";
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
	<link href="style.css" rel="stylesheet">
</head>
<center>
<body>

	<form action="add.php" method="post" name="form1">
			<br><br><br><br>
			<tr> 
				<td class="item" >First Name</td><br>
				<td><input type="text" name="firstname"></td>
			</tr>
			<br><br>
			<tr> 
				<td class="item">Last Name</td><br>
				<td><input type="text" name="lastname"></td>
			</tr>
			<br><br>
			<tr> 
				<td class="item">Email</td><br>
				<td><input type="text" name="email"></td>
			</tr>
			<br><br>
			<tr>
			   <td class="item">Address</td><br>
				<td><input type="text" name="address"></td>
			</tr>
			<br><br>
			<tr> 
				<td class="item">Password</td><br>
				<td><input type="text" name="password"></td>
			</tr>
			<br><br>
			<tr> 
				<td class="item">Confirm Password</td><br>
				<td><input type="text" name="confirmpassword"></td>
			</tr>
			<br><br>
			<tr> 
				<td class="item">User Type</td><br>
				<td><input type="text" name="user_type"></td>
			</tr>
			<br><br>
			<tr> 
				<td></td>
				<td><input class="add" type="submit" name="Submit" value="Add"></td>
			</tr>
		<br><br><br>
	</form>
	<a href="crudadmin.php">Back To View User</a>
	
</body>
<center>
</html>
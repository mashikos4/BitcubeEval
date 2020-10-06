
<!DOCTYPE html>
<html>
<head>
<title>REGISTRATION PAGE</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#0000FF">
<div class="header">
<center><h2>REGISTRATION PAGE</h2></center>
</div>
<div>
<form method="post" action="index.php">
<label><b>Firstname</b></label></br>
<input type="text" class="inputvalues" name="firstname" value=""required></br>

<label><b>Lastname</b></label></br>
<input type="text" class="inputvalues" name="lastname" value=""required></br>

<label><b>Email address</b></label></br>
<input type="text" class="inputvalues"  name="emailaddress" value=""required></br>

<label><b>Password</b></label></br>
<input  type="password" class="inputvalues" name ="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least 1 number and 1 uppercase and lowercase character,1 special character and at least 6 characters long "></br>

<input name ="submit_btn" type="submit" class="register_btn" value="Register"></br>


<?php

require_once('connection.php');

if(isset($_POST['submit_btn']))	
{ 

	$firstname = mysqli_real_escape_string($con,$_POST['firstname']); 
	$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
	$emailaddress = mysqli_real_escape_string($con,$_POST['emailaddress']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	
	
	$user= "SELECT * from users WHERE emailaddress='$emailaddress'";
		$result = mysqli_query($con,$user);
	
	
		if(mysqli_num_rows($result)>0){
			$row= mysqli_fetch_assoc($result);
			
			{
	echo 'Email Address already exist';
			
			}
		}
else{
	$password =md5($password);
			$user = "INSERT INTO  users (firstname, lastname, emailaddress, password) VALUES('$firstname','$lastname', '$emailaddress','$password')";
		$result =mysqli_query($con,$user);
		if($result)
		{
			echo 'Password is incrypted and saved on the database';
		}		
}
}
?>
</div>
</form>
</body>
</html>
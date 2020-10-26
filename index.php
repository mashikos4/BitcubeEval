<!DOCTYPE html>
<html>
<head>
<title> login page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#0000FF">
<div class="header">
<h1>Login Page</h1>
</div>
<div>
<form method="post" action="index.php">
<label><b>Email address</b></label></br>
<input type="text" class="inputvalues" id="user" name="username" value="<?php if(isset($_COOKIE["user"])) { echo $_COOKIE["user"];}?>"required><br/>
<label>Password</label><br/>
<input type="password" name ="password" id= "pass" class="inputvalues"value="<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"];}?>"required><br/>
<input type="checkbox" name="remember" id ="re" <?php if(isset($_COOKIE["user"])){?> checked <?php }?>  ><label for="re">Remember me</label><br/>
<input name ="submit_btn" type="submit" class="login_btn" value="Login"></br>
<?php
$myuser ="Admin@gmail.com";
$mypass ="1234";
if(isset($_POST['submit_btn'])){
$user=$_POST['username'];
$pass=$_POST['password'];
if($user == $myuser and $pass == $mypass){
	if(isset($_POST['remember'])){
		setcookie("user",$user,time()+60*60*7);
		setcookie("pass",$pass,time()+60*60*7);
	}
		session_start();
		$_SESSION['user'] = $user;
		header("location:Welcome.php");
}
		
else {
echo"invalid password or username .<a href='index.php'>Try again</a>";
	}
}
?>
</div>
</form>
<?php
if(isset($_COOKIE['user']) and isset($_COOKIE['pass'])){
$user =$_COOKIE['user'];
$pass =$_COOKIE['pass'];
echo "<script>
document.getElementById('user').value ='$user';
document.getElementById('pass').value ='$pass';
</script>";
}
?>
</body>
</html>
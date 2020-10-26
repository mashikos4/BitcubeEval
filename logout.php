<?php
session_start();
session_destroy();
if(isset($_COOKIE['user']) and isset($_COOKIE['pass'])){
$user =$_COOKIE['user'];
$pass =$_COOKIE['pass'];
		setcookie("user",$user,time()+60*60*7);
		setcookie("pass",$pass,time()+60*60*7);
}
header("location:index.php");
exit();
?>
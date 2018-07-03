<?php
session_start();
session_destroy();
 if (isset($_COOKIE['email']) and isset($_COOKIE['password'])){
	 
	 $email  = $_COOKIE['email'];
	 $password = $_COOKIE['password'];
setcookie('email',$email,time()-1);
setcookie('password',$password,time()-1);
 }
echo "You successfully Logged out click here to try again <a href='login.php'>Login </a> ";
?>
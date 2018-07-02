<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$db="reg";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br> ";

	
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$sql="Select * from login where email='".$email."' and password='".$password."'" ;
		$result = mysqli_query($conn,$sql);
		$user=mysqli_fetch_array($result);
		
		if ($user){
			if(isset($_POST["remember_me"])){
			setcookie('email',$email,time()+ 3600);
			setcookie('password',$password,time()+ 3600);
			}
			session_start();
			$_SESSION['email']=$email;
			header("location: welcome.php");
			
		}
			else{
			echo " <strong>Email or Password  is Invalid <br> click here to try again <a href='login.php'>try again</a> </strong> ";
			}
	}
	else {
		
		header("location: login.php");
	}
?>

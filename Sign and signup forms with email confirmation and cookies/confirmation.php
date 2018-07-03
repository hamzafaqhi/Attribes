
<?php

$email = $_REQUEST['email'];
$code = $_REQUEST['code'];

include('db.php');
	$confirmation=null;
$query ="SELECT confirmationcode FROM signup WHERE email='".$email."'";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$confirmation = $row["confirmationcode"];
		}
}

if($confirmation == null ) {
		echo("<p>Your email is already verified.</p>");
	}
if($code == $confirmation)
{
	
		$sqlUpdate = "UPDATE signup SET confirmed=1, confirmationcode='' WHERE email = '" . $email ."'";
	
	echo "Thank You. Your email has been confimed and you may now login";
}
else
{
	echo "email is not confirmed";	
}

?>

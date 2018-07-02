<?php 
	session_start();
	
	$mail=null;
	if(isset($_SESSION['email'])){
	
	$mail = $_SESSION['email'];
include('db.php');
	
	$sqlResult = "SELECT * FROM signup WHERE email ='" . $mail . "'";
	$result = $conn->query($sqlResult);
	
	// DALOOOOOOOOOOOOOOOOOOO data
	echo '<pre>';
print_r($_POST);
echo '</pre>';
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
 <div class="row">
  <div class="col-md-4" >
   <div class="panel panel-primary">
    <div class="panel-heading">User Information :</div>
     <div class="panel-body">
     <?php 
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
				?>
	  <form name= "myform" method="post">
      <div class="form-group">
	  <label for="fname">Name</label><input type='text' id="fname" name="fname" class='form-control' value="<?php echo $row["f_name"]; ?>" ></div>
      <div class="form-group">
      <label for="lname">Last name : </label><input type='text' id="lname" class='form-control' name="lname" value="<?php echo $row["l_name"]; ?>" ></div>
      <div class="form-group"> 
	  <label for="gender">Gender : </label><input type='text' id="gender" class='form-control' name="gender" value="<?php echo $row["gender"]; ?>"  ></div>
      <div class="form-group">
	  <label for="dob">Date Of Birth : </label><input type='text' id="dob" class='form-control' name="dob"  value="<?php echo $row["dob"]; ?>"
       ></div>
       <div class="form-group">
	  <label for="email">Email :</label><input type='text' id="email" class='form-control' name="email" value="<?php echo $row["email"]; ?>" disabled></div>
      <div class="form-group"> 
      <label for="phone">Number telephone :</label><input type='text' id="phone" class='form-control' name="phone" value="<?php echo $row["phone_no"]; ?>" ></div>
      <div class="form-group">
      <label for="des">Description :</label><textarea name="des" id="des" class="form-control" rows="3"  placeholder="<?php echo $row["description"]; ?>"<?php echo $row["description"]; ?>></textarea> </div>
    <button  name="update" id="update" type="submit" value="update" class="btn btn-primary center">update</button>
    <a  name="logout" id="logout" type="button" value="logout" href="logout.php" class="btn btn-primary center">Log out</a>
    <?php
					}
				}
				?>
    </form>
    </div>
   </div>
  </div>
 </div>
</div>

<?php 


//CHECK KARO AB RUN KER K	

	if(isset($_POST['update']))
	
		// get values 
		$f_name = $_POST["fname"];
		$l_name = $_POST["lname"];
		$dob = $_POST["dob"];
		$gender = $_POST["gender"];
		$phone = $_POST["phone"];
		$description = $_POST["des"];
		$email = $mail;
		$confirmcode = rand();
		
		$query = "UPDATE signup SET f_name='".$f_name."',l_name='".$l_name."',dob='".$dob."',gender='".$gender."',phone_no='".$phone."',description='".$description."' WHERE email ='" . $email . "'";
		
		if ($conn->query($query) >0) {
			
			echo "Record Successfully updated";
		
		
		} else {
			echo "Error updating record: " . $conn->error;
		}
	}
	
?>
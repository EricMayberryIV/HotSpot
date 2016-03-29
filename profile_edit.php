<?php
	session_start();
	
	include("connection.php");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$toedit = $_SESSION["edit_user"];
			$query = mysqli_query($conn, "select U_PHONE, U_IMAGE, U_SCHOOL, U_DOB, U_F_NAME, U_L_NAME from USER where U_USERNAME = '$toedit'");
			$result= mysqli_fetch_assoc($query);
			$fname = $result['U_F_NAME'];
			$lname = $result['U_L_NAME'];
			$birthdate = $result['U_DOB'];
			$image = $result['U_IMAGE'];
			$school = $result['U_SCHOOL'];
			$phone = $result['U_PHONE'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 
  <title>HotSpot Edit Profile</title>
</head>
<body>
	<br>
<!---------------------------------------------------------------------------- TABS ----------------------------------------------------------------------------->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#personal"><b>Edit Profile</b></a></li>
    <li><a data-toggle="tab" href="#password"><b>Password</b></a></li>
    <li><a data-toggle="tab" href="#delete"><b>Delete Acc</b></a></li>
  </ul>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->

  <!-------------------------------------------------------------------- Edit Profile Form Under the Edit Profile Tab ------------------------------------------------>
  <div class="tab-content">
    <div id="personal" class="tab-pane fade in active">
		<div class="jumbotron">
			<h1 class="text-center">Edit Profile</h1>
		</div>
		
		<div class="container">
			<form target="_self" action="editorchanges.php" method="post">
	
				<div class="form-group">
					<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
					<b>Change Profile Picture:</b>
					<input type="file" name="profilepic"><br>
					
					<?php
						echo '<input type="text" name="username" class="form-control"  placeholder="Username" value="'.$toedit.'"></br>';
						echo '<input type="text" name="firstname" class="form-control" placeholder="First Name" value="'.$fname.'"></br>';
						echo '<input type="text" name="lastname" class="form-control"  placeholder="Last Name" value="'.$lname.'"></br>';
						echo '<input type="tel" name="phone" class="form-control" placeholder="Phone Number: Example 8501234567" value="'.$phone.'"></br>';
						echo '<input type="date" name="date" class="form-control" value="'.$birthdate.'"></br>';
					?>
				</div>

				<center><button type="submit" class="btn btn-primary btn-lg">Make Changes</button></center>

			</form>
		</div>
    </div>
	<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
	
	<!-------------------------------------------------------------------- Password Form Under the Password Tab ------------------------------------------------>
    <div id="password" class="tab-pane fade">
		<div class="jumbotron">
			<h1 class="text-center">Change Password</h1>
		</div>
		<div class="container">
			<form target="_self" action="" method="post">
	
				<div class="form-group">
					<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
					<input type="password" name="password" class="form-control"  placeholder="Current Password"></br>
					<input type="password" name="password" class="form-control"  placeholder="New Password"></br>
					<input type="password" name="confirm" class="form-control"  placeholder="Confirm New Password"></br>
				</div>

				<center><button type="submit" class="btn btn-primary btn-lg">Change Password</button></center>

			</form>
		</div>
    </div>
	<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
	
	<!-------------------------------------------------------------------- Delete Account Under the Delete Acc Tab ------------------------------------------------>
    <div id="delete" class="tab-pane fade">
		<div class="jumbotron">
			<h1 class="text-center">Delete Account</h1>
		</div>
		<div class="container">
			<form target="_self" action="" method="post">
	
				<div class="form-group">
					<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
					<input type="password" name="password" class="form-control"  placeholder="Password"></br>
				</div>

				<center><button type="submit" class="btn btn-primary btn-lg">Delete Account</button></center>

			</form>
		</div>
		
    </div>
	<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
  
  </div>

</body>
</html>

<?php
	//session_start();
	
	include("connection.php");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
	
	
	// processes edit form information
	if (isset($_POST['edit_form']) == true)
	{
		$problem = false;
		
		$toedit = $_SESSION["edit_user"];
		$query = mysqli_query($conn, "select U_ID, U_PHONE, U_IMAGE, U_SCHOOL, U_DOB, U_F_NAME, U_L_NAME from USER where U_USERNAME = '$toedit'");
		$result= mysqli_fetch_assoc($query);
		$id = $result['U_ID'];
		$fname = $result['U_F_NAME'];
		$lname = $result['U_L_NAME'];
		$birthdate = $result['U_DOB'];
		$school = $result['U_SCHOOL'];
		$phone = $result['U_PHONE'];
		
		/*
		$image = $_POST['profilepic'];
		$imageurl = file_get_contents($image);
		
		$target_dir =  "img/profile/";
		
		$target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
		
		$bool = move_uploaded_file($_FILES['profilepic']['name'],$target_file);
		mysqli_query($conn, "update USER set U_IMAGE='$target_file' WHERE U_USERNAME='$toedit'");
		
		if (!is_writeable($target_file)) {
			die("Cannot write to destination file");
		}
		
		if ($bool == false)
			echo "true";
		*/
		
		// Handles Changes to Username
		if ($_POST['username'] != "" && $_POST['username'] != $toedit)
		{
			$new = $_POST['username'];
			$usernames = mysqli_query($conn, "select U_USERNAME from USER where U_USERNAME='$new'" );	// Finds rows that match the given username
			$instances = mysqli_num_rows($usernames);
			
			if ($instances > 0)
			{
				echo "Sorry, but that username already exists. Please choose another";
				$problem = true;
			}
			
			else
			{			
				$editor = $_SESSION["login_user"];
				$query = mysqli_query($conn, "select U_ID from USER where U_USERNAME='$editor'" );
				$result= mysqli_fetch_assoc($query);
				$editor_id = $result['U_ID'];
				
				mysqli_query($conn, "update USER set U_USERNAME='$new' WHERE U_ID='$id'");
				
				if ($id == $editor_id)
					$_SESSION["login_user"] = $_POST['username'];
				
			}	
		}
		
		if ($_POST['firstname'] != "" && $_POST['firstname'] != $fname)
		{
			$new = $_POST['firstname'];
			mysqli_query($conn, "update USER set U_F_NAME='$new' WHERE U_ID='$id'");
		}
		
		if ($_POST['lastname'] != "" && $_POST['lastname'] != $lname)
		{
			$new = $_POST['lastname'];
			mysqli_query($conn, "update USER set U_L_NAME='$new' WHERE U_ID='$id'");
		}
		
		if ($_POST['school'] != "" && $_POST['school'] != $school)
		{
			$new = $_POST['school'];
			mysqli_query($conn, "update USER set U_SCHOOL='$new' WHERE U_ID='$id'");
		}
		
		if ($_POST['phone'] != "" && $_POST['phone'] != $phone)
		{
			$new = $_POST['phone'];
			mysqli_query($conn, "update USER set U_PHONE='$new' WHERE U_ID='$id'");
		}
		
		if ($_POST['date'] != "" && $_POST['date'] != $birthdate)
		{
			$new = $_POST['date'];
			mysqli_query($conn, "update USER set U_DOB='$new' WHERE U_ID='$id'");
		}
	}
	
	// processes change password information
	if (isset($_POST['password_form']) == true)
	{
		$problem = false;
		
		$toedit = $_SESSION["edit_user"];
		$query = mysqli_query($conn, "select A_ID, A_PASSWORD from AUTH, USER where U_USERNAME = '$toedit' and U_ID = A_ID");
		$result= mysqli_fetch_assoc($query);
		$current = $result['A_PASSWORD'];
		$id = $result['A_ID'];
		
		if ($_POST['current'] == $current)
		{
			if ($_POST['new'] == $_POST['confirm'])
			{
				$new = $_POST['new'];
				if (strlen($new) < 8)
				{
					echo "Password must be at least 8 characters minimum";
					$problem = true;
				}	
				else
					mysqli_query($conn, "update AUTH set A_PASSWORD='$new' WHERE A_ID='$id'");
			}
			
			else
			{
				echo "Your failed to properly confirm your new password. Please try again.";
				$problem = true;
			}
		}
		else
		{
			echo "The input for your current password was incorrect. Please try again";
			$problem = true;
		}
	}
	
	if (isset($_POST['delete_form']) == true)
	{
		echo "Wassup";
	}
	
	// redirects to profile page if no problem was detected
	if (isset($problem) && !$problem)
		header("location: myprofile.php");
?>
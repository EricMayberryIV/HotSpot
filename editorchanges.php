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
	$school = $result['U_SCHOOL'];
	$phone = $result['U_PHONE'];
	
	$image = $_POST['profilepic'];
	mysqli_query($conn, "update USER set U_IMAGE='$image' WHERE U_USERNAME='$toedit'");
?>
<?php
	include("connection.php");
    
	// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
	
	// Stores user information in variables
		//$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		$date = $_POST['date'];
	
	$query = mysqli_query($conn, "select U_USERNAME from USER where U_USERNAME='$username'" );
	$rows = mysqli_num_rows($query);
	
	do
	{
		$id = intval(microtime(true)) * 4;
	
		while($id > 9999999)
			$id = $id - 1000000;
		
	}while(mysqli_num_rows(mysqli_query($conn, "select U_ID from USER where U_ID='$id'" )) > 0);
	
	
	
	if ($rows == 0 && $password == $confirm)
	{
		mysqli_query($conn, "insert into USER (U_ID, U_ACCT_TYPE, U_USERNAME, U_F_NAME, U_L_NAME, U_DOB)
					values ('$id','L','$username','$firstname','$lastname','$date')");
		mysqli_query($conn, "insert into AUTH (A_ID, A_PASSWORD, USER_U_ID)
					values ('$id','$password','$id')");
	}
?>
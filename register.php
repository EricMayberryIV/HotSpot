<?php
	include("connection.php");

	// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}

	// Stores user information in variables
		//$email = $_POST['email'];
		$firstname = ucfirst(strtolower($_POST['firstname']));
		$lastname = ucfirst(strtolower($_POST['lastname']));
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		$date = $_POST['date'];

	// Verifies that there are no empty inputs within the form
	if ($firstname == "" || $lastname == "" || $username == "" || $password == "" || $confirm == "" || empty($date) == true)
		echo "Please be sure that you have filled out all fields";

	// Verifies that the password meets length requirements
	else if (strlen($password) < 8)
		echo "Password must be at least 8 characters minimum";

	else
	{
		// Searches to find if username already exists
		$query = mysqli_query($conn, "select U_USERNAME from USER where U_USERNAME='$username'" );	// Finds rows that match the given username
		$users = mysqli_num_rows($query);	// Stores the number of users witht that
		                                  // name into $users


		if ($users == 0 && $password == $confirm)
		{
			// Creates a unique User ID
			do
			{
				$id = intval(microtime(true)) * 4;

				while($id > 9999999)
					$id = $id - 1000000;

			}while(mysqli_num_rows(mysqli_query($conn, "select U_ID from USER where U_ID='$id'" )) > 0);

			// Adds user information to the user table
			mysqli_query($conn, "insert into USER (U_ID, U_ACCT_TYPE, U_USERNAME, U_F_NAME, U_L_NAME, U_DOB)
						values ('$id','L','$username','$firstname','$lastname','$date')");

			// adds user information to auth table
			mysqli_query($conn, "insert into AUTH (A_ID, A_PASSWORD, USER_U_ID)
						values ('$id','$password','$id')");

			$_SESSION["login_user"] = $username;
			header("location: myprofile.php");
		}

		// Alerts user that their desired username is already taken
		else if($users > 0)
			echo "Sorry, but that username is already taken. Please try another.";

		// Alerts user that their password field and confirmation field did not match
		else if ($password != $confirm)
			echo "Your passwords do not match. Please try again.";
	}
?>

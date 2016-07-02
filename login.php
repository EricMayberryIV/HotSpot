<?php
		session_start();

		include("connection.php");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

		// Define $username and $password
		$username = $_POST['username'];
		$password=$_POST['password'];

		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query($conn, "select U_USERNAME, A_PASSWORD, U_ACCT_TYPE from user, auth where U_ID = A_ID AND A_PASSWORD ='$password' AND U_USERNAME ='$username'");
		$rows = mysqli_num_rows($query);
         if ($rows == true) {
            $_SESSION["login_user"]="$username"; 	// Initializing Session

		  //$sql = mysqli_query($connection, "select TYPE from USER where EMAIL ='$username' "); //Check the Type of USER
          $result= mysqli_fetch_assoc($query); // Store query result

		  //if ($result['Title'] == "director") {
			//header("location: director_profile.php"); 			// Redirecting To Director Profile
            //}

          if ($result['U_ACCT_TYPE'] == 'L') {
			header("location: myprofile.php"); 			// Redirecting To Staff Profile
            }

          else if ($result['U_ACCT_TYPE'] == 'A') {
			header("location: myprofile.php"); 			// Redirecting To Parent Profile
            }


         }//if Login Successful

       else {
				$error = "Username or Password is invalid.";
		   		echo '<div style="position: fixed; padding-top: 30px; width: 100%; border-radius: 0px;">
			<div class="alert alert-danger alert-dismissable" id="flash-msg1">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
			<strong><i class="fa fa-times"></i>&nbsp;Uh Oh! Login Failed</strong> Please check login credentials and try again.
			</div>
			</div>';
			}

			mysqli_close($conn); // Closing Connection
?>

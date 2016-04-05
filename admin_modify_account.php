<?php
  session_start();
  // Create connection
  include("connection.php");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // Stores user information in variables
    //$email = $_POST['email'];
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    //echo $username;
    // Verifies that there are no empty inputs within the form
  	if ($username == "")
  		{header("location: admin_modify_no_username.php");}
    else
    {
      // Searches to find if username already exists
  		$query = mysqli_query($conn, "select U_USERNAME from USER where U_USERNAME='$username'" );	// Finds rows that match the given username
  		$users = mysqli_num_rows($query);	// Stores the number of users with that name into $users

      if ($users > 0)
      {
      $_SESSION["edit_user"] = $username;
        header("location: profile_edit.php");
      }
      // Alerts user that their desired username is already taken
      else if($users == 0)
      { header("location: admin_modify_error.php"); }
   }
?>

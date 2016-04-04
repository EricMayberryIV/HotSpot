<?php
  session_start(); ?>

<?php
  include("connection.php");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // Stores user information in variables
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    // Verifies that there are no empty inputs within the form
  	if ($username == "")
  		echo "Please be sure that you have filled in the username";
    else
    {
      // Searches to find if username already exists
  		$query = mysqli_query($conn, "select U_USERNAME from USER where U_USERNAME='$username'" );	// Finds rows that match the given username
  		$users = mysqli_num_rows($query);	// Stores the number of users with that name into $users

      if ($users > 0)
      {
        //$_SESSION["login_user"] = $username;
        header("location: admin_reports.html");
      }
      // Alerts user that their desired username is already taken
      else if($users == 0)
        echo "Sorry, but that username is not in the database. Please try another.";
   }
?>

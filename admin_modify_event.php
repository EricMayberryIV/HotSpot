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
    $title = $_POST['title'];
    // Verifies that there are no empty inputs within the form
  	if ($title == "")
  		{header("location: admin_modify_no_username.php");}
    else
    {
  		$query = mysqli_query($conn, "select E_ID from EVENT where E_TITLE='$title'" );
      $result= mysqli_fetch_assoc($query);
      $admin_e_id = $result['E_ID'];
      $enum = mysqli_num_rows($query);

      if ($enum > 0)
      {
        header("location: event_edit.php/?EID=$admin_e_id");
      }
      // Alerts user that their desired username is already taken
      else if($enum == 0)
      { header("location: admin_modify_error.php"); }
   }
?>

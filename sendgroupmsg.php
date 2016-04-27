<?php
  session_start();
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  // Create connection
  include("connection.php");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $groupid = $_GET['gid'];
  $msgSub = isset($_POST['subject']) ? $_POST['subject'] : '';
  $msgBody = isset($_POST['body']) ? $_POST['body'] : '';
  
  $sql = "select U_USERNAME from `USER`, `group` where gr_id='$groupid' and u_id=gr_member order by U_USERNAME";
  $result = $conn->query($sql);
  
  $worked = true;
	while($row = $result->fetch_assoc() ){
		$msgToUser = $row['U_USERNAME'];
	  
		if ($msgToUser != $_SESSION["login_user"])
		{
			$sql0 = "select U_ID from USER where U_USERNAME='$msgToUser';";
			$result0 = $conn->query($sql0);
			if ($result0->num_rows > 0) {
			// output data of each row
			while($row0 = $result0->fetch_assoc()) {
			$msgTo = $row0["U_ID"];}
			} else {
			header('Location: msgError.php');
			}

			$msgFromU = $_SESSION["login_user"];
			$sql1 = "select U_ID from USER where U_USERNAME='$msgFromU';";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
			// output data of each row
			while($row1 = $result1->fetch_assoc()) {
			$msgFrom = $row1["U_ID"];}
			} else {
			header('Location: msgError.php');
			}

			$sql = "INSERT INTO dir_mess (DM_FROM_ID, DM_TO_ID, DM_SUBJECT, DM_MESSAGE,USER_U_ID1) VALUES ($msgFrom,$msgTo,'$msgSub','$msgBody',$msgFrom)";

			$sent = mysqli_query($conn, $sql);
			
			if (!$sent)
				$worked = false;
		}
	}
  if($worked){
    header('Location: msgSuccess.php');
  } else {
    //header('Location: msgError.php');
  }
?>

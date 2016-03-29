<?php
  session_start();
  // Create connection
  include("connection.php");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $msgToUser = isset($_POST['recipient']) ? $_POST['recipient'] : '';
  $msgSub = isset($_POST['subject']) ? $_POST['subject'] : '';
  $msgBody = isset($_POST['body']) ? $_POST['body'] : '';

  $sql0 = "select U_ID from USER where U_USERNAME='$msgToUser';";
  $result0 = $conn->query($sql0);
  if ($result0->num_rows > 0) {
    // output data of each row
    while($row0 = $result0->fetch_assoc()) {
      $msgTo = $row0["U_ID"];}
    } else {
    }

  $msgFromU = $_SESSION["login_user"];
  $sql1 = "select U_ID from USER where U_USERNAME='$msgFromU';";
  $result1 = $conn->query($sql1);
  if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
      $msgFrom = $row1["U_ID"];}
    } else {
    echo "0 results";
    }

    $sql = "INSERT INTO dir_mess (DM_FROM_ID, DM_TO_ID, DM_SUBJECT, DM_MESSAGE,
    USER_U_ID1) VALUES ($msgFrom,$msgTo,'$msgSub','$msgBody',$msgFrom)";

    if(mysqli_query($conn, $sql)){
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>

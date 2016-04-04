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
  $invid = $_GET['invID'];

  $sql = "UPDATE `invite`
          SET `IN_GOING` = 'Y'
          WHERE `invite`.`IN_ID` = $invid ;";

  if ($conn->query($sql) === TRUE) {
    header('Location: successAcc.php?invid=$invid');
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>

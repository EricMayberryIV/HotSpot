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
  $invid = $_GET['invid'];

  $sql = "DELETE FROM invite
          WHERE in_id=$invid";

  if ($conn->query($sql) === TRUE) {
    header('Location: deleteSuccess.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>

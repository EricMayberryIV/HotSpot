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
  $msgid = $_GET['msgid'];

  $sql = "DELETE FROM dir_mess
          WHERE dm_id=$msgid";

         if ($conn->query($sql) === TRUE) {
             header('Location: deleteSuccess.php');
         } else {
             echo "Error deleting record: " . $conn->error;
         }
?>

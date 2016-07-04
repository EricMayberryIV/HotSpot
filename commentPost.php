<?php
  session_start();
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  include("connection.php");
  $EID=$_SESSION["EID"];

  $commentBody = mysqli_real_escape_string($conn, $_POST['commentBody']);

  $UID=$_SESSION["UID"];
  $sqlCommentPost="INSERT INTO feedback (FB_FROM_ID, FB_EVENT_ID, FB_MESS)
                   VALUES ($UID, $EID, '$commentBody')";

  if(mysqli_query($conn, $sqlCommentPost)){
    header('Location: commentSuccess.php');
  } else {
    header('Location: commentError.php');
  }
?>

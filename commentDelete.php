<?php
  session_start();
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  include("connection.php");
  $FBID = $_GET['FBID'];
  $sqlDelComm="DELETE FROM FEEDBACK WHERE FB_ID=$FBID";
  echo $sqlDelComm;
  if ($conn->query($sqlDelComm) === TRUE) {
      header('Location: delCommGood.php');
  } else {
      header('Location: delCommBad.php');
  }
  ?>

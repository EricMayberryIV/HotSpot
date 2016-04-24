<?php
  session_start();
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  include("connection.php");
  $UID=$_SESSION["UID"];
  $EID=$_SESSION["EID"];
  $sql = "INSERT INTO ARRIVAL (ARR_EVENTID,ARR_USERID) VALUES ($EID,$UID)";
  if(mysqli_query($conn, $sql)){
    header("Location: eventArrGood.php");
  } else {
    header("Location: eventArrBad.php");
  }
?>

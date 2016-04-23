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
  echo "<p>UID: ".$UID."<br/>EID: ".$EID."</p>";
  $sql = "INSERT INTO FLAME (F_EVENTID,F_USERID,F_FLAME) VALUES ($EID,$UID,1)";
  if(mysqli_query($conn, $sql)){
    header("Location: flameUpGood.php");
  } else {
    header("Location: flameUpBad.php");
  }
?>

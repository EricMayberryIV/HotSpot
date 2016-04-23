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
  $sql0="select f_id from flame where f_userid = $UID and f_eventid = $EID";
  $result0 = $conn->query($sql0);
  if ($result0->num_rows > 0) {
    while($row0 = $result0->fetch_assoc()) {
      $FID=$row0["f_id"];
      echo "<p>FID: ".$FID."</p>";
      $sql = "DELETE FROM `flame` WHERE F_ID = $FID";
      if ($conn->query($sql) === TRUE) {
      } else {
          header("Location: flameDownBad.php");
      }
    }
  }
  header("Location: flameDownGood.php");
?>

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
  $sql0="select arr_id from arrival where arr_userid = $UID and arr_eventid = $EID";
  $result0 = $conn->query($sql0);
  if ($result0->num_rows > 0) {
    while($row0 = $result0->fetch_assoc()) {
      $ArrID=$row0["arr_id"];
      $sql = "DELETE FROM arrival WHERE arr_id = $ArrID";
      if ($conn->query($sql) === TRUE) {
      } else {
          header("Location: eventArrDelBad.php");
      }
    }
  }
  header("Location: eventArrDelGood.php");
?>

<?php
  session_start();
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  ?><!-- required for all php files within the application -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/event.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Events</title>
  </head>
  <body>
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:38px;" />
      <?php
      // Create connection
      include("connection.php");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $EID = $_GET['EID'];
      $login = $_SESSION["login_user"];
			$query = mysqli_query($conn, "select U_ACCT_TYPE, U_ID, U_IMAGE, U_SCHOOL, U_DOB, U_F_NAME, U_L_NAME from USER where U_USERNAME = '$login'");
			$resultU= mysqli_fetch_assoc($query);
			$UID = $resultU['U_ID'];
      $_SESSION["UID"]= $UID;
      $_SESSION["EID"]=$EID;
      $sql0 = "select f_id from flame where f_eventid = $EID and f_userid = $UID";
      $result0 = $conn->query($sql0);
      if ($result0->num_rows > 0) {
        // output data of each row
        while($row0 = $result0->fetch_assoc()) {
          $FID = $row0["f_id"];
        }
      } else {
        $FID = NULL;
      }
      $sql = "select E_ID, E_CREATOR, E_TITLE, DATE_FORMAT(E_DATE,'%c/%e/%y'),
       TIME_FORMAT(E_TIME_START,'%h:%i %p'),
       TIME_FORMAT(E_TIME_END,'%h:%i %p'), E_DESC, E_AGE_GROUP, E_PRICE
       from EVENT
       where E_ID = $EID
       order by E_DATE, E_TIME_START";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<div class=\"item\">
          <div class=\"well\"><h2 class=\"text-left\">".
          $row["E_TITLE"];
          if (is_null($FID)) {
            echo "<a class=\"btn btn-danger pull-right\" href=\"flameUp.php\" title=\"Add To The Fire!\" role=\"button\"><span class=\"glyphicon glyphicon-fire\"></span></a>";
          } else {
            echo "<a class=\"btn btn-default pull-right\"
            href=\"flameDown.php\" title=\"Extinguish your flame\" role=\"button\"><span class=\"glyphicon glyphicon-fire redtext\"></span></a>";
          }
          echo "</h2><p class=\"text-justify\">".
          $row["E_DESC"].
          "</p><p class=\"small\"><br/>".
          $row["DATE_FORMAT(E_DATE,'%c/%e/%y')"].
          " | ".
          $row["TIME_FORMAT(E_TIME_START,'%h:%i %p')"].
          " | &#36;".
          $row["E_PRICE"].
          "</p><br><a class=\"btn btn-block btn-primary\" role=\"button\" onclick=\"history.go(-1);\">Back</a>
          <br/></div></div>";
        }
      } else {
        echo "Weird! There are no events, I suggest making one happen";
      }
      $conn->close();
      ?>
    </div>

    <?php include("nav.php"); ?>

    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- End JS -->
  </body>
</html>

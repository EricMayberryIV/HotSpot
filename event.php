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
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>
    <div class="container">
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
			$query = mysqli_query($conn, "select U_ACCT_TYPE, U_ID, U_IMAGE, U_SCHOOL,
      U_DOB, U_F_NAME, U_L_NAME from USER where U_USERNAME = '$login'");
			$resultU= mysqli_fetch_assoc($query);
			$UID = $resultU['U_ID'];
      $_SESSION["UID"]= $UID;
      $_SESSION["EID"]=$EID;
      $sqlC = "select count(f_id) from flame where f_eventid = $EID";
      $resultC = $conn->query($sqlC);
      if ($resultC->num_rows > 0) {
        while($rowC = $resultC->fetch_assoc()){
          $count=$rowC["count(f_id)"];
        }
      }
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

      $sqlArr = "SELECT count(arr_id) FROM arrival WHERE arr_userid = $UID;";
      $resultArr = $conn->query($sqlArr);
      if ($resultArr->num_rows > 0) {
        // output data of each row
        while($rowArr = $resultArr->fetch_assoc()) {
          $countArr = $rowArr["count(arr_id)"];
        }
      } else {
        $countArr = 0;
      }

      $sql = "select E.E_ID,
                     U.U_USERNAME,
                     E.E_TITLE,
                     DATE_FORMAT(E.E_DATE,'%c/%e/%y'),
                     TIME_FORMAT(E.E_TIME_START,'%h:%i %p'),
                     TIME_FORMAT(E.E_TIME_END,'%h:%i %p'),
                     E.E_TYPE,
                     E.E_DESC,
                     A.AGE_GROUP,
                     E.E_PRICE,
                     E.E_MUSIC_TYPE,
                     E.E_FOOD,
                     E.E_DRINK,
                     E.E_ATTIRE,
                     E.E_SPONSOR,
                     E.E_BYO
              FROM EVENT E,
                   LT_AGE A,
                   USER U
              WHERE E_ID = $EID
              AND E.E_AGE_GROUP=A.AGE_CODE
              AND E.E_CREATOR=U.U_ID";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $music=$row["E_MUSIC_TYPE"];
          $BYO=$row["E_BYO"];
          $cost=$row["E_PRICE"];
          $attire=$row["E_ATTIRE"];
          $food=["E_FOOD"];
          $drink=$row["E_DRINK"];
          echo "<div class=\"item\">
          <div class=\"well\"><h2 class=\"text-left\">".
          $row["E_TITLE"];
          if (is_null($FID)) {
            echo "<a class=\"btn btn-default pull-right\" href=\"flameUp.php\"
            title=\"Add To The Fire!\" role=\"button\"><span
            class=\"glyphicon glyphicon-fire\"></span></a><span
            class=\"label label-danger pull-right\"
            style=\"margin-right: 4px;\">$count</span></h2>";
          } else {
            echo "
            <a class=\"btn btn-default pull-right\" href=\"flameDown.php\"
            title=\"Extinguish your flame\" role=\"button\">
            <span class=\"glyphicon glyphicon-fire redtext\"></span></a>
            <span class=\"label label-danger pull-right\"
            style=\"margin-right: 4px;\">$count</span></h2>";
          }
          echo "<strong><span class=\"pull-left\">Hosted by: ".
          $row["U_USERNAME"].
          "</span><span class=\"pull-right\">".
          $row["E_TYPE"].
          "</span><br/><center><span>".
          $row["DATE_FORMAT(E.E_DATE,'%c/%e/%y')"].
          " &#64; ".
          $row["TIME_FORMAT(E.E_TIME_START,'%h:%i %p')"].
          "</span></center></strong>
          <p class=\"text-justify\">".
          $row["E_DESC"].
          "</p><br/>
          <table class=\"big\" style=\"width:80%;\">
          <tr>
          <td style=\"width:5%;\">🎧:&nbsp;</td>
          <td style=\"width:40%;\">";
          if(is_null($music)){
            echo "Not Specified";
          } else {
            echo $music;
          }
          echo "</td>
          <td class=\"text-right\" style=\"width:25%;\">BYOB?:&nbsp;</td>
          <td class =\"pull-left\" style=\"width:40%;\">";
          if($BYO=='Y'){
            echo "Yes";
          } else {
            echo "No";
          }
          echo "</td>
          <td style=\"width:10%;\"></td>
          </tr>
          <tr>
          <td style=\"width:5%;\">🍞:&nbsp;</td>
          <td style=\"width:40%;\">";
          if ($food == NULL){
            echo "Not Specified";
          } else {
            $sqlFood="SELECT F.F_FOOD
                      FROM EVENT E,
                           LT_FOOD F
                      WHERE E.E_FOOD_TYPE=F.F_FOOD_TYPE
                      AND E.E_ID = $EID";
            $resultFood=$conn->query($sqlFood);
            if ($resultFood->num_rows > 0) {
              while($row = $resultFood->fetch_assoc()) {
                echo $row["F_FOOD"];
              }
            } else {
              echo "Not Specified";
            }
          }
          echo "</td>
          <td class=\"text-right\" style=\"width:25%;\">👗:&nbsp;</td>
          <td class =\"pull-left\" style=\"width:40%;\">";
          if ($attire == NULL){
            echo "Not Specified";
          } else {
            $sqlAtt="SELECT ATT.ATT_ATTIRE
                      FROM EVENT E,
                           LT_ATTIRE ATT
                      WHERE E.E_ATTIRE_TYPE=ATT.ATT_ATTIRE_TYPE
                      AND E.E_ID = $EID";
            $resultAtt=$conn->query($sqlAtt);
            if ($resultAtt->num_rows > 0) {
              while($row = $resultAtt->fetch_assoc()) {
                echo $row["ATT_ATTIRE"];
              }
            } else {
              echo "Not Specified";
            }
          }
          echo "</td>
          <td style=\"width:10%;\"></td>
          </tr>
          <tr>
          <td style=\"width:5%;\">🍾:&nbsp;</td>
          <td style=\"width:40%;\">";
          if ($drink == NULL){
            echo "Not Specified";
          } else {
            $sqlDrink="SELECT D.D_DRINK
                       FROM EVENT E,
                            LT_DRINK D
                       WHERE E.E_DRINK_TYPE=D.D_DRINK_TYPE
                       AND E.E_ID=$EID";
            $resultDrink=$conn->query($sqlDrink);
            if ($resultDrink->num_rows > 0) {
              while($row = $resultDrink->fetch_assoc()) {
                echo $row["D_DRINK"];
              }
            } else {
              echo "Not Specified";
            }
          }
          echo "</td>
          <td class=\"text-right\" style=\"width:25%;\">💲:&nbsp;</td>
          <td class=\"pull-left\" style=\"width:40%;\">";
          if ($cost > 0){
            echo "&#36;".$cost;
          } else {
            echo "Free";
          }
          echo "</td>
          <td style=\"width:10%;\"></td>
          </tr>
          </table>";
          echo "<br/><div class=\"btn-group btn-group-justified\"
          role=\"group\"><div class=\"btn-group\" role=\"group\">
          <a class=\"btn btn-group btn-primary\" role=\"button\"
          onclick=\"history.go(-1);\">Back</a>
          </div>";
          if ($countArr < 1){
          echo "<a class=\"btn btn-group btn-success\" role=\"button\"
          href=\"eventArr.php\">Check-in</a>
          </div>";
          } else {
            echo "<a class=\"btn btn-group btn-danger\" role=\"button\"
            href=\"eventArrDel.php\">Delete Check-in</a></div>";
          }
        }
      } else {
        echo "Weird! There's nothing here!<br/>".
        $EID."<br/>".
        $UID;
      }
      $conn->close();
      ?>
    </div>
    <br/>
    <span class="btn btn-block btn-primary">Comments</span>

    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- End JS -->
  </body>
</html>

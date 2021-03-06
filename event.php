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
      U_DOB, U_F_NAME, U_L_NAME from user where U_USERNAME = '$login'");
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
                     E.E_SPONSOR_TITLE,
                     E.E_BYO
              FROM event E,
                   lt_age A,
                   user U
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
          $sponsor=$row["E_SPONSOR_TITLE"];
          $spon=$row["E_SPONSOR"];
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
          "</span><br style=\"line-height: 30px;\"/><center><span>".
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
          </tr>
          <tr>
          <td style=\"width:5%;\">🍞:&nbsp;</td>
          <td style=\"width:40%;\">";
          if ($food == NULL){
            echo "Not Specified";
          } else {
            $sqlFood="SELECT F.F_FOOD
                      FROM event E,
                           lt_food F
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
                      FROM event E,
                           lt_attire ATT
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
          </tr>
          <tr>
          <td style=\"width:5%;\">🍾:&nbsp;</td>
          <td style=\"width:40%;\">";
          if ($drink == NULL){
            echo "Not Specified";
          } else {
            $sqlDrink="SELECT D.D_DRINK
                       FROM event E,
                            lt_drink D
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
          <td class=\"text-right\" style=\"width:25%;\">&#36;:&nbsp;</td>
          <td class=\"pull-left\" style=\"width:40%;\">";
          if ($cost > 0){
            echo "&#36;".$cost;
          } else {
            echo "Free";
          }
          echo "</td>
          </tr>
          </table>";
          if($spon == 'N'){
          } else {
            echo "<br/><div class=\"text-center\">
              <p>Sponsored By:</p>
              <p>".
              $sponsor.
              "</p></div>";
          }
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
      ?>
    </div>
    <br/>
    <a href="#" class="btn btn-block btn-primary data-toggle collapsed"
    data-toggle="collapse" data-target="#comments">Comments
    <span class="badge">
    <?php
      $sqlCommCount="SELECT COUNT(FB_ID)
                     FROM feedback
                     WHERE FB_EVENT_ID=$EID";
      $resultCommCount=$conn->query($sqlCommCount);
      if ($resultCommCount->num_rows > 0) {
        while($rowCommCount = $resultCommCount->fetch_assoc()) {
          $commentCount=$rowCommCount["COUNT(FB_ID)"];
          echo $commentCount;
        }
      } else {
      }
    ?>
    </span></a>
    <div id="comments" class="panel-collapse collapse">
      <ul class="list-group">
        <li class ="list-group-item" data-toggle="modal" data-target="#postComment">
          <a href="#"><center><strong>Submit Comment</strong></center></a>
        </li>


        <div class="modal fade" id="postComment">
          <!-- search modal, required for all php files -->
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
                <h3 class="modal-title">Submit Comment</h3>
              </div>
              <div class="modal-body">

                <form action="commentPost.php" method="post">
                  <div class="form-group">
                    <textarea name="commentBody" class="form-control" rows="5" placeholder="Event comments"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
                  <button type="hidden" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php
          $sqlComm="SELECT F.FB_ID,
                           F.FB_FROM_ID,
                           F.FB_EVENT_ID,
                           F.FB_MESS,
                           U.U_USERNAME,
                           DATE_FORMAT(FB_DATETIME,'%m/%d/%y @ %l:%i %p')
                    FROM feedback F,
                         user U
                    WHERE FB_EVENT_ID=$EID
                    AND F.FB_FROM_ID=U.U_ID
                    ORDER BY FB_DATETIME DESC";
          $resultComm=$conn->query($sqlComm);
          if ($resultComm->num_rows > 0) {
            while($rowComm = $resultComm->fetch_assoc()) {
              $rowComment=$rowComm["FB_MESS"];
              $poster=$rowComm["U_USERNAME"];
              $FUID=$rowComm["FB_FROM_ID"];
              $FBID=$rowComm["FB_ID"];
              $postDate=$rowComm["DATE_FORMAT(FB_DATETIME,'%m/%d/%y @ %l:%i %p')"];
              echo "<li class=\"list-group-item\">".
              "<small><strong><span class=\"pull-left\">".
              $poster.
              "</span><span class=\"pull-right\">".
              $postDate;

              if ($UID == $FUID) {
                echo "&nbsp;
                <a class=\"btn btn-danger btn-xs\" role=\"button\" href=\"commentDelete.php?FBID=$FBID\">
                <span class=\"glyphicon glyphicon-trash\"></span>
                </a>";
              }

              echo "</strong></small><br/>".
              $rowComment.
              "</li>";
            }
          } else {
          }
          $conn->close();
        ?>
      </ul>
    </div>
    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

         <!-- jQuery first, then Bootstrap JS. -->
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
         </script>
             <script>window.jQuery || document.write
             ('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
             <script src="js/vendor/bootstrap.min.js"></script>
             <script src="js/collapse.js"></script>
         <!-- End JS -->
  </body>
</html>

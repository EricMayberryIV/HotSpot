<?php
  session_start(); // required for all php files within the application
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/message.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Messages</title>
  </head>
  <body>
    <div class="container">
      <?php include("header.php");
        include("connection.php");
  			// Check connection
  			if ($conn->connect_error) {
  				die("Connection failed: " . $conn->connect_error);
  			}
        $uName = $_SESSION["login_user"];
        $login = $_SESSION["login_user"];
  			$query = mysqli_query($conn, "SELECT u_username,
                                             u_id
                                      FROM USER
                                      WHERE U_USERNAME = '$login'");
  			$result= mysqli_fetch_assoc($query);
  			$uid = $result['u_id'];
      ?>
      <br style="line-height:55px;" />
      <div>
        <div class="jumbotron">
          <?php
          echo "<h2 class=\"text-center\">".$uName."'s Messages</h2>";
          ?>
        </div>
        <div>
          <center>
            <?php include("dm.html"); ?>
          </center>
        </div>
        <br/>
        <div class="btn-group btn-group-justified ">
          <?php
            $sql0 = "SELECT count(in_id)
                     FROM `invite`
                     WHERE in_invitee = $uid";
            $result0 = $conn->query($sql0);
            if ($result0->num_rows > 0) {
              // output data of each row
              while($row0 = $result0->fetch_assoc()) {
                $count0 = $row0["count(in_id)"];
                echo "<a href=\"#\" class=\"btn btn-primary data-toggle collapsed\"
                data-toggle=\"collapse\" data-target=\"#invite\">Invitations
                <span class=\"badge\">".
                $count0.
                "</span></a>";
              }
            } else { echo "0";
            }
          ?>
          <?php
            $sql1 = "SELECT count(dm_id)
                     FROM `dir_mess`
                     WHERE dm_to_id = $uid";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
              // output data of each row
              while($row1 = $result1->fetch_assoc()) {
                $count1 = $row1["count(dm_id)"];
                echo "<a href=\"#\" class=\"btn btn-primary data-toggle collapsed\"
                data-toggle=\"collapse\" data-target=\"#message\">Messages
                <span class=\"badge\">".
                $count1.
                "</span></a>";
              }
            } else { echo "0";
            }
          ?>
        </div>
        <br style="line-height:10px">
        <?php
          $sql2 = "SELECT e.e_id,
                          e.e_title,
                          i.in_id,
                          i.in_event,
                          i.in_invitee,
                          date_format(i.inv_time, '%m/%d/%Y')
                   FROM event e, invite i
                   WHERE e.e_id=i.in_event
                   AND i.in_invitee = $uid
                   ORDER BY inv_time DESC;";
          $result2 = $conn->query($sql2);
        ?>
        <div id="invite" class="panel-collapse collapse">
          <ul class="list-group">
            <?php
                if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {
                  $invID = $row2["in_id"];
                  echo "<a href=\"inv.php?invID=$invID\"
                  class=\"list-group-item\">".
                  $row2["e_title"].
                  "<span class=\"pull-right\">".
                  $row2["date_format(i.inv_time, '%m/%d/%Y')"].
                  "</span></a>";
                }
              } else {
                echo "<li class=\"list-group-item\">You don't have any
                invitations... Yet.</li>";
              }
            ?>
          </ul>
        </div>
        <?php
          $sql3 = "SELECT dm_id,
                          dm_from_id,
                          dm_to_id,
                          dm_subject,
                          dm_message,
                          date_format(dm_date_time, '%m/%d/%Y')
                   FROM `dir_mess`
                   WHERE dm_to_id = $uid
                   ORDER BY dm_date_time DESC";
          $result3 = $conn->query($sql3);
        ?>
        <div id="message" class="panel-collapse collapse">
          <ul class="list-group">
            <?php
                if ($result3->num_rows > 0) {
                // output data of each row
                while($row3 = $result3->fetch_assoc()) {
                  $dmid = $row3["dm_id"];// store E_ID as a variable to pass
                  echo "<a href=\"msg.php?dmid=$dmid\"
                  class=\"list-group-item\">".
                  $row3["dm_subject"].
                  "<span class=\"pull-right\">".
                  $row3["date_format(dm_date_time, '%m/%d/%Y')"].
                  "</span></a>";
                }
              } else {
                echo "<li class=\"list-group-item\">You don't have any
                messages... Yet.</li>";
              }
            ?>
          </ul>
        </div>
      </div>
    </div>

    <?php include("nav.php"); ?>

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

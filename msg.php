<?php
  session_start(); // required for all php files within the application
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/event.css">
    <link rel="stylesheet" type="text/css" href="css/msg.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Read Message</title>
  </head>
  <body>
    <?php
      // Create connection
      include("connection.php");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $dmid = $_GET['dmid'];
    ?>
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:45px;" />
      <div class="jumbotron">
        <?php
          $sql = "SELECT m.dm_id,
                         u.u_username,
                         m.dm_subject,
                         m.dm_message,
                         date_format(m.dm_date_time,'%c/%e/%y %h:%i %p')
                  FROM dir_mess m,
                       user u
                  WHERE u.u_id=m.DM_FROM_ID
                  AND m.dm_id=$dmid";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<h3 class=\"text-center\">".
              $row["dm_subject"].
              "</h3><h6 class=\"pull-left\">From: ".
              $row["u_username"].
              "</h6>".
              "<h6 class=\"pull-right\">Sent: ".
              $row["date_format(m.dm_date_time,'%c/%e/%y %h:%i %p')"].
              "</h6><br style=\"line-height:5px;\" /><hr>".
              $row["dm_message"].
              "</p>";
              $msgid=$row["dm_id"];
              $sender=$row["u_username"];
              $subject=$row["dm_subject"];
            }
          } else {
            echo "Database Error, try reloading the message.";
          }
          $conn->close();
        ?>
      </div>
      <div class="btn-group btn-group-justified" role="group">
        <a class="btn btn-danger" href="delMsg.php?msgid=<?php echo $msgid ?>" role="button">Delete</a>
        <a type="button" class="btn btn-info" data-toggle="modal"
         data-target="#myModal">Reply
       </a>
        <a class="btn btn-default" href="message.php" role="button">Close</a>
      </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;
            </button>
            <h3 class="modal-title">Compose Message</h3>
          </div>
          <form action="sendmsg.php" method="post">
            <div class="modal-body">
              <div class="form-group">
            		<input type="text" name="recipient" value="<?php echo $sender ?>" class="form-control" placeholder="To"><br/>
            		<input type="text" name="subject" value="RE: <?php echo $subject ?>" class="form-control"  placeholder="Subject"><br/>
            		<textarea name="body" class="form-control" rows="13" placeholder="Message"></textarea>
          	   </div>
              <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
              <input type="submit" value="Send" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
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

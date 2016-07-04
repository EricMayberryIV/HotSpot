<?php
  session_start(); // required for all php files within the application
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/event.css">
    <link rel="stylesheet" type="text/css" href="css/inv.css">
    <link rel="stylesheet" type="text/css"
    href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Read Invitation</title>
  </head>
  <body>
    <?php
      // Create connection
      include("connection.php");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $invid = $_GET['invID'];
      $sql = "SELECT i.in_id,
                     e.e_title,
                     u.u_username,
                     TIME_FORMAT(i.inv_time, '%c/%e/%y %l:%i %p'),
                     TIME_FORMAT(e.e_date, '%c/%e/%y'),
                     TIME_FORMAT(e.e_time_start, '%l:%i %p'),
                     e.e_desc,
                     i.in_going,
                     e.e_id
              FROM invite i,
                   event e,
                   user u
              WHERE i.in_event=e.e_id
              AND e.e_creator=u.u_id
              AND i.in_id=$invid ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $eTitle=$row["e_title"];
          $orgUname=$row["u_username"];
          $invTime=$row["TIME_FORMAT(i.inv_time, '%c/%e/%y %l:%i %p')"];
          $eDate=$row["TIME_FORMAT(e.e_date, '%c/%e/%y')"];
          $eTime=$row["TIME_FORMAT(e.e_time_start, '%l:%i %p')"];
          $eDesc=$row["e_desc"];
          $sender=$row["u_username"];
          $subject=$row["e_title"];
          $accepted=$row["in_going"];
          $eid=$row["e_id"];
        }
      } else {
        echo "Database Error, try reloading the invitation.";
      }
    ?>
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:45px;" />
      <div class="jumbotron">
        <p class="text-center">You have been invited to</p>
        <h3 class="text-center"><?php echo "$eTitle"?></h3>
        <h6 class="pull-left"><strong>From: <?php echo "$orgUname"
        ?></strong></h6>
        <h6 class="pull-right">
          <strong>Sent: <?php echo "$invTime" ?></strong>
        </h6>
        <br style="line-height:5px;" /><hr>
        <center>
          <small>Event Date: <?php echo "$eDate" ?> @ <?php echo "$eTime"; ?></small>
        </center>
        <p class="text-justify"><?php echo "$eDesc" ?></p>
        <br style="line-height:30px;"/>
        <a class="btn btn-block btn-primary" href="event.php?EID=<?php echo "$eid"; ?>"
          role="button">View Event</a><br/>
      </div>
      <div class="btn-group btn-group-justified" role="group">
        <a class="btn btn-danger" href="delInv.php?invid=<?php echo $invid; ?>"
          role="button">Delete</a>
        <a type="button" class="btn btn-info" data-toggle="modal"
         data-target="#myModal">Reply
       </a>
       <?php
         if ($accepted == null){
           echo "<a class=\"btn btn-success\" href=\"accInv.php?invID=".
           $invid.
           "\" role=\"button\">Accept</a>";
         } else {

         }
       ?>
        <a class="btn btn-default" onclick="history.go(-1);" role="button">Close</a>
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
            		<input type="text" name="recipient" value="<?php echo $sender ?>"
                class="form-control" placeholder="To"><br/>
            		<input type="text" name="subject" value="RE: [Invitation]
                <?php echo $subject ?>" class="form-control"
                placeholder="Subject"><br/>
            		<textarea name="body" class="form-control" rows="13"
                placeholder="Message"></textarea>
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

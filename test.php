<?php
  session_start(); ?><!-- required for all php files within the application -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/list.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>[TITLE GOES HERE]</title>
  </head>
  <body>
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:38px;" />
      <!-- Begin row -->
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
       data-target="#myModal" style="display: block; width: 100%;">Compose Message
      </button>

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
            <form action="#" method="post">
              <div class="modal-body">
                  <div class="form-group">
                		<input type="text" name="recipient" class="form-control" placeholder="To"><br/>
                		<input type="text" name="subject" class="form-control"  placeholder="Subject"><br/>
                		<textarea name="body" class="form-control" rows="13" placeholder="Message"></textarea>
              	   </div>
              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <input type="reset" value="Clear" class="btn btn-info">
                <input type="submit" value="Send" class="btn btn-primary">
              </div>
            </form>
            <?php
              // Create connection
              include("connection.php");

              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
              $login = $_SESSION["login_user"];
              $sql0 = "select U_ID from USER where U_USERNAME='$login';";
              $result0 = $conn->query($sql0);
              $msgFrom = $row["U_ID"];

              $msgToUser = mysqli_real_escape_string($link, $_POST['recipient']);
              $msgSub = mysqli_real_escape_string($link, $_POST['subject']);
              $msgBody = mysqli_real_escape_string($link, $_POST['body']);

              $sql1 = "select U_ID from USER where U_USERNAME like '$msgToUser';";
              $result1 = $conn->query($sql1);
              $msgTo = $row["U_ID"];
            ?>
          </div>

        </div>
      </div>








      <!--


      $sql3 = "INSERT INTO `dir_mess` (`DM_FROM_ID`, `DM_TO_ID`, `DM_SUBJECT`, `DM_MESSAGE`, `USER_U_ID1`) VALUES ('$msgFrom', '$(TO)', '$msgSub', '$msgBody', '$msgFrom')";

      if(mysqli_query($link, $sql3)){
      }
      else{
        echo "Message failed to send. ERROR: " . mysqli_error($link);
      }
      // close connection
      mysqli_close($link);
      -->

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

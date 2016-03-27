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
        $login = $_SESSION["login_user"];
        ?>
      <br style="line-height:55px;" />
      <div>
        <div class="jumbotron">
          <?php
          echo "<h2 class=\"text-center\">".$login."'s Messages</h2>";
          ?>
        </div>
        <div class="btn-group btn-group-justified ">
          <a href="#" class="btn btn-primary data-toggle collapsed"
          data-toggle="collapse" data-target="#invite">Invitations</a>
          <a href="#" class="btn btn-primary data-toggle collapsed"
          data-toggle="collapse" data-target="#message">Messages</a>
        </div>
        <br style="line-height:10px">
        <div id="invite" class="panel-collapse collapse">
          <ul class="list-group">
            <li class="list-group-item">Invite One</li>
            <li class="list-group-item">Invite Two</li>
            <li class="list-group-item">Invite Three</li>
          </ul>
        </div>
        <div id="message" class="panel-collapse collapse">
          <ul class="list-group">
            <li class="list-group-item">Message One</li>
            <li class="list-group-item">Message Two</li>
            <li class="list-group-item">Message Three</li>
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

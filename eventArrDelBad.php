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
    <meta http-equiv="refresh" content="4;url=<?php echo $_SERVER['HTTP_REFERER'];?>" />

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Error</title>
  </head>
  <body>
    <?php include("header.php"); ?>
    <div class="container"><br/>
      <br/>
      <div class="jumbotron">
        <h1 class="text-center">😿</h1>
        <br/>
        <h4 class="text-center">Something went wrong, we'll send you back so you can try again</h4>
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

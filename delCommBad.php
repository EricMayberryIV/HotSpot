<?php
  session_start(); ?><!-- required for all php files within the application -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta http-equiv="refresh" content="8;url=<?php echo $_SERVER['HTTP_REFERER'];?>" />

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Error Page</title>
  </head>
  <body>
    <div class="container">
    <?php include("header.php"); ?>

    <br style="line-height:42px;" />
      <div class="jumbotron">
        <h3 class="text-center">
          Damn, yo
        </h3>
        <br/>
        <h4 class="text-center">
          There was an error and your comment wasn't deleted.
        </h4>
        <br/>
        <h5 class="text-center">Don't worry about it, I'll take you back so you
          can try again.
        </h5>
      </div>


    <?php include("nav.php"); ?>
  </div>

    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- End JS -->
  </body>
</html>

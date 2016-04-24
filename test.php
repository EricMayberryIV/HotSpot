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
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>TEST PAGE</title>
  </head>
  <body>
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:38px;" />
      <div class="jumbotron">
        <table class="big">
          <tr>
            <td style="width:5%;">🎧:</td>
            <td style="width:40%;">Hip-Hop</td>
            <td style="width:25%;">BYOB?:</td>
            <td class ="pull-right" style="width:40%;">Yes</td>
            <td style="width:10%;"></td>
          </tr>
          <tr>
            <td style="width:5%;">🍞:</td>
            <td style="width:40%;">Burgers</td>
            <td style="width:25%;">👗:</td>
            <td class ="pull-right" style="width:40%;">Casual</td>
            <td style="width:10%;"></td>
          </tr>
          <tr>
            <td style="width:5%;">🍾:</td>
            <td style="width:40%;">Alcohol</td>
            <td style="width:25%;">💲:</td>
            <td class ="pull-right" style="width:40%;">&#36;0.00</td>
            <td style="width:10%;"></td>
          </tr>
        </table>
        <br/>
        <div class="text-center">
          <p>Sponsored By:</p>
          <p>
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

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
    <link rel="stylesheet" type="text/css" href="css/event.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | Events</title>
  </head>
  <body>
    <div class="container">
      <?php
      // Create connection
      include("connection.php");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $EID = $_GET['EID'];
      $sql = "select E_ID, E_CREATOR, E_TITLE, DATE_FORMAT(E_DATE,'%c/%e/%y'),
       TIME_FORMAT(E_TIME_START,'%h:%i %p'),
       TIME_FORMAT(E_TIME_END,'%h:%i %p'), E_DESC, E_AGE_GROUP, E_PRICE
       from EVENT
       where E_DATE >= CURDATE()
       AND E_PRIVATE = 'N'
       AND E_ID = $EID
       order by E_DATE, E_TIME_START";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<div class=\"item\">
          <div class=\"well\"><h2 class=\"text-center\">".
          $row["E_TITLE"].
          "</h2><p class=\"text-justify\">".
          $row["E_DESC"].
          "</p><p class=\"small\"><br/>".
          $row["DATE_FORMAT(E_DATE,'%c/%e/%y')"].
          " | ".
          $row["TIME_FORMAT(E_TIME_START,'%h:%i %p')"].
          " | &#36;".
          $row["E_PRICE"].
          "</p></div></div>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
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

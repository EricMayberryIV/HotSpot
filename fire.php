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
    <link rel="stylesheet" type="text/css" href="css/list.css">
      <!-- home.css copied from tiles.css -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <title>HotSpot | Fire</title>
  </head>

  <body>
    <!-- Begin container -->
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:38px;" />
      <!-- Begin row -->
      <div class="row">
        <?php
        // Create connection
        include("connection.php");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT DISTINCT E.E_ID,
                                E_TITLE,
                                DATE_FORMAT(E_DATE, '%c/%e/%y'),
                                TIME_FORMAT(E_TIME_START, '%h:%i %p'),
                                SUBSTRING(E_DESC, 1, 150),
                                E_PRICE
                FROM event E,
                     flame F
                WHERE E.E_ID = F.F_EVENTID
                AND E_DATE >= CURDATE()
                AND E_PRIVATE = 'N'
                GROUP BY E.E_ID
                ORDER BY COUNT(f.f_flame) DESC,
                                 E_DATE,
                                 E_TIME_START;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $EID = $row["E_ID"];// store E_ID as a variable to pass
            echo "<a href=\"event.php?EID=$EID\" class=\"item\">
            <div class=\"well\"><h3>".
            $row["E_TITLE"].
            "</h3><p class=\"text-justify\">".
            $row["SUBSTRING(E_DESC, 1, 150)"].
            "</p><br/><p class=\"small\">".
            $row["DATE_FORMAT(E_DATE, '%c/%e/%y')"].
            " | ".
            $row["TIME_FORMAT(E_TIME_START, '%h:%i %p')"].
            " | &#36;".
            $row["E_PRICE"].
            "</p></div></a>";
          }
        } else {
          echo "<div class=\"jumbotron\"><h2>There aren't any active HotSpots
          at the moment<</h2>/div>";
        }
        $conn->close();
        ?>
      </div>
      <!-- End row -->
    </div>

    <div>
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

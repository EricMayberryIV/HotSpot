<?php
  session_start(); // required for all php files within the application
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  $q = isset($_POST['Q']) ? $_POST['Q'] : '';
?>
<?php if(!isset($q)) : ?>
<?php else : ?>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,
          shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

        <!-- CSS links go here -->
        <link rel="stylesheet" type="text/css" href="css/template.css">
        <link rel="stylesheet" type="text/css"
        href="css/bootstrap-theme.min.css">
        <!-- End CSS links -->

        <!-- Special font links go here -->
        <!-- End font links -->

        <title>Search Results</title>
      </head>
      <body>
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
                die("Connection failed: ".$conn->connect_error);
            }
            $sql = "SELECT e_id,
                           e_title,
                           DATE_FORMAT(e_date,'%c/%e/%y'),
                           TIME_FORMAT(e_time_start,'%h:%i %p'),
                           SUBSTRING(e_desc, 1, 150),
                           e_desc,
                           e_price
                    FROM `event`
                    WHERE e_private != 'Y'
                    AND e_date >= CURDATE()
                    AND (e_title LIKE '%$q%'
                         OR e_desc LIKE '%$q%')
                    ORDER BY e_date,
                             e_time_start";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $EID = $row["e_id"];// store E_ID as a variable to pass
                echo "<a href=\"event.php?EID=$EID\" class=\"item\">
                <div class=\"well\"><h3>".
                $row["e_title"].
                "</h3><p class=\"text-justify\">".
                $row["SUBSTRING(e_desc, 1, 150)"].
                "</p><br/><p class=\"small\">".
                $row["DATE_FORMAT(e_date,'%c/%e/%y')"].
                " | ".
                $row["TIME_FORMAT(e_time_start,'%h:%i %p')"].
                " | &#36;".
                $row["e_price"].
                "</p></div></a>";
              }
            } else {
              echo "<div class=\"jumbotron\"><h1 class=\"text-center\">
              Well, 💩...</h1><br><h2 class=\"text-center\">We didn't find anything</h2><br style=\"line-height:20px;\" /><h4 class=\"text-center\">No worries, we'll take you back so you can try something else.</h4></div>";
              echo "<meta http-equiv=\"refresh\" content=\"4;url=\"".$_SERVER['HTTP_REFERER']." \>";
            }
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
<?php endif; ?>

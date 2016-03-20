<?php
  session_start();
?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script:700'
      rel='stylesheet' type='text/css'>
    <!-- End font links -->

    <title>HotSpot | About</title>
  </head>

  <body>
    <ol class="breadcrumb navbar-fixed-top">
      <li><a href="index.php">HotSpot</a></li>
      <li class="active">About</li>
    </ol>

    <br/>

    <div class="container">

      <div class="jumbotron">
        <h1 class="text-center">HotSpot</h1>
        <?php
        // Tutorial found at https://youtu.be/EwuVD3Zi-GI

        // Connect to the database
        $mysqli = NEW MySQLi('localhost', 'root', '', 'HOTSPOT');
        echo "<h2 class=\"text-center\">About</h2>";

        // Query the database
        $resultSet = $mysqli->query("SELECT ABOUT_INFO from ABOUT");

        // Count the returned rows
        if($resultSet->num_rows != 0){

        // Turn the results into an array
          while($rows = $resultSet->fetch_assoc() )
          {
            $about = $rows['ABOUT_INFO'];
            echo "<p class=\"text-justify text-center\">$about</p>";
          };

        // Display the results
        }else{
            echo "No results.";
        };
        ?>
        <a class="btn btn-success btn-lg btn-block" href="register_page.php" role="button">Register</a>
      </div>

    </div>

    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- End JS -->

  </body>

</html>

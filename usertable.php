<?php
  session_start();
?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <!-- Special font links go here -->
    <!-- End font links -->

    <title>HotSpot | User Table</title>
  </head>

  <body>
    <div class="container">
      <?php include("header.php"); ?>
      <br style="line-height:38px;" />
      <h1 class="text-center">HotSpot Users</h1><br/>
      <table class="table table-striped">
        <thead>
          <tr><th>First Name</th><th>Last Name</th><th>Username</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");
          // Create connection
          $conn = new mysqli($servername, $username, $password, $db);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT U_F_NAME, U_L_NAME, U_USERNAME FROM USER";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>".$row["U_F_NAME"]."</td><td>".$row["U_L_NAME"].
                  "</td><td>".$row["U_USERNAME"]."</td></tr>";
              }
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
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

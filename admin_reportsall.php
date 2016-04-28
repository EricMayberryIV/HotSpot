<?php
  session_start();
  // Create connection
  include("connection.php");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
		$result = mysqli_query($conn, "select * from USER" );

    include("header.php");

      echo "
      <html>
      <body>
      <head>
      <meta charset='utf-8'>
      <link rel='stylesheet' type='text/css' href='css/template.css'>
      <link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <script type='text/javascript' src='//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js'></script>
      <link rel='stylesheet' type='text/css' href='//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css' />
      <title>Report</title>
      </head>
      <br>
      <br>
      <br>
      <h4 align='center'><b>Report</b></h4>
      <br>
      <style type='text/css'>
     .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
     .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
     .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
     .tg .tg-1oey{font-family:Impact, Charcoal, sans-serif !important;;background-color:#ffffff;color:#3531ff;vertical-align:top}
     .tg .tg-yw4l{vertical-align:top}
     .tg .tg-3we0{background-color:#ffffff;vertical-align:top}
     </style>
      <table class='tg' id= results align='center'>
      <tr>
      <th>ID</th>
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Date of Birth</th>
      <th>School</th>
      <th>Phone</th>
      </tr>";

    while ($row = mysqli_fetch_object($result)) {
       echo "<tr>";
       echo "<td contenteditable='true'>" . $row->U_ID . "</td>";
       echo "<td contenteditable='true'>" . $row->U_USERNAME . "</td>";
       echo "<td contenteditable='true'>" . $row->U_F_NAME . "</td>";
       echo "<td contenteditable='true'>" . $row->U_L_NAME . "</td>";
       echo "<td contenteditable='true'>" . $row->U_DOB . "</td>";
       echo "<td contenteditable='true'>" . $row->U_SCHOOL . "</td>";
       echo "<td contenteditable='true'>" . $row->U_PHONE . "</td>";
       echo "</tr>";    }
       echo "</table>";
    include("nav.php");
?>

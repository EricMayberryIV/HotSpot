<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<body>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/template.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<?php
include("header.php");
?>
</head>
<br>
<br><br>
<h4 align="center"><b>Administrator Home Page</b></h4>
<br>
<div class="list-group">
 <a href="admin_reports_page.php" class="list-group-item">Reports</a>
 <a href="admin_modify_account_page.php" class="list-group-item">Modify Account</a>
 <a href="admin_modify_event_page.php" class="list-group-item">Modify Event</a>
</div>
<?php
include("nav.php");
?>
</body>
</html>

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>SociaLyte Account Modification</title>
</head>
<div class="container">
	<?php
	include("header.php");
	?>
<br><br> <br>
<h4 align="center"><b>Event Modification</b></h4>
<br>
<form action="admin_modify_event.php" method="post" size="3">
 Event Title:<br>
 <input type="text" name="title"><br><br>
 <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
<?php
include("nav.php");
?>
</body>
</html>

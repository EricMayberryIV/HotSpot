<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administrator Account Modification</title>
</head>
<div class="container">
<?php
  include("admin_modify_account.php");
?>
<ol class="breadcrumb navbar-fixed-top text-center">
  <li><a href="list.php"><font size="4">HotSpot Administrator</font></a></li>
</ol>
<br> <br>
<h5 align="center"><u>SociaLyte Account Modification</u></h5>
<form>
 SociaLyte Username:<br>
 <input type="text" name="username"><br><br>
 <input type="submit" value="Submit">
</form>
</div>
</body>
</html>

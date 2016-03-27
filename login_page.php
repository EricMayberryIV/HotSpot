<!DOCTYPE html>
<?php
	session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HotSpot Login</title>
  </head>
  <body>
	<div class="jumbotron">
        <h1 class="text-center">Login</h1>
    </div>
	
	<div class="container">

	<h4 align="center">Sign in using your Hotspot account</h4>
	</br>
    <form action="login.php" method="post">
	
	<div class="form-group">
		<input type="username" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username"></br>
		<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	</div>

	<center><button type="submit" class="btn btn-primary btn-lg">Login</button></center>

	</form>

	</div>

  </body>
</html>

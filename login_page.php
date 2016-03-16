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
	</br>
	</br>
	</br>
	<div class="container">

	<h4>Sign in using your Hotspot account: </h4>

    <form action="login.php" method="post">
	
	<div class="form-group">
		<label for="exampleInputEmail1">Username or Email address:</label>
		<input type="username" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
	</div>

	<div class="form-group">
		<label for="exampleInputPassword1">Password:</label>
		<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	</div>

	<button type="submit" class="btn btn-primary btn-lg">Login</button>

	</form>

	</div>

  </body>
</html>

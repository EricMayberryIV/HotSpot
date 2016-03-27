<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HotSpot Registration</title>
  </head>
  <body>
	<div class="jumbotron">
        <h1 class="text-center">Registration</h1>
    </div>

	<div class="container">
	<center><b>
	<?php
		if (count($_POST) > 0)
		{
			include("register.php");
		}
	?>
	</b></center>
    <form target="_self" action="" method="post">

	<div class="form-group">
		<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
		<input type="text" name="username" class="form-control"  placeholder="Username"></br>
		<input type="password" name="password" class="form-control"  placeholder="Password"></br>
		<input type="password" name="confirm" class="form-control"  placeholder="Confirm Password"></br>
		<input type="text" name="firstname" class="form-control" placeholder="First Name"></br>
		<input type="text" name="lastname" class="form-control"  placeholder="Last Name"></br>
		<input type="date" name="date" class="form-control" placeholder="DOB (YYYY-MM-DD)"></br>
	</div>

	<center><button type="submit" class="btn btn-primary btn-lg">Submit</button></center>

	</form>

	</div>

  </body>
</html>

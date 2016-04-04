<?php
	session_start();
	
	if ($_GET['EID'] == "new")
		
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
  
<!---------------------------------------------------------------------------- TABS ----------------------------------------------------------------------------->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#details"><b>Edit Event</b></a></li>
    <li><a data-toggle="tab" href="#invites"><b>Manage Invites</b></a></li>
  </ul>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
<!--form target="_self" action="" method="post"-->
<div class="tab-content">
<!-------------------------------------------------------------------- Edit Profile Form Under the Edit Profile Tab ------------------------------------------------>
    <div id="details" class="tab-pane fade in active">
		<div class="jumbotron">
			<h1 class="text-center">Event Details</h1>
		</div>

		<div class="container">
			<center><b>
			<?php
			
			?>
			</b></center>
			
			<div class="form-group">
				<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
				<input type="text" name="title" class="form-control"  placeholder="Event Name/Title"></br>
				<input type="date" name="date" class="form-control"></br>
				Start Time: <input type="time" name="start" class="form-control"><br>
				End Time: <input type="time" name="end" class="form-control"><br>
				<textarea class="form-control" rows="3"></textarea>
			</div>
		</div>
	</div>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
<!-------------------------------------------------------------------- Edit Profile Form Under the Edit Profile Tab ------------------------------------------------>
    <div id="invites" class="tab-pane fade">
		<div class="jumbotron">
			<h1 class="text-center">Invites List</h1>
		</div>

		<div class="container">
		<center><b>
		<?php
		
		?>
		</b></center>
		
			<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
			<input type="text" name="title" class="form-control"  placeholder="Event Name/Title"></br>
			<input type="date" name="date" class="form-control"></br>
			Start Time: <input type="time" name="start" class="form-control"><br>
			End Time: <input type="time" name="end" class="form-control"><br>
			<textarea class="form-control" rows="3"></textarea>
		</div>
	</div>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
<!-- /div-->
<br>	
	<center><button type="submit" class="btn btn-primary btn-lg">
	<?php
		if ($_GET['EID'] == "new")
			echo "Create Event";
		else
			echo "Finish Changes";
	?>
	</button></center>
</form>


  </body>
</html>

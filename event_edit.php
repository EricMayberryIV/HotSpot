<?php
	session_start();
	
	include("connection.php");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
	if ($_GET['EID'] != "new")
	{
		$e_id = $_GET['EID'];
		$query = mysqli_query($conn, "select E_TITLE, E_DATE, E_TIME_START, E_TIME_END, E_DESC from EVENT where E_ID = '$e_id'");
		$result= mysqli_fetch_assoc($query);
		$title = $result['E_TITLE'];
 		$date = $result['E_DATE'];
		$start = $result['E_TIME_START'];
		$end = $result['E_TIME_END'];
		$desc = $result['E_DESC'];
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <title>HotSpot Registration</title>
  </head>
  <body>
  
<!---------------------------------------------------------------------------- TABS ----------------------------------------------------------------------------->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#details"><b>Edit Event</b></a></li>
    <li><a data-toggle="tab" href="#invites"><b>Manage Invites</b></a></li>
  </ul>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
<form target="_self" action="" method="post" id="event_edit">
<div class="tab-content">
<!-------------------------------------------------------------------- Edit Profile Form Under the Edit Profile Tab ------------------------------------------------>
    <div id="details" class="tab-pane fade in active">
		<div class="jumbotron">
			<h1 class="text-center">Event Details</h1>
		</div>

		<div class="container">
			<center><b>
			<?php
				include("eventchanges.php");
			?>
			</b></center>
			
			<div class="form-group" action="" target="_self">
				<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
				<input type="text" name="title" class="form-control"  placeholder="Event Name/Title" value=
				<?php
					if ($_GET['EID'] != "new")
						echo $title;
					else
						echo "";
				?>>
				</br>
				<input type="date" name="date" class="form-control" value=
				<?php
					if ($_GET['EID'] != "new")
						echo $date;
					else
						echo "";
				?>>
				</br>
				Start Time: <input type="time" name="start" class="form-control" value=
				<?php
					if ($_GET['EID'] != "new")
						echo $start;
					else
						echo "";
				?>>
				<br>
				End Time: <input type="time" name="end" class="form-control" value=
				<?php
					if ($_GET['EID'] != "new")
						echo $end;
					else
						echo "";
				?>>
				<br>
				<?php
				echo '<textarea class="form-control" form="event_edit" name="desc" rows="3" placeholder="Event Description Here . . . ">';
					if ($_GET['EID'] != "new")
						echo $desc;
				//echo '">';
				?>
				</textarea>
			</div>
		</div>
	<center><button type="submit" name="eventmade" class="btn btn-primary btn-lg">
	<?php
		if ($_GET['EID'] == "new")
			echo "Create Event";
		else
			echo "Finish Changes";
	?>
	</button></center>
	
	</div>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
</form>
<!-------------------------------------------------------------------- Edit Profile Form Under the Edit Profile Tab ------------------------------------------------>
    <div id="invites" class="tab-pane fade">
		<div class="jumbotron">
			<h1 class="text-center">Invites List</h1>
		</div>
		
		<div class="container">
			<center><b>
			<?php
				if (isset($_POST['invite']) && $_GET['EID'] != "new")
				{
					$invite = $_POST['invitee'];
					$query = mysqli_query($conn, "select U_ID from USER where U_USERNAME = '$invite'");
					$result= mysqli_fetch_assoc($query);
					$invitee_id = $result['U_ID'];
					if (mysqli_num_rows($query) == 1)
					{
						mysqli_query($conn, "insert into INVITE (IN_INVITEE, EVENT_E_ID, USER_U_ID)
						values ('$invitee_id', '$e_id', '$invitee_id')");
					}
					else
						echo "We're sorry but the name you gave isn't in the system. Try again.";
				}
				
				else if (isset($_POST['invite']) && $_GET['EID'] == "new")
					echo "Please create an event before inviting friends.";
			?>
			</b></center>
			<form target="_self" action="" method="post" >
			<div class="input-group">
				<input type="text" class="form-control" name="invitee" placeholder="Search by Username">
				<div class="input-group-btn">
					<button type="submit" class="btn btn-primary" name="invite">Invite</button>
				</div>
			</div>
			</form>
			
			<br>
			<table class="table table-striped">
				<tr>
					<td><b>#</b></td>
					<td><b>Username</b></td>
					<td><b>First</b></td>
					<td><b>Last</b></td>
				</tr>
			<?php
				if ($_GET['EID'] != "new")
				{
					$sql = "select U_USERNAME, U_F_NAME, U_L_NAME from USER, INVITE where EVENT_E_ID='$e_id' and IN_INVITEE=U_ID order by U_USERNAME";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						$count = 1;
						// output data of each row
						while($row = $result->fetch_assoc()) 
						{
							$iuser = $row['U_USERNAME'];
							$ifname = $row['U_F_NAME'];
							$ilname = $row['U_L_NAME'];
							
							echo '<tr><td>'.$count.'</td><td>'.$iuser.'</td><td>'.$ifname.'</td><td>'.$ilname.'</td></tr>';
							$count = $count + 1;
						}
					}				
					else 
					  echo "No one has been invited yet.";
				}
			?>
			</table>
		</div>
		
		<center><a class="btn btn-primary btn-lg" role="button" href="myprofile.php">Done</a></center>
	</div>
<!---------------------------------------------------------------------------- END ----------------------------------------------------------------------------->
</div>
<br>

</body>
</html>

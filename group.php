<?php
	session_start();
	include("header.php");
	
	include("connection.php");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$groupid = $_GET["group"];		
	$login = $_SESSION["login_user"];
	$query = mysqli_query($conn, "SELECT u_id, gr_name, gr_creator FROM user,`group` where u_id=gr_member and u_username='$login' and gr_id = '$groupid'");
	$result= mysqli_fetch_assoc($query);
	$creator = $result['gr_creator'];
	$groupname = $result['gr_name'];
	$my_id = $result['u_id'];
	if ($query->num_rows == 0)
		header("location: myprofile.php");
	
	if (isset($_POST['leavegroup']))
	{
		$query = "DELETE FROM `group` WHERE `group`.`GR_ID` = '$groupid' AND `group`.`GR_MEMBER` = '$my_id'";
		mysqli_query($conn, $query);
		header("location: myprofile.php");
	}
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

    <title>HotSpot Group</title>
  </head>
  <body>
    <div class="jumbotron">
		<center>
			<h1><?php echo $result['gr_name']; ?></h1><br>
			<form method="post" action="">
				<input type="submit" class="btn btn-default btn-sm" role="button" value="Leave Group" name="leavegroup">
			</form>
		</center>
	</div>
	
	<div class="container">
		<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"data-target="#myModal">Compose Message</button>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;
				</button>
				<h3 class="modal-title">Compose Message</h3>
			  </div>
			  <form action=<?php echo '"sendgroupmsg.php?gid='.$groupid.'"'; ?> method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="subject" class="form-control"  placeholder="Subject"><br/>
						<textarea name="body" class="form-control" rows="13" placeholder="Message"></textarea>
					</div>
				  <a class="btn btn-default" data-dismiss="modal">Cancel</a>
				  <input type="reset" value="Clear" class="btn btn-info">
				  <input type="submit" value="Send" class="btn btn-primary">
				</div>
			  </form>
			</div>

		  </div>
		</div>
		<br>
		
		<?php
		if (isset($_POST['newmember']))
				{
					$newmember = $_POST['newmember'];
					$query = mysqli_query($conn, "select U_ID from USER where U_USERNAME = '$newmember'");
					$result= mysqli_fetch_assoc($query);
					$member_id = $result['U_ID'];
					if (mysqli_num_rows($query) == 1)
					{
						$updated = mysqli_query($conn, "insert into `GROUP` (GR_ID, GR_CREATOR, GR_MEMBER, GR_NAME, USER_U_ID)values ('$groupid', '$creator', '$member_id', '$groupname', '$creator')");
						//if ($updated)
						//	echo "done";
					}
					else
						echo "We're sorry but the name you gave isn't in the system. Try again.";
				}
		?>
		
		<form target="_self" action="" method="post" >
			<div class="input-group">
				<input type="text" class="form-control" name="newmember" placeholder="Search by Username">
				<div class="input-group-btn">
					<button type="submit" class="btn btn-primary" name="invite">Add Member</button>
				</div>
			</div>
		</form>
		<br>
		
		<table class="table table-striped">
				<tr>
					<th colspan="4"><b><center>MEMBERS LIST</center></b></th>
				</tr>
				<tr>
					<td><b>#</b></td>
					<td><b>Username</b></td>
					<td><b>First</b></td>
					<td><b>Last</b></td>
				</tr>
		<?php
			$sql = "select U_USERNAME, U_F_NAME, U_L_NAME from `USER`, `group` where gr_id='$groupid' and u_id=gr_member order by U_USERNAME";
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
			?>
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

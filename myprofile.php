<?php
  session_start();
?><!-- required for all php files within the application -->
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php
		include("header.php");

		include("connection.php");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$login = $_SESSION["login_user"];
			$query = mysqli_query($conn, "select U_ACCT_TYPE, U_ID, U_IMAGE, U_SCHOOL, U_DOB, U_F_NAME, U_L_NAME from USER where U_USERNAME = '$login'");
			$result= mysqli_fetch_assoc($query);
			$acct = $result['U_ACCT_TYPE'];
			$fname = $result['U_F_NAME'];
			$lname = $result['U_L_NAME'];
			$birthdate = $result['U_DOB'];
			$user = $login;
			$image = $result['U_IMAGE'];
			$school = $result['U_SCHOOL'];
			$_SESSION["edit_user"] = "$login";
			// Gives user a blank profile picture if they do not already have one set
			if ($image == NULL)
				$image = "img/profile/blank_profile.jpg";
			if ($school == NULL)
				$school = "";
	?>
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

    <title>
		<?php
			echo $login." Profile";
		?>
	</title>
  </head>
  <body>
    <div class="container">
		<?php include("header.php"); ?>
		<br style="line-height:38px;" />
		<center>
		<h4>Welcome
		<?php
			echo " ".$login;
		?>
		</h4>
		<?php
			echo '<img src="'.$image.'" class="img-circle" alt="Cinque Terre" width="200" height="200">';
		?>
		<p>
		<?php
			// Outputs Name
			echo $fname." ".$lname;
			echo '<br>';
			// Outputs Age
			echo date_diff(date_create($birthdate), date_create('today'))->y." years old";
			echo '<br>';
			echo $school;
			echo '<br>';
		?>
		<br>
		</p>
		</center>

		<!---------------------------------------------------------------------------- MY EVENTS DROPDOWN ---------------------------------------------------->
		<a class="btn btn-primary btn-block" href="#" class="btn btn-info data-toggle collapsed"
          data-toggle="collapse" data-target="#events">My Events</a>

        <div id="events" class="panel-collapse collapse">
          <ul class="list-group">
            <a href="event_edit.php?EID=new" class="list-group-item" role="button">Create New Event</a>
			<?php
				$query = "select E_ID, E_TITLE, E_DATE, SUBSTRING(E_DESC, 1, 100) from EVENT, USER where U_USERNAME = '$login' and E_CREATOR = U_ID order by E_DATE";
				$result = $conn->query($query);
				//$rows = mysqli_num_rows($query);
				$result = $conn->query($query);
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$e_id = $row['E_ID'];
					$etitle = $row['E_TITLE'];
					$edate = $row['E_DATE'];
					$edesc = $row['SUBSTRING(E_DESC, 1, 100)'];

					echo '<a href="event_edit.php?EID='.$e_id.'" class="list-group-item" role="button">';
					echo <<< HTML
					<table style="width:100%">
						<tr>
							<td style="width:90%">
HTML;
								echo '<b>'.$etitle.'</b><br>';
								echo '<i>'.$edate.'</i><br>';
								echo '<p>'.$edesc.'</p>';

							echo <<< HTML
							</td>
							<td style="width:10%">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</td>
						</tr>
					</table>
					</a>
HTML;
				}
				}
				$query = mysqli_query($conn, "select E_ID, E_TITLE, E_DATE, E_DESC from EVENT, INVITE, USER where U_USERNAME = '$login' and E_ID = IN_EVENT and INVITE.USER_U_ID = U_ID and IN_GOING = 'Y'");
				$rows = mysqli_num_rows($query);
				$result= mysqli_fetch_assoc($query);
				for ($x = 1; $x <= $rows; $x++) {
					$e_id = $result['E_ID'];
					$etitle = $result['E_TITLE'];
					$edate = $result['E_DATE'];
					$edesc = $result['E_DESC'];
					echo '<a href="event.php?EID='.$e_id.'" class="list-group-item" role="button">
						<b>'.$etitle.'</b><br>
						<i>'.$edate.'</i><br>
						<p>'.$edesc.'</p>
					</a>';
				}
			?>
          </ul>
        </div>
		<!---------------------------------------------------------------------------- MY EVENTS END ---------------------------------------------------->

		<br>

		<!---------------------------------------------------------------------------- MY GROUPS DROPDOWN ---------------------------------------------------->
          <a class="btn btn-primary btn-block" href="#" class="btn btn-info data-toggle collapsed"
          data-toggle="collapse" data-target="#groups">My Groups</a>

        <div id="groups" class="panel-collapse collapse">
          <ul class="list-group">
			<a href="#" class="list-group-item" role="button">Create New Group</a>
			<?php
				$query = mysqli_query($conn, "select GR_NAME from `GROUP`, USER where U_USERNAME = '$login' and GR_MEMBER =  U_ID order by GR_NAME");
				$rows = array();
				$result= mysqli_fetch_assoc($query);
				/*while () {
				$group = $result['GR_NAME'];
					echo '<a href="#" class="list-group-item" role="button">
						<center><h4>'.$group.'</h4></center>
					</a>';
				}*/
			?>
          </ul>
        </div>
		<!---------------------------------------------------------------------------- MY GROUPS END ---------------------------------------------------->

		<br>

		<!---------------------------------------------------------------------------- PROFILE EDIT AND LOGOUT BUTTONS ---------------------------------------------------->
		<a class="btn btn-primary btn-block" href="profile_edit.php">Edit Profile</a>
		<br>

		<?php
			if ($acct == 'A')
			{
				echo '<a class="btn btn-primary btn-block" href="admin.php">Admin</a>';
				echo '<br>';
			}
		?>

		<a class="btn btn-primary btn-block" href="logout.php">Logout</a>
		<!---------------------------------------------------------------------------- BUTTONS END ---------------------------------------------------->

	</div>

    <?php include("nav.php"); ?>

    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">

    </script>
        <script>window.jQuery || document.write
        ('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/collapse.js"></script>
    <!-- End JS -->
  </body>
</html>

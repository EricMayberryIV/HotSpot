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
			$query = mysqli_query($conn, "select U_IMAGE, U_SCHOOL, U_DOB, U_F_NAME,
      U_L_NAME from USER where U_USERNAME = '$login'");
			$result= mysqli_fetch_assoc($query);
			$fname = $result['U_F_NAME'];
			$lname = $result['U_L_NAME'];
			$birthdate = $result['U_DOB'];
			$user = $login;
			$image = $result['U_IMAGE'];
			// Gives user a blank profile picture if they do not already have one set
			if ($image == NULL)
			$image = "img/profile/blank_profile.jpg";
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
    		echo $login."'s Profile";
    	?>
  	</title>
  </head>
  <body>
    <div class="container">
  		<?php include("header.php"); ?>
  		<br style="line-height:50px;" />
  		<center>
    		<h4>Welcome
      		<?php
      			echo " ".$login;
      		?>
    		</h4>
    		<?php
    			echo '<img src="'.$image.'" class="img-circle" alt="Cinque Terre"
          width="200" height="200">';
    		?>
    		<p>
    		<?php
    			// Outputs Name
    			echo "<br/><strong>".$fname." ".$lname."</strong>";
    			echo '<br>';
    			// Outputs Age
    			echo "<strong>You're ".date_diff(date_create($birthdate),
          date_create('today'))->y." years old!</strong>";
    		?>
        </p>
        <br/>
        <!-- Trigger the modal with a button -->
        <?php include("dm.html"); ?>
		  </center>
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

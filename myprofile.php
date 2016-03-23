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
			$query = mysqli_query($conn, "select U_F_NAME, U_L_NAME from USER where U_USERNAME = '$login'");
			$result= mysqli_fetch_assoc($query);
			$fname = ucfirst($result['U_F_NAME']);
			$lname = ucfirst($result['U_L_NAME']);
			$user = ucfirst($login);
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
	  <h1>Welcome 
	  </br>
		<?php
			echo $fname." ".$lname;
		?>
	  </h1>
	  
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

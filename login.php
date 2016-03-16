
<?php
/*
//session_start(); // Starting Session
include("connection.php");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
$error=''; // Variable To Store Error Message
if (isset($_POST['login'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("SELECT U.U_USERNAME, U.U_ID, A.A_PASSWORD FROM AUTH A, USER U WHERE U.U_ID=A.USER_U_ID AND U.U_USERNAME = '$username' AND A.A_PASSWORD = '$password'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: list.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
*/

		//session_start(); // Starting Session
		include("connection.php");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];

		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query($conn, "select U_USERNAME, A_PASSWORD, U_ACCT_TYPE from USER, AUTH where U_ID = A_ID AND A_PASSWORD ='$password' AND U_USERNAME ='$username'");
		$rows = mysqli_num_rows($query);
         if ($rows == true) {
            $_SESSION['login_user']=$username; 	// Initializing Session
          //  mysqli_free_result($query);  // Free the data stored in the result set   
		
       //$sql = mysqli_query($connection, "select TYPE from USER where EMAIL ='$username' "); //Check the Type of USER		
        $result= mysqli_fetch_assoc($query); // Store query result 
		  
			 
		  //if ($result['Title'] == "director") {  
			//header("location: director_profile.php"); 			// Redirecting To Director Profile
            //} 
            
          if ($result['U_ACCT_TYPE'] == 'L') {
			header("location: list.php"); 			// Redirecting To Staff Profile
            }
            
          else if ($result['U_ACCT_TYPE'] == 'A') {
			header("location: list.php"); 			// Redirecting To Parent Profile
            } 
            
         
         }//if Login Successful
			
       else {
				$error = "Please be sure that both your username and password are valid.";
		   		echo '<div style="position: fixed; padding-top: 30px; width: 100%; border-radius: 0px;">
			<div class="alert alert-danger alert-dismissable" id="flash-msg1">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
			<strong><i class="fa fa-times"></i>&nbsp;Uh Oh! Login Failed</strong> Please check login credentials and try again.
			</div>
			</div>';
			}

			mysqli_close($conn); // Closing Connection
?>
<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="dc1"; // Database name 
$tbl_name="Login"; // Table name 

// Connect to server and select database.
mysql_connect("$host","$username","$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$uname=$_POST['username'];
$pword=$_POST['password'];
$title=$_POST['Title'];
$ssn=$_POST['SSN'];
$empid=$_POST['emp_id'];



// Insert data into mysql 
$sql="INSERT INTO $tbl_name(username, password, Title, SSN, emp_id)VALUES('$uname','$pword','$title','$ssn','$empid')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='index.php'>Back to Login home</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>
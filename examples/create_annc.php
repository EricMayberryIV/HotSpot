<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="dc1"; // Database name 
$tbl_name="Announcements"; // Table name 

// Connect to server and select database.
mysql_connect("$host","$username","$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$date=$_POST['annc_date'];
$time=$_POST['annc_time'];
$from=$_POST['sender'];
$memo=$_POST['annc_cont'];




// Insert data into mysql 
$sql="INSERT INTO $tbl_name(annc_date, annc_time, sender,annc_cont)VALUES('$date','$time','$from','$memo')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Message Sent Successfully";
echo "<BR>";
echo "<a href='profile.php'>Back to Login home</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>
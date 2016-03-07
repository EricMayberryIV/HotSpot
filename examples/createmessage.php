<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="dc1"; // Database name 
$tbl_name="Messaging"; // Table name 

// Connect to server and select database.
mysql_connect("$host","$username","$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$send=$_POST['sender'];
$rec=$_POST['receiver'];
$con=$_POST['content'];




// Insert data into mysql 
$sql="INSERT INTO $tbl_name(sender,receiver,content )VALUES('$send','$rec','$con')";
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
<?php
// Tutorial found at https://youtu.be/EwuVD3Zi-GI

// Connect to the database
$mysqli = NEW MySQLi('localhost', 'root', '', 'hotspot');
echo "<h1>About</h1>";

// Query the database
$resultSet = $mysqli->query("SELECT about_info from about");

// Count the returned rows
if($resultSet->num_rows != 0){

// Turn the results into an array
  while($rows = $resultSet->fetch_assoc() )
  {
    $about = $rows['about_info'];
    echo "<p>$about</p>";
  };

// Display the results
}else{
    echo "No results.";
};

?>

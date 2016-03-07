<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FAMU NEW BEGINNINGS HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<br><b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Home <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">About Us</a></li>
        <li><a href="#">Virtual Tour</a></li>
      </ul>   
      <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Messages <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="send_message.html">Create Message</a></li>
        <li><a href="#">View Messages</a></li>
      </ul>
       <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Announcement <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="announcement.html">Create Announcement</a></li>
        <li><a href="#">View Announcement</a></li>
      </ul>
       <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Incident Report <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Create Incident Report</a></li>
        <li><a href="#">View Incident Report</a></li>
      </ul>
      <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      View Staff<span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">View Staff</a></li>
        <li><a href="#">Add new Staff</a></li>
      </ul>
    </div>
  </div>
</div>

</body>
</html>
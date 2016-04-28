<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/template.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<title>Administrator Reports</title>
</head>
<?php
include("header.php");
?>
<br>
<br>
<br>
<h4 align="center"><b>Reports</b></h4>
<br>
<p>What would you like the report to be done on?</p>
<form action="form_action.asp">
  <input type="radio" name="choice" value="users">Users<br>
  <input type="radio" name="choice" value="events">Events<br>
  <br>
  <input type="button" class="btn btn-primary"onclick="myFunction()" value="Submit">
  <br>
</form>
<script>
function myFunction() {
    var choice = document.forms[0];
    if (choice[0].checked) {
    document.getElementById("usertopics").removeAttribute("hidden");
    }
    else if (choice[1].checked){
    document.getElementById("topics").removeAttribute("hidden");}
  }
</script>
<div class="dropdown" id="usertopics" hidden>
  <br>
  <h5>Criteria:</h5>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Topic
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="all" href="#" onclick="location.href='admin_reportsall.php'">All</a></li>
   <li><a id="username1" href="#" onclick="UserTopic1()">Username</a></li>
   <li><a id="f_name" href="#" onclick="UserTopic2()">First Name</a></li>
   <li><a id="l_name" href="#" onclick="UserTopic3()">Last Name</a></li>
   <li><a id="pnum" href="#" onclick="UserTopic5()">Phone Number</a></li>
   <li><a id="school" href="#" onclick="UserTopic6()">School</a></li>
 </ul>
</div>
<script>
function UserTopic1() {
    document.getElementById("uusername").removeAttribute("hidden");}
function UserTopic2() {
    document.getElementById("ufname").removeAttribute("hidden");}
function UserTopic3() {
    document.getElementById("ulname").removeAttribute("hidden");}
function UserTopic5() {
    document.getElementById("upnum").removeAttribute("hidden");}
function UserTopic6() {
    document.getElementById("uschool").removeAttribute("hidden");}
</script>
<div class="container" id="uusername" hidden>
<br>
<form action="admin_reportsusername.php" method="post" size="3" align="left">
 Username:<br>
 <input type="text" name="username" align="left"><br><br>
 <input type="submit" class="btn btn-primary" value="Submit" name="submitme" align="left">
</form>
</div>
<div class="container" id="ufname" hidden>
<br>
<form action="admin_reportsfname.php" method="post" size="3" align="left">
 First Name:<br>
 <input type="text" name="fname" align="left"><br><br>
 <input type="submit" class="btn btn-primary" value="Submit" align="left">
</form>
</div>
<div class="container" id="ulname" hidden>
<br>
<form action="admin_reportslname.php" method="post" size="3" align="left">
 Last Name:<br>
 <input type="text" name="lname" align="left"><br><br>
 <input type="submit" class="btn btn-primary" value="Submit" align="left">
</form>
</div>
<div class="container" id="upnum" hidden>
<br>
<form action="admin_reportspnum.php" method="post" size="3" align="left">
 Phone Number:<br>
 <input type="number" name="pnum" align="left"><br><br>
 <input type="submit" class="btn btn-primary" value="Submit" align="left">
</form>
</div>
<div class="container" id="uschool" hidden>
<br>
<form action="admin_reportsschool.php" method="post" size="3" align="left">
 School:<br>
 <input type="text" name="school" align="left"><br><br>
 <input type="submit" class="btn btn-primary" value="Submit" align="left">
</form>
</div>
<div class="dropdown" id="topics" hidden>
  <br>
  <h5>Criteria:</h5>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Topic
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="mydrop1" href="#" onclick="TopicFunction1()">Age</a></li>
   <li><a id="mydrop2" href="#" onclick="TopicFunction2()">Attire</a></li>
   <li><a id="mydrop4" href="#" onclick="TopicFunction3()">Drink</a></li>
   <li><a id="mydrop5" href="#" onclick="TopicFunction7()">Event Name</a></li>
   <li><a id="mydrop6" href="#" onclick="TopicFunction4()">Food</a></li>
   <li><a id="mydrop7" href="#" onclick="TopicFunction5()">Music</a></li>
 </ul>
</div>
<script>
function TopicFunction1() {
    document.getElementById("age").removeAttribute("hidden");}
function TopicFunction2() {
    document.getElementById("attire").removeAttribute("hidden");}
function TopicFunction3() {
    document.getElementById("drink").removeAttribute("hidden");}
function TopicFunction4() {
    document.getElementById("food").removeAttribute("hidden");}
function TopicFunction5() {
    document.getElementById("music").removeAttribute("hidden");}
</script>
<br>
<div class="dropdown" id="age" hidden>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Age Group
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="drop1" onclick="location.href='admin_reportsag.php?ag=2'">20's</a></li>
   <li><a id="drop2" onclick="location.href='admin_reportsag.php?ag=3'">30's</a></li>
   <li><a id="drop3" onclick="location.href='admin_reportsag.php?ag=4'">40's</a></li>
   <li><a id="drop4" onclick="location.href='admin_reportsag.php?ag=5'">50's</a></li>
   <li><a id="drop5" onclick="location.href='admin_reportsag.php?ag=6'">60's</a></li>
   <li><a id="drop6" onclick="location.href='admin_reportsag.php?ag=7'">70's</a></li>
   <li><a id="drop7" onclick="location.href='admin_reportsag.php?ag=8'">80's</a></li>
   <li><a id="drop8" onclick="location.href='admin_reportsag.php?ag=9'">90's</a></li>
   <li><a id="drop9" onclick="location.href='admin_reportsag.php?ag=10'">College</a></li>
   <li><a id="drop10" onclick="location.href='admin_reportsag.php?ag=11'">Parents</a></li>
   <li><a id="drop11" onclick="location.href='admin_reportsag.php?ag=12'">Teenagers(13-19)</a></li>
 </ul>
</div>
<div class="dropdown" id="attire" hidden>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Attire
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="drop1" onclick="location.href='admin_reportsat.php?at=WH'">All White</a></li>
   <li><a id="drop2" onclick="location.href='admin_reportsat.php?at=BW'">Beach Wear</a></li>
   <li><a id="drop3" onclick="location.href='admin_reportsat.php?at=BL'">Black</a></li>
   <li><a id="drop4" onclick="location.href='admin_reportsat.php?at=B'">Black Tie</a></li>
   <li><a id="drop5" onclick="location.href='admin_reportsat.php?at=C'">Casual</a></li>
   <li><a id="drop6" onclick="location.href='admin_reportsat.php?at=S'">Suit and Tie</a></li>
 </ul>
</div>
<div class="dropdown" id="music" hidden>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Type of Music
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="drop1" onclick="location.href='admin_reportsm.php?m=Classical'">Classical</a></li>
   <li><a id="drop2" onclick="location.href='admin_reportsm.php?m=Pop'">Pop</a></li>
   <li><a id="drop3" onclick="location.href='admin_reportsm.php?m=Rap'">Rap</a></li>
   <li><a id="drop4" onclick="location.href='admin_reportsm.php?m=Reggae'">Reggae</a></li>
   <li><a id="drop5" onclick="location.href='admin_reportsm.php?m=Rock'">Rock</a></li>
   <li><a id="drop6" onclick="location.href='admin_reportsm.php?m=Soul'">Soul</a></li>

 </ul>
</div>
<div class="dropdown" id="drink" hidden>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Drink
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="drop1" onclick="location.href='admin_reportsdr.php?dr=A'">Alcoholic Beverages</a></li>
   <li><a id="drop2" onclick="location.href='admin_reportsdr.php?dr=J'">Juice</a></li>
   <li><a id="drop3" onclick="location.href='admin_reportsdr.php?dr=S'">Soda</a></li>
   <li><a id="drop4" onclick="location.href='admin_reportsdr.php?dr=T'">Tea</a></li>
   <li><a id="drop5" onclick="location.href='admin_reportsdr.php?dr=W'">Water</a></li>
 </ul>
</div>
<div class="dropdown" id="food" hidden>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Type of Food
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="drop1" onclick="location.href='admin_reportsf.php?fname=ASI'">Asian</a></li>
   <li><a id="drop2" onclick="location.href='admin_reportsf.php?fname=BBQ'">Barbeque</a></li>
 </ul>
</div>
<?php
include("nav.php");
?>
</body>
</html>

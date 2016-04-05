<!DOCTYPE html>
<html>
<body>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/template.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
        //document.getElementById("").removeAttribute("hidden");
    }
    else if (choice[1].checked){
    document.getElementById("topics").removeAttribute("hidden");}
  }
</script>
<div class="dropdown" id="topics" hidden>
  <br>
  <h5><u>Criteria</u></h5>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Topic
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="mydrop1" href="#" onclick="TopicFunction1()">Age</a></li>
   <li><a id="mydrop2" href="#" onclick="TopicFunction2()">Attire</a></li>
   <li><a id="mydrop3" href="#" onclick="TopicFunction3()">Drink</a></li>
   <li><a id="mydrop4" href="#" onclick="TopicFunction4()">Food</a></li>
   <li><a id="mydrop5" href="#" onclick="TopicFunction5()">Music</a></li>
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
<div class="dropdown" id="food" hidden>
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Type
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a id="drop1" name="f_food" href="#" onclick="TypeFunction()">Asian</a></li>
   <li><a id="drop2" name="f_food" href="#" onclick="TypeFunction()">Barbeque</a></li>
 </ul>
</div>
<script>
function TypeFunction() {
    document.getElementById("filter").removeAttribute("hidden");}
</script>
<div id="filter" hidden>
 <br>
 <h5><u>Filter</u></h5>
 <div class="dropdown" id="filter1">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Filter Option
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a id="fdrop1" name="e_date" href="#" onclick="FilterFunction()">Date</a></li>
    <li><a id="fdrop2" name="e_title" href="#" onclick="FilterFunction()">Event Name</a></li>
    <li><a id="fdrop3" name="e_type" href="#" onclick="FilterFunction()">Type</a></li>
  </ul>
  </div>
  <h6>Input Filter</h6>
  <input type="text" name="filterinput"></br>
</div>
<script>
function FilterFunction() {
    document.getElementById("sorting").removeAttribute("hidden");}
</script>
<div id="sorting" hidden>
 <br>
 <h5><u>Sorting</u></h5>
 <div class="dropdown" id="sorting1">
  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Sorting Option
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a id="sdrop1" name="e_date" href="#" onclick="SortingFunction()">Date</a></li>
    <li><a id="sdrop2" name="e_title" href="#" onclick="SortingFunction()">Event Name</a></li>
    <li><a id="sdrop3" name="e_type" href="#" onclick="SortingFunction()">Type</a></li>
  </ul>
  </div>
  <div class="dropdown" id="sorting2">
   <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Choose Sorting Type
   <span class="caret"></span></button>
   <ul class="dropdown-menu">
     <li><a id="stdrop1" name="as" href="#" onclick="SortingFunction()">Ascending</a></li>
     <li><a id="stdrop2" name="e_title" href="#" onclick="SortingFunction()">Descending</a></li>
   </ul>
   </div>
</div>
<?php
include("nav.php");
?>
</body>
</html>
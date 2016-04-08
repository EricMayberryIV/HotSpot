<?php
  session_start(); // required for all php files within the application
  if (!isset($_SESSION["login_user"]))
  {
  header("Location: index.php");
  die();
  }
  $queryPart = NULL;
  if (isset($_POST['event'])){
    $type = $_POST['event'];
    $queryPart .= "AND e_type LIKE '%$type%' ";
  }
  if (isset($_POST['age'])){
    $ageGr = $_POST['age'];
    $queryPart .= "AND e_age_group LIKE '%$ageGr%' ";
  }
  if (isset($_POST['food'])){
    $food = $_POST['food'];
    $queryPart .= "AND e_food_type LIKE '%$food%' ";
  }
  if (isset($_POST['drink'])){
    $drink = $_POST['drink'];
    $queryPart .= "AND e_drink_type LIKE '%$drink%' ";
  }
  if (isset($_POST['attire'])){
    $attire = $_POST['attire'];
    $queryPart .= "AND e_attire_type LIKE '%$attire%' ";
  }
  echo "$queryPart";
  $_SESSION['queryPart'] = $queryPart;
  header("Location: searchChoice.php");
?>

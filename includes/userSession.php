<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  //check if the session is not set and if not, this will redirect to login page (index)
  if(!isset($_SESSION['user'])) {
   header("Location: index.php");
   exit;
  }

  //select logged-in users details
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);

  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
  
<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  //checks if the session is already set and if it is, this will redirect to home.php
  if (isset($_SESSION['user'])!="") {
   header("Location: home.php");
   exit;
  }

  $error = false;

  if( isset($_POST['btn-login']) ) {

  //prevent sql injections/ clear user invalid inputs
   $email = trim($_POST['email']);
   $email = strip_tags($email);
   $email = htmlspecialchars($email);

   $pass = trim($_POST[ 'pass']);
   $pass = strip_tags($pass);
   $pass = htmlspecialchars($pass);


   if(empty($email)){
    $error = true;
    $emailError = "Please enter your email address.";
   } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "Please enter valid email address.";
   }

   if (empty($pass)){
    $error = true;
    $passError = "Please enter your password." ;
   }

   // if there's no error, continue to login
   if (!$error) {
    // password hashing
    $password = hash('sha256', $pass); 

    $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'");
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);
    
    if( $count == 1 && $row['userPass']==$password ) {
      // Set session variables
     $_SESSION['user'] = $row['userId'];
     header( "Location: home.php");
    } else {
     $errMSG = "Incorrect Credentials, Try again..." ;
    }
   }
  }
?>
<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  //checks if the session is already set and if it is, this will redirect to home.php
  if (isset($_SESSION['user'])!="") {
   header("Location: home.php");
   exit;
  }

  if (isset($_POST['btn-signup']) ) {
   
    // sanitize user input to prevent sql injection
    //trim - strips whitespace (or other characters) from the beginning and end of a string
    // strip_tags — strips HTML and PHP tags from a string
    // htmlspecialchars converts special characters to HTML entities

    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST[ 'email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // basic name validation
     $error = false;

     if (empty($name)) {
      $error = true ;
      $nameError = "Please enter your full name.";
     } else if  (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have at least 3 characters.";
     } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true ;
      $nameError = "Name must contain alphabets and space.";
     }

     //basic email validation
      if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address." ;
     } 
     else {
      // checks whether the email exists or not
      $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
      $result = mysqli_query($conn, $query);
      $count = mysqli_num_rows($result);
      if($count!=0){
       $error = true;
       $emailError = "Provided Email is already in use.";
      }
     }

     // password validation
      if (empty($pass)){
      $error = true;
      $passError = "Please enter password.";
     } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have atleast 6 characters." ;
     }

     // password hashing for security
      $password = hash('sha256' , $pass);

     // if there's no error, continue to signup
     if( !$error ) {
     
      $query = "INSERT INTO users(userName,userEmail,userPass,userImg) VALUES('$name','$email','$password','')";

      $res = mysqli_query($conn, $query);
     
      if ($res) {
       $errTyp = "success";
       $errMSG = "Successfully registered, you may login now";
       unset($name);
       unset($email);
       unset($pass);
      } else  {
       $errTyp = "danger";
       $errMSG = "Please use another E-mail" ;
      }
      
     }

    }
?>

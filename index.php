  <!-- include login validation -->
  <?php include 'includes/loginValidation.php';?>

  <!-- include head -->
  <?php include 'includes/head.php'; ?>

  <!-- include style -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
  <title>Login</title>

  </head>

  <body class="text-center">
    <form class="form-signin mx-auto " method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
  
      <h2 class="text-info mb-3 font-weight-bold">Log In</h2>
     
      <?php
        if (isset($errMSG)) {
          echo  $errMSG;
        }
      ?>
     
      <input class="form-control my-1" type="email" name="email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" />

      <span  class="text-danger"><?php echo $emailError; ?></span >

      <input class="form-control my-1" type="password" name="pass"  class="form-control" placeholder ="Your Password" maxlength="15"  />

      <span  class="text-danger"><?php echo $passError; ?></span>
      
      <button class="btn btn-lg btn-secondary btn-block mt-3 mb-3" type="submit" name= "btn-login">Login</button>

      <a class="text-muted" href="register.php">Register Here</a>
            
    </form>
  </body>
</html>
<?php ob_end_flush(); ?>
  <!-- include register validation -->
  <?php include 'includes/registerValidation.php'; ?>

  <!-- include head -->
  <?php include 'includes/head.php'; ?>

  <!-- include style -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
    
  <title>Registration</title>
  
  </head>

  <body class="text-center">

    <form method="post" class="form-signin mx-auto " action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
   
      <h2 class="text-info mb-3 font-weight-bold">Register</h2>
   
      <?php
        if (isset($errMSG)) {
      ?>
        <div class="alert alert-<?php echo $errTyp ?>">
          <?php echo $errMSG; ?>
        </div>
      <?php
        }
      ?>

      <input type ="text" name="name" class = "username form-control" placeholder ="Enter Name" maxlength ="50" value = "<?php echo $name ?>"/>

      <span class = "display-username-taken text-danger"><?php echo $nameError;?></span>
   
      <input type = "email" name = "email" class = "email form-control my-1" placeholder = "Enter Your Email" maxlength = "40" value = "<?php echo $email ?>"/>

      <span class = "display-email-taken text-danger"><?php echo $emailError;?> </span>

      <input type = "password" name = "pass" class = "form-control my-1"   placeholder = "Enter Password" maxlength = "15"/>
     
      <span class = "text-danger"><?php echo $passError;?></span>

      <button class="btn btn-lg btn-secondary btn-block mt-3 mb-3" type = "submit" name = "btn-signup" >Register</button >
      
      <a class="text-muted" href = "index.php">Login Here</a>
    </form>

</body>
</html>
<?php  ob_end_flush(); ?>
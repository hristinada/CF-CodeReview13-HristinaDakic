<!-- include user session -->
  <?php include 'includes/userSession.php'; ?>

<!-- include head -->
  <?php include 'includes/head.php'; ?>

<!-- include style -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
      <title>Home</title>
  
  </head>
  
  <body>
<!-- nav bar -->
    <nav class="navbar navbar-dark bg-dark"> 
      <div class="navbar-brand m-0">Welcome to <span class="text-info font-weight-bold">People</span>
      </div>
      <a class="btn btn-outline-light mr-2" href="logout.php?logout">Sign Out</a>
    </nav>

<!-- user info -->
    <section class="jumbotron container">
      
      <div class="row">
        
        <div class="col-3">
          <img class="img thumbnail shadow" style="width:100%; border-radius: 50%;" alt="..." src="<?php echo $userRow['userImg'];?>">
        </div>

        <h1 class="col-3 jumbotron-heading text-info font-weight-bold" style="font-size: 2em;"><?php echo $userRow['userName'];?></h1>

        <div class="col-3">
<!--           <p class="lead text-muted">This is some text about me</p>
          <a class="btn btn-secondary" href="edit.php" class="card-link">Edit</a>   -->     
        </div>
        
      </div>

    </section>

<!-- other users -->
  <div class="users m-5">
    <table class="table">
      <tbody>
          <?php 
           include 'includes/allUsers.php';
          ?>
      </tbody>
    </table>
  </div>  
  </body>
</html>
<?php ob_end_flush(); ?>
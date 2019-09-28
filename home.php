<!-- include user session -->
  <?php include 'includes/userSession.php'; ?>

<!-- include head -->
  <?php include 'includes/head.php'; ?>

<!-- include style -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
      <title>Home</title>
  
  </head>
  
  <body class="bg-secondary">
<!-- nav bar -->
    <nav class="navbar navbar-dark sticky-top bg-dark"> 
      <div class="navbar-brand m-0"><span class="text-light">Welcome to </span><span class="text-info font-weight-bold">People</span>
      </div>
      <a class="btn btn-outline-light mr-2" href="logout.php?logout">Sign Out</a>
    </nav>

<!-- user info -->
    <section class="pt-5 pl-5 pr-5 bg-secondary">
      
      <div class="row">
        
        <div class="col-3">
          <img class="bigImg img thumbnail shadow" alt="..." src="<?php echo $userRow['userImg'];?>">
        </div>
        
        <div class="col-3">
          <h1 class="text-info font-weight-bold" style="font-size: 2em;"><?php echo $userRow['userName'];?></h1>
          <a class="btn btn-info mr-2" href="friendships.php">See Friends</a>
        </div>

<!--         <div class="col-3">
          <p class="lead text-muted">This is some text about me</p>
          <a class="btn btn-secondary" href="edit.php" class="card-link">Edit</a>       
        </div> -->
        
      </div>

    </section>

<!-- other users -->
  <div class="users m-5">
    <table class="table table-dark">
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
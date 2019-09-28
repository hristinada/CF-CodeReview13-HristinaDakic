<!-- include user session -->
  <?php include 'includes/userSession.php'; ?>

<!-- include head -->
  <?php include 'includes/head.php'; ?>

<!-- include style -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
    <title>Friends</title>
  
  </head>
  
  <body class="bg-secondary">
<!-- nav bar -->
    <nav class="navbar navbar-dark sticky-top bg-dark"> 
      <div class="navbar-brand m-0"><span class="text-light">Welcome to </span><span class="text-info font-weight-bold">People</span>
      </div>
      <a class="btn btn-outline-light mr-2" href="logout.php?logout">Sign Out</a>
    </nav>

  <!-- list of friends -->
    <section class="m-5">
    <h1 class="text-info mb-3">My friends list</h1>
      <table class="table table-dark">
        <tbody>
<?php

//********************************************************
//function, that returns true if two users are freinds
//********************************************************

    function areFriends($user1, $user2) {
      define ('DBHOST', 'localhost');
      define('DBUSER' , 'root');
      define('DBPASS', '');
      define ('DBNAME', 'cr13_hristina_dakic_people');
      $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

      $query = "SELECT * FROM friendships WHERE fk_user_1 = '$user1' AND fk_user_2 = '$user2' OR fk_user_1 = '$user2' AND fk_user_2 = '$user1'";
      
      $result = mysqli_query($conn, $query);
      $count = mysqli_num_rows($result);
        if($count!=0){
          //echo $friendMessage = "Friends";
          return true;
      } else {
          //echo $friendMessage = "Add Friend";
          return false;
      }
    }
//********************************************************
//display list of all users, with an option to add friend
//********************************************************

    $sql1 = "SELECT * FROM users WHERE userId != " . $_SESSION['user'];
    $users = $conn->query($sql1);

    if($users->num_rows > 0) {
      while($row = $users->fetch_assoc()) {
        if (areFriends($_SESSION['user'], $row['userId']) == true) {  
        echo 
        '
            <tr>
              <td>
                <img src="'.$row['userImg'].'" class="smallImg thumbnail" alt="...">
              </td>

              <td>
                <p>'.$row['userName'].'</p>
              </td>
            </tr>';
        }
      }
    } else {
      echo "<h1>No friends</h1>";
  }
 ?>

        </tbody>
      </table>
    </section>
  </body>
</html>
<?php ob_end_flush(); ?>
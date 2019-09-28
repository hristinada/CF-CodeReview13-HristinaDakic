<?php

//********************************************************
//testing - query to get all friendships of the user
//********************************************************
    // $sql2 = "SELECT * FROM friendships WHERE fk_user_1 = " . $_SESSION['user'] . " OR fk_user_2 = " . $_SESSION['user'];

    // $friendships = $conn->query($sql2);
    // $row=mysqli_fetch_array($friendships, MYSQLI_ASSOC);
    // echo $row['fk_user_1'];
    // echo $row['fk_user_2'];

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

      echo 
      '<tr>

      	<td>
  		    <img src="'.$row['userImg'].'" class="smallImg thumbnail" alt="...">
      	</td>

      	<td>
      		<p>'.$row['userName'].'</p>
      	</td>

      	<td>';
        if (areFriends($_SESSION['user'], $row['userId']) == true) {
    		  echo '<button class="btn btn-outline-info btn-block" disabled>Friends</button>';
      	} else {
      		echo '<form action="actions/addFriend.php" method="post">
                <input type="hidden" name="userId" value="'.$row['userId'].'" />
                <input type="hidden" name="userName" value="'.$row['userName'].'" />
                <button type="submit" class="btn btn-info btn-block">Add friend</button>
                </form>';
      		}
      echo	
        '</td>

      </tr>';
      }
    } else {
      echo "<h1>No users avaliable</h1>";
  }
 ?>
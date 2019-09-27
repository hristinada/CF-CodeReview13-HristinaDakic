<?php
	$sql1 = "SELECT * FROM users WHERE userId != " . $_SESSION['user'];
    $users = $conn->query($sql1);

    // $sql2 = "SELECT * FROM friendships WHERE fk_user_1 = " . $_SESSION['user'] . " OR fk_user_2 = " . $_SESSION['user'];

    // $friendships = $conn->query($sql2);
    // $row=mysqli_fetch_array($friendships, MYSQLI_ASSOC);
    // echo $row['fk_user_1'];
    // echo $row['fk_user_2'];

    function areFriends($sessionUserId, $userId) {
    	define ('DBHOST', 'localhost');
		define('DBUSER' , 'root');
		define('DBPASS', '');
		define ('DBNAME', 'cr13_hristina_dakic_people');
		$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

    	$query = "SELECT * FROM friendships WHERE fk_user_1 = '$sessionUserId' AND fk_user_2 = '$userId' OR fk_user_1 = '$userId' AND fk_user_2 = '$sessionUserId'";
	    
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

//display all users
   if($users->num_rows > 0) {
    while($row = $users->fetch_assoc()) {

      echo 
      '<tr>
      	<td>
			<img src="'.$row['userImg'].'" style="height: 70px; width: 70px; object-fit: cover; border-radius: 50%;" class=" thumbnail" alt="...">
      	</td>
      	<td>
      		<p>'.$row['userName'].'</p>
      	</td>
      	<td>';
	    if (areFriends($_SESSION['user'], $row['userId']) == true) {
			echo '<p class="font-weight-bold text-info">Friends</p>';
		} else {
			echo '<button class="btn btn-info">Add friend</button>';
		}
    echo	
      	'</td>
      </tr>';
    }
  } else {
    echo "<h1>No users avaliable</h1>";
  }
 ?>
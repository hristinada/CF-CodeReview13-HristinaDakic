<!-- include head -->
  	<?php include '../includes/head.php'; ?>

	   <title>Add friend</title>

	</head>
	
	<body>
		<?php 

		require_once '../includes/dbconnect.php';

		include '../includes/userSession.php';
		$sessionUserId = $_SESSION['user'];
		$sessionUserName = $userRow['userName'];

		if ($_POST) {
		   $userId = $_POST['userId'];
		   $friendName = $_POST['userName'];

		   $sql = "INSERT INTO `friendships`(`friendshipId`, `fk_user_1`, `fk_user_2`) VALUES (NULL,'$sessionUserId','$userId')";
		   
		    if($conn->query($sql) === TRUE) {
		       echo "<h2 class='m-2 bg-info'>" . $sessionUserName . " is now friends with " . $friendName . "</h2>";
		       echo "<a href='../home.php'><button type='button' class='btn btn-info m-2'>Back</button></a>";
		   } else {
		       echo "Error: " . $conn->error;
		   }
		   $conn->close();
		}

		?>
	</body>
</html>

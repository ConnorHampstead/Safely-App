<?php 
 session_start();
 error_reporting(0);
	$dbServerName = "localhost";
	$dbUserName = "App";
	$dbPassword = "orange";
	$dbName = "new_schema";
	$userID = $_SESSION['userID'];
	
	$conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);



// check connection
	if (mysqli_connect_error()){
		die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
	}else{
		echo "Connected"."<br>";
	}


	$contactID = $_POST['delete'];

	$sql = "DELETE FROM usercontacts WHERE contactID = $contactID;";
			
		

	if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
	} else {
      echo "Error updating record: " . $conn->error;
	}

	$conn->close();
	header('Location: deleteDB.php');
	?>


	
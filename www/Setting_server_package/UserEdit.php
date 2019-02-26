<?php
 
  	$dbServerName = "localhost";
	$dbUserName = "App";
	$dbPassword = "orange";
	$dbName = "new_schema";
	// create connection
	$conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);
	if (mysqli_connect_error()){
		die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
	}else{
		echo "Connected"."<br>";
	}

	$FName = $_POST['Fname'];
	$LName = $_POST['Lname'];
	$number = $_POST['phoneNumber'];

    $sql = "UPDATE user Set firstName = '$FName', lastName = '$LName', phoneNumber = '$number' Where userID = 1 ;"; //You don't need a ; like you do in SQL
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	} else {
    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
	header('Location: settings.php');

	

	$conn->close(); 
     
  	//header('Location: settings.html');
 	
?>



	

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



    $sql = "SELECT * FROM user WHERE userID = 1;"; //You don't need a ; like you do in SQL
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
        $userID = $row['userID'];
        $firstName = $row['firstName']  ;
        $lastName=  $row['lastName'] ;
        $PHnumber = $row['phoneNumber'] ;
    }
	

	
	 // document.getElementById('LName').value ==  'Orr' ;


    //session_start();
	$_SESSION['userID'] = $userID;
	$_SESSION['firstName'] = $firstName;
	$_SESSION['lastName'] = $lastName;
	$_SESSION['PHnumber'] = $PHnumber;
    //echo $_SESSION['PHnumber'];


    

	$conn->close(); 
     
  	//header('Location: settings.html');
 	
?>



	

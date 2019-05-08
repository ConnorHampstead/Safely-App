<?php
//session_start();
 	 session_start();
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

	$userID = $_SESSION['userID'];

    $sql = "SELECT * FROM user WHERE userID = $userID;"; //You don't need a ; like you do in SQL
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
        
        $firstName = $row['firstName']  ;
        $lastName=  $row['lastName'] ;
        $PHnumber = $row['phoneNumber'] ;
    }
	

	
	 // document.getElementById('LName').value ==  'Orr' ;


    //session_start();
	
	$_SESSION['firstName'] = $firstName;
	$_SESSION['lastName'] = $lastName;
	$_SESSION['PHnumber'] = $PHnumber;
    //echo $_SESSION['PHnumber'];


    

	$conn->close(); 
     
  	//header('Location: settings.html');
 	
?>



	

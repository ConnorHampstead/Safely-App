 <!--method = "POST" action = "<?php $_PHP_SELF ?>"-->

 <?php
 	session_start();
  	$userID = $_SESSION['userID'];
    $dbServerName = "localhost";
	$dbUserName = "App";
	$dbPassword = "orange";
	$dbName = "new_schema";
	
	$number = $_POST['phoneNumber'];
	$contactname = $_POST['name'];
// create connection
	$conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);



// check connection
	if (mysqli_connect_error()){
		die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
	}else{
		echo "Connected"."<br>";
	}
//`contactName`

	// need to find way to auto increment the contact id as couldnt do it in database as userid already AI
	 	$sql = "SELECT count(*)  FROM usercontacts WHERE userID = $userID";
        $result=$conn->query($sql);
        
        $row_cnt = $result->num_rows;
        echo $row_cnt;
        if($row_cnt>=1){
        	$sql = "INSERT INTO usercontacts(userID,contactID,contactNumber,contactName) VALUES  ($userID,$row_cnt + 1,'$number', '$contactname');";
        }else{
        	$sql = "INSERT INTO usercontacts(userID,contactID,contactNumber,contactName) VALUES  ($userID,1,'$number', '$contactname');";
        }
	
			
		

	if ($conn->query($sql) === TRUE) {
   	 echo "Record updated successfully";
	}else {
    	echo "Error updating record: " . $conn->error;
	}

	$conn->close(); 
      
  
?>
<script>
	window.location = 'settings.php';
</script>

   
    

<?php
 session_start();
$setting = $_POST['Safety'];
//$setting = 2;
$userID = $_SESSION['userID'];

$dbServerName = "localhost";
$dbUserName = "App";
$dbPassword = "orange";
$dbName = "new_schema";

// create connection
$conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);



// check connection
if (mysqli_connect_error()){
	die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
}else{
	echo "Connected";
}



	$sql = "UPDATE usersettings set safetyLevel= $setting where userID = $userID;";
			
		

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<script>
	window.location = 'settings.php';
</script>

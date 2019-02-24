
<?php
$dbServerName = "localhost";
$dbUserName = "App";
$dbPassword = "orange";
$dbName = "new_schema";

// create connection
$conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);
$setting = filter_input(INPUT_POST, 'Safety');

// check connection
if (mysqli_connect_error()){
	die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
}else{
	echo "Connected";
}

/*
else{
	$sql = "UPDATE usersettings set walkingSpeed = 1 where userId = 1;";
			
			
}
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
*/
$conn->close();
?>

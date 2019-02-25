<?php 
	$dbServerName = "localhost";
	$dbUserName = "App";
	$dbPassword = "orange";
	$dbName = "new_schema";
	$userID = 1;
	
	$conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);



// check connection
	if (mysqli_connect_error()){
		die('Connect Error ('.mysql_connect_errno().')'.mysqli_connect_error());
	}else{
		echo "Connected"."<br>";
	}
	$sql = "SELECT * FROM usercontacts "; //You don't need a ; like you do in SQL
	$result = $conn->query($sql);
	/*while($row = $result->fetch_assoc()) {
		echo $row['contactID'];
		echo $row['contactName'];
	}*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Contact to Delete</title>
</head>
<body>
	<form class = "WalkingSpeed" method = "post" action = "delete.php"  >
	  <select id = "delete" name = "delete">
		
        
		<?php 

        
		while($row = $result->fetch_assoc()) {
		  echo '<option  value='. $row['contactID'].'>'.  $row['contactName'] .'</option> ';
		}
		?>


	  </select>
	  <button type= "submit" value="Open Script"" >Delete</button><br>
    </form>

</body>
</html>
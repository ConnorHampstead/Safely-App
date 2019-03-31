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
	}//else{
		//echo "Connected"."<br>";
	//}
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
	<meta charset="utf-8" />

    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    
    <link rel="stylesheet" type="text/css" href="css/index.css" />

</head>
<body>
	<div class="logo">
        <img id="largeSafelyLogo" src="img/Safely Title.png" alt="Safely Logo">
    </div>
    <br>
	<div class = "Settings">
	<p style="font-size:1em; background-color: #ff6600; margin-top: 0; margin-bottom: 0;">Choose a contact to delete</p>
	<form class = "Emergencycontact" method = "post" action = "delete.php"  >
	<select id = "delete" name = "delete">

        
		<?php 

        
		while($row = $result->fetch_assoc()) {
		  echo '<option  value='. $row['contactID'].'>'.  $row['contactName'] .'</option> ';
		}
		?>


	  </select>
	  <button type= "submit" value="Open Script" style="background-color:#ff3300;" >Delete</button><br>
    </form>
	</div>
</body>
</html>
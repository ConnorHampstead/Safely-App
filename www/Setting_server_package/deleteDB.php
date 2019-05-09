<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width, height=device-height">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <title>Login - Safely</title>

    <style>

    .logo {
        text-align:center;
        margin-top:20%;
    }
    
    .loginForm {
        border-radius: 10px;
        margin-top: 5%;
        margin-right: 7.5%;
        float: right;
        text-align: center;
        width: 85%;
        background-color: white;
        padding-top: 1.4%;
        padding-bottom: 1.25%;
    }
    #safelyTitle {
        width:47%;
        margin-top:10px;
        float: left;
        margin-left: 26.5%;
    }
    input[type=text], input[type=password] {
        width: 92%;
        margin-top: 1.25%;
        margin-bottom: 1.25%;
        font-size: 115%;
    }

</style>
</head>
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
	$sql = "SELECT * FROM usercontacts WHERE userID = $userID; "; //You don't need a ; like you do in SQL
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
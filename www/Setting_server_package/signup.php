<?php
session_start();
$_SESSION['message'] = '';
 $dbServerName = "localhost";
    $dbUserName = "App";
    $dbPassword = "orange";
    $dbName = "new_schema";
    // create connection
    $conn = new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName);
if (!$conn) {
    die('Connection Error: ' . $mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$temp1 = $_POST['Password'];
	$temp2 = $_POST['password'];

	if ($temp1 == $temp2){
		
		/*$email = $mysqli->real_escape_string($_POST['Email']);
		$first_name = $mysqli->real_escape_string($_POST['firstName']);
		$last_name = $mysqli->real_escape_string($_POST['lastName']);
		$phone_num = $mysqli->real_escape_string($_POST['Phone']);
		$password = $mysqli->real_escape_string($_POST['Password']);*/

		$email = ($_POST['Email']);
		$first_name = ($_POST['FirstName']);
		$last_name = ($_POST['LastName']);
		$phone_num = ($_POST['Phone']);
		$password =($_POST['Password']);

		$sql = "SELECT * FROM user WHERE email='$email'";

		$emailCheck = mysqli_fetch_array(mysqli_query($conn, $sql));
		if (isset($emailCheck)){
			$_SESSION['message'] = "An account with that email already exists";
		} else{
			$_SESSION['email'] = $email;
			$sql = "INSERT INTO user(email, firstName, lastName, phoneNumber, password) VALUES('$email', '$first_name', '$last_name', '$phone_num', '$password')";
			if (mysqli_query($conn, $sql)){
				$_SESSION['message'] = "Registration successful";
				$sql = "SELECT userID FROM user WHERE Email = '$email' and password =  $password";
       			 $result=$conn->query($sql);
        
        		$row_cnt = $result->num_rows;
        	if($row_cnt==1){
            	while($row = $result->fetch_assoc()) {
                	$_SESSION['userID'] = $row['userID'];
                
            	}
       		}
				header("location: index.html");
				$to = "$email";
				$subject = "Welcome to Safely";
				$message = "You have registered successfully.";
				$from = "safe@safely.com";
				$headers = "From:" . $from;

				mail($to,$subject,$message,$headers);

			} else{
				$_SESSION['message'] = "Please try again";
			}
		}
	} else{
		$_SESSION['message'] = "The passwords you have entered do not match";
	}

	
}


/*
if ($email =='' || $first_name =='' || $last_name=='' || $phone_num==''|| $password==''){
	echo 'Please fill in all the missing fields.';
} else{
	//require_once()
	$sql = "SELECT * FROM user WHERE email='$email'";

	$emailCheck = mysqli_fetch_array(mysqli_query($con, $sql));

	if(isset($emailCheck)){
		echo ' Email already exist';
	} else{
		$sql = "INSERT INTO user(email, firstName, lastName, phoneNumber, password) VALUES('$email', '$first_name', '$last_name', '$phone_num', '$password')";
		if (mysqli_query($con, $sql)){
			echo 'Registration successful';
		} else{
			echo 'Please try again!';
		}
	}
} */
?>

<?php
session_start();
$_SESSION['message'] = '';
$conn = new mysqli('localhost','root','pass123','safelydb');
if (!$conn) {
    die('Connection Error: ' . $mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if ($_POST['Password'] == $_POST['Confirm Password']){
		
		$email = $mysqli->real_escape_string($_POST['Email']);
		$first_name = $mysqli->real_escape_string($_POST['firstName']);
		$last_name = $mysqli->real_escape_string($_POST['lastName']);
		$phone_num = $mysqli->real_escape_string($_POST['Phone']);
		$password = $mysqli->real_escape_string($_POST['Password']);

		$sql = "SELECT * FROM user WHERE email='$email'";

		$emailCheck = mysqli_fetch_array(mysqli_query($conn, $sql));
		if (isset($emailCheck)){
			$_SESSION['message'] = "Email already exist";
		} else{
			$_SESSION['email'] = $email;
			$sql = "INSERT INTO user(email, firstName, lastName, phoneNumber, password) VALUES('$email', '$first_name', '$last_name', '$phone_num', '$password')";
			if (mysqli_query($con, $sql)){
				$_SESSION['message'] = "Registration successful";
				header("location: index.html")
			} else{
				$_SESSION['message'] = "Please try again";
			}
		}
	} else{
		$_SESSION['message'] = "The password and confirm password do not match";
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
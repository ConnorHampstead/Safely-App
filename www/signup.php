<?php
session_start();
$_SESSION['message'] = '';
$conn = new mysqli('localhost','root','pass123','safelydb');
if (!$conn) {
    die('Connection Error: ' . $mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if ($_POST['Password'] == $_POST['Confirm_Password']){
		
		$email = $conn->real_escape_string($_POST['Email']);
		$first_name = isset($_POST['firstName']) ? $conn->real_escape_string($_POST['firstName']) : '';
		$last_name = isset($_POST['lastName']) ? $conn->real_escape_string($_POST['lastName']): '';
		$phone_num = $conn->real_escape_string($_POST['Phone']);
		$password = $conn->real_escape_string($_POST['Password']);

		$sql = "SELECT * FROM user WHERE email='$email'";

		$emailCheck = mysqli_fetch_array(mysqli_query($conn, $sql));
		if (isset($emailCheck)){
			$_SESSION['message'] = "An account with that email already exists";
		} else{
			$_SESSION['email'] = $email;
			$sql = "INSERT INTO user(email, firstname, lastname, phonenum, password) VALUES('$email', '$first_name', '$last_name', '$phone_num', '$password')";
			if (mysqli_query($conn, $sql)){
				$_SESSION['message'] = "Registration successful";
				header("location: index.html");
				$to = "$email";
				$subject = "Welcome to Safely";
				$message = "You have registered successfully.";
				$from = "safe@safely.com";
				$headers = "From:" . $from;

				mail($to,$subject,$message,$headers);
			}
			 else{
				$_SESSION['message'] = "Please try again";
			}
		}
	} else{
		$_SESSION['message'] = "The passwords you have entered do not match";
	}


	
}


?>

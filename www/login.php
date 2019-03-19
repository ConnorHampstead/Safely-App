<?php

if (isset($_POST['login'])){
	$DB_host = 'localhost';
	$DB_user = 'root';
	$DB_password = 'pass123';
	$DB_name = 'safelydb';

	$conn = mysqli_connect('localhost','root','pass123','safelydb');
	if (!$conn) {
		die('Connection Error: ' . $mysqli_connect_error());
	}

	$email = $_POST["email"];
	$password = $_POST["email"];

	if (empty($email) || empty($password)){
		header("Location: ../login.html?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE emailUsers=? ;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql){
			header("Location: ../login.html?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$passwordCheck = password_verify($password, $row["password"]);
				if ($passwordCheck == false){
					header("Location: ../login.html?error=wrongpwd");
					exit();
				}
				else if(){
					session_start();
					$_SESSION["userId"] = $row["userID"];
					$_SESSION["userName"] = $row["firstname"];
					
					header("Location: ../index.html?login=success");
					exit();
				}
				else{
					header("Location: ../login.html?error=wrongpwd");
					exit();
				}
			}
		}	else{
			header("Location: ../login.html?error=nouser");
			exit();
			}
	}

}
else{
	header("Location: ../login.html");
	exit();
}
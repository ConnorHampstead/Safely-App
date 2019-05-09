<?php
session_start();
$conn = new mysqli('localhost','root','pass123','safelydb');
if (!$conn) {
    die('Connection Error: ' . $mysqli_connect_error());
}


$sql = "SELECT contactNumber FROM userContacts WHERE useriD = '".$_SESSION['userId']."'";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(isset($row)){

	while ($row = mysqli_fetch_assoc($results)){
		$message = new \Esendex\Model\DispatchMessage(
    		"Safely App", /* Send from */
   			$row["contactNumber"], /* Send to any valid number */
    		"Your friend is in danger!",
   			\Esendex\Model\Message::SmsType
		);
		$authentication = new \Esendex\Authentication\LoginAuthentication(
    		"EX0284274", /* Your Esendex Account Reference */
    		"leelam.hale@gmail.com", /* Your login email address */
    		"Team15SMS" /* Your password */
		);
	$service = new \Esendex\DispatchService($authentication);
	$result = $service->send($message);
	print $result->id();
	print $result->uri();
}
	header("Location: index.html");
	die();
}
	else{
		echo 'There are no emergency contact on your account';
		header("Location: index.html");
		die();
}

?>
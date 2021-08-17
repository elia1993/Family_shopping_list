<?php
include 'config.php';
session_start();
$email = $_SESSION['Email'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$product = mysqli_real_escape_string($conn,$_POST['product']);
	$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
	$sql = "DELETE FROM `user_list` WHERE `email` = '$email' AND `quantity`='$quantity'";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
}

?>

<?php
  session_start();
include 'config.php';
$email = $_SESSION['Email'];
$sql = "DELETE FROM `user_list` WHERE `email`='$email'";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
    mysqli_close($conn);
?>


<?php
include "config.php";
session_start();
$email = $_SESSION['Email'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $family = $_POST['family'];
    $sql = "SELECT `family` From `users` WHERE `email` = '$email'" ;
    $result = mysqli_query($conn,$sql );
    $row = mysqli_fetch_array($result);
    $familynum = (int)$row['family'];
	$sql = "SELECT `family` From `users` WHERE `email` = '$family'" ;

	$result = mysqli_query($conn,$sql );
    $row = mysqli_fetch_array($result);
	$familynum2 = (int)$row['family'];
	if($familynum2 ===$familynum){
		echo json_encode(array("statusCode"=>203));

	}
	else{
	$sql1 = "UPDATE `users` SET `family` = $familynum , `admin` = 0   WHERE `email`='$family' " ;
    if (mysqli_query($conn, $sql1)) {
		$update = "UPDATE `users` SET  `admin` = 1   WHERE `email`='$email' " ;
		mysqli_query($conn, $update);

		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
	}
}
?>

<?php
include "config.php";
session_start();
$email = $_SESSION['Email'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
		$sql = "INSERT INTO `user_list`(`email`, `product`, `quantity`) VALUES ('$email','$product','$quantity')";
		$sql2 = "INSERT INTO `user_products`(`ID`, `product`, `email`) VALUES ('','$product','$email')"; 
    if (mysqli_query($conn, $sql)&& mysqli_query($conn, $sql2)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
}
?>

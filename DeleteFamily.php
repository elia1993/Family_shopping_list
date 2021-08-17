
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
    $ctr = "SELECT max(family) as ctr FROM users";
    $result = mysqli_query($conn,$ctr);
    $row = mysqli_fetch_array($result);
    $count = $row['ctr'];
    $count = $count + 1 ;
		$sql1 = "UPDATE `users` SET `family` =$count WHERE `email`='$family'" ;

            if (mysqli_query($conn, $sql1)) {
                echo json_encode(array("statusCode"=>200));
            } 
            else {
                echo json_encode(array("statusCode"=>201));
	}
}

?>
<?php
session_start();
include 'config.php';
$email = $_SESSION['Email'];
$date =  date("Y/m/d");
$insert="INSERT INTO `history`(`email`, `listnum`, `productName`,`quantity`,`date`) SELECT `email`, `listID`, `product`,`quantity`,null FROM `user_list` WHERE `email`='$email'";
$insertdate = "UPDATE `history` SET `date` = '$date' WHERE `email` = '$email' ";
     if (mysqli_query($conn, $insert) && mysqli_query($conn, $insertdate )) {
     } else {
        echo "Error: " . $insert . "
" . mysqli_error($conn);
     }

?>
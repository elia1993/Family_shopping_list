<?php
session_start();
include 'config.php';
$email = $_SESSION['Email'];
$update = "UPDATE `history` SET `listnum` = CASE
WHEN `listnum` = 0 THEN 1
WHEN `listnum`!=0 THEN `listnum` + 1
END
WHERE `email` = '$email'";
  if (mysqli_query($conn, $update)) {
    echo "<script>alert('New record created successfully')</script>";
    header("Location: shoppinglist.php");
 } else {
    echo "Error: " . $insert . "
" . mysqli_error($conn);
 }
 mysqli_close($conn);

?>
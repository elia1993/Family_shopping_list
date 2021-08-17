<?php
include "config.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password ="";
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);
    $email = $_SESSION['Email'];
    if ($username != "" && $password != ""){
        $sql_query1 = "SELECT `password`  FROM users where email='".$email."' ";
        $result = mysqli_query($conn,$sql_query1);
        $row = mysqli_fetch_array($result);
        if($row[0] === $password ){
            echo "<script>alert('Old Password and New Password cannot be same!!')</script>";
            header( "refresh:1;url= changepass.php" );
        }
        else{
        $sql_query = "UPDATE `users` SET `password`='$password' WHERE `email`='$email'";
        if (mysqli_query($conn, $sql_query)) {
            echo "<script>alert('password changed successfully')</script>";
            header( "refresh:2;url= login.php" );
         } else {
            echo "Error: ";
         }
         mysqli_close($conn);
    }
}

}
?>
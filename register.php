<?php

include "config.php";
session_start();
$Exists = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $password = $email = $phonenumber="";
    $username = mysqli_real_escape_string($conn,$_POST['nickname']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $phonenumber = mysqli_real_escape_string($conn,$_POST['PhoneNumber']);
    $true = FALSE;
    if ($username != "" && $password != "" && $email!="" && $phonenumber!=""){
        $sql_query1 = "SELECT count(*) email_ctr FROM users where email='".$email."' ";
        $result = mysqli_query($conn,$sql_query1);
        $row = mysqli_fetch_array($result);
    
        $count = $row['email_ctr'];
    
        if($count > 0){
            $Exists = "The Email Is Exists";
        }
        else{
            $true = TRUE;
            $_SESSION['Email'] = $email;
            header( "refresh:2;url= LogIn.php" );
        }
        if( $true===TRUE){
            $ctr = "SELECT max(family) as ctr FROM users";
            $result = mysqli_query($conn,$ctr);
            $row = mysqli_fetch_array($result);
            $count = $row['ctr'];
            $count = $count + 1 ;
        $sql_query = "INSERT INTO users (name,password,email,phone_number,family,admin)
	 VALUES ('$username','$password','$email',$phonenumber,$count,0)";
        if (mysqli_query($conn, $sql_query)) {
            echo "<script>alert('New record created successfully')</script>";

         } else {
            echo "Error: " . $sql_query . "
    " . mysqli_error($conn);
         }
         mysqli_close($conn);
    }

}
}

?>
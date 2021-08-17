<?php
include "config.php";
session_start();
$Email_err = $password_err=$login_err="";
$Email = $password = "";
//checks to see if when the form was submitted the parameter submit was passed.  
//if(isset($_POST['but_submit'])){

      // username and password sent from form 
      if($_SERVER["REQUEST_METHOD"] == "POST"){

      $email = mysqli_real_escape_string($conn,$_POST['Email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      // Check if username is empty
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter Email.";
    } else{
        $Email = trim($_POST["Email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if ($Email != "" && $password != ""){
        $sql_query = "SELECT count(*) as cntUser from users where email='".$Email."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        if($count > 0){
            $_SESSION['Email'] = $Email;
           
            header('Location: shoppinglist.php');
        }else{
            echo "<script>alert('Invalid Email and password')</script>";
        }
        if (!empty($_POST['remeberme'])) {
            setcookie("email",$email, time() + (10*365*24*60*60));
            setcookie("password",$password, time() + (10*365*24*60*60));
        }else{
          if (isset($_COOKIE["email"])) {
              setcookie("email","");
          }
          if (isset($_COOKIE["password"])) {
              setcookie("password","");
          }
        }

    }
 else {
    $login_err = "Invalid Email or password.";
}
      }
?>

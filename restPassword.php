<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="user.css" />
    
    <title>LogIn</title>

</head>
<body>
  <div style="margin-top:5%;" class="login-wrap">
	<div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><a href="LogIn.php">Sign In</a></label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
				<form   method="post"  >
				
				</div>
				<div class="group">				
		</div>
		
				<div class="hr"></div>
			</div>
			<div class="for-pwd-htm">
				<div  style="display:block;" class="group">
					<label for="user" class="label"> Email</label>
					<input  name="Email" id="user" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Reset Password"  name='Send'  id="Send">
				</div>
</form>
			</div>
		</div>
	</div>
</div>
<footer>
	<div class="hr"></div>   
             <h2>&#169 Elia Majdalany </h2>
  </footer>
</body>
</html>
<?php
include "config.php";
 $Find = 0;
if(isset($_POST['Send'])){
    $email = $_POST['Email'];
    $query = "SELECT * FROM `users` WHERE email = '$email'";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
        $Find = 1;
        $row = mysqli_fetch_array($run);
        $db_email = $row['email'];
        $token = rand(100000,900000); //random token
        $query = "UPDATE `users` set `password` = '$token ' WHERE email ='$email' ";
        if(mysqli_query($conn,$query)){
            echo "<Script>alert('We Sent You An Email To Rest Your Password')</script> ";
            $to = $db_email;
            $subject = "password reset link";
            $message = "Click http://localhost/workplace/web_app/forgotpassword.php AND your Code Is $token";
            mail($to,$subject,$message);
        }
       
    }
    if($Find==0){
        echo  "<h2 style='margin-top:-10%; '>You Don't Have  Account!!</h2>";
        echo  "<h2  >To Sign Up<a href='SignUp.php' style='text-decoration: none; font-size:20px;'>  Click </a></h2>";


    }
    }




?>
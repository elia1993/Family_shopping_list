<!DOCTYPE html>

<?php
require 'validation.php';
?>
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
<style>
	.glyphicon:active{
    color: green;
    font-size: 120%;
  }

</style>
</head>
<body>
  <div style="margin-top:5%;" class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">LogIn In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"><a href="restPassword.php">Forgot Password</a></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
				<form   method="post"  >
					<label for="user" class="label"> Email</label>
					<p><input id="user" class="input" type="text" name="Email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" placeholder=" Email" ></p>
          <?php echo $Email_err ; ?>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<p><input id="pass" class="input" type="password"  name="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><div style='top:-30px; left:90%;' class="glyphicon glyphicon-eye-open"></div></p>
          <?php  echo  $password_err ; ?>
		  <p id='mypass'><input type="checkbox" id="remember" name="remeberme" value="remeberme" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>>Remember Password</p>
		</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
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
<script>
      $('#pass').on('mousover', function() {
    if($(this).val())
        $(".glyphicon-eye-open").show();
    else
        $(".glyphicon-eye-open").hide();
    });
$(".glyphicon-eye-open").mousedown(function(){
                $("#pass").attr('type','text');
            }).mouseup(function(){
            	$("#pass").attr('type','password');
            }).mouseout(function(){
            	$("#pass").attr('type','password');
            });
  </script>
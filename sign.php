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
    <link rel="stylesheet" type="text/css" href="button.css" />
    
    <title>LogIn</title>
<style>
    #message {
        display:none;
}
#message p {
  padding: 10px 55px;
  font-size: 15px;
}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
a {
      text-decoration: none;
      color: black;
    }
</style>
</head>
<body>
    <header>
    <span style='margin-top:8px;'   class="btn btn-info" id="home" class="addBtn"><a href="homePage.html">Home Page</a></span>
        <div style="height:100%; margin-top:-3%; " class="login">
    </header>
  <div style="margin-top:5%;" class="login-wrap">
	<div class="login-html">
		 <input    id="tab-1" type="radio" name="tab" class="sign-in" checked><label  for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
				<form   method="post"  >
					<p><input id="user" class="input" type="text" name="Email" placeholder="Email - sophie@example.com" title="sophie@example.com"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></p>
                    <?php include 'register.php'; echo $Exists; ?>
                    <p><input class="input"  type="text" name="nickname"  placeholder="nickname" title="Just letters" required pattern="[a-z]{1,20}"/></p>
                    <p><input class="input"    name="PhoneNumber" type="tel" title="PhoneNumber xxx-xxxxxxx"   placeholder="PhoneNumber xxx-xxxxxxx"  pattern="[0-9]{3}-[0-9]{7}" required /></p>
                </div>
				<div class="group">
					<p><input  oninput= "checkPasswords()" id="pwd1"  class="input" type="password"  name="password" placeholder="Password" ></p>
                    <div id="message">
                         <h3 style="font-size:15px;"><strong>Password must contain the following:</strong></h3>
                         <p id="length"  class="invalid">Minimum <b>5 characters</b></p>
                    </div>
                    <input style='margin-left:12%;margin-bottom:8px;' type="checkbox" onclick="myFunction()">Show Password
                    <p><input class="input" oninput= "checkPasswords()" type="password" id="pwd2" name="pwd1"  pattern=".{5,}" placeholder="Confirm Password" title="  at least 5 or more characters" required></p>
		</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
			
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

var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
document.getElementById("pwd1").onfocus = function() {
  document.getElementById("message").style.display = "block";
}

document.getElementById("pwd1").onblur = function() {
  document.getElementById("message").style.display = "none";
}
// When the user starts to type something inside the password field
document.getElementById("pwd1").onkeyup = function() {
  if(document.getElementById("pwd1").value.length >= 5) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<script>
    function checkPasswords(){
        var password1 = document.getElementById('pwd1');
        var password2 = document.getElementById('pwd2');
        if(password1.value != password2.value){
            password2.setCustomValidity('Password Do Not Match!');
        }
        else{
            password2.setCustomValidity('');
        }
    }
    function myFunction() {
  var x = document.getElementById("pwd1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
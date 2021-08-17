
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script>
        var length=document.getElementById("length")
        var myInput = document.getElementById("pwd");
       if(myInput.value.length >= 5) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    
    
       function Validate() {
            var password = document.getElementById("pwd").value;
            var confirmPassword = document.getElementById("pwd1").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            } 
            else
            return true;

        }</script>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Welcome To Web Application</h1>
     </header>
     <hr>
     <content>
    <div class="login">
        <h1>Set A New Password</h1>
        <form method="POST" action="ChangeIt.php">
        <p><input type="password"  id="pw3" name="pwd3" pattern=".{5,}" placeholder="Write The Code" title="  at least 5 or more characters" required> </p>
            <p><input type="password"  id="pwd" name="pwd" pattern=".{5,}" placeholder="New Password" title="  at least 5 or more characters" required> </p>
            <p><input type="password" id="pwd1" name="pwd1"  pattern=".{5,}" placeholder="Confirm Password" title="  at least 5 or more characters" required></p>
           <div>
            <p>Password must be at least <strong>5 characters</strong></p>
        </div>
            <br>
      <div style="text-align: center;" class="registration">
     <input type="submit" value="Save" onclick="return Validate()">
    </form>
</div>
</content>

    <footer>
        <hr>
        <h2>&#169 CopyRights</h2>
    </footer>

</body>
</html>
<?php
include "config.php";
session_start();
if(isset($_POST['save'])){
    $email = $_POST['Email'];
    $code = $_POST['pwd3'];
    $password = $_POST['pwd'];
    $query = "SELECT `password` FROM `users` WHERE email = '$email' AND `password` = $code ";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
        $query = "UPDATE `users` set `password` = '$password ' WHERE email ='$email' ";
        echo " Your Password Updated Successfully!";
        header( "refresh:2;url= login.php" );
    
    }else {
        echo "Error: ";
     }
     mysqli_close($conn);
}

?>
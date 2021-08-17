<?php //show user-details
session_start();
include "config.php";
$email = $_SESSION['Email'];

$sql_query1 = "SELECT `name` , `phone_number` FROM `users` where `email` = '".$email."' ";
$result = mysqli_query($conn,$sql_query1);
while ($row3 = mysqli_fetch_array($result)) {
   $name = $row3['name'];
  $phone = $row3['phone_number'];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name= $_POST['name'];
if(isset($_POST['name'])){
    $update = "UPDATE `users` SET  `name`='$name' WHERE  `email` = '$email'";
    if (mysqli_query($conn, $update)) {
    }
    else{
        echo "error";
    }
}
	mysqli_close($conn);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="button.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <style>
      .login{
          height: 500px;
          position: static;
      }
      .addBtn {
      padding-left: 40px;
      width: 25%;
      background:  #1161ee;
      color: #555;
      float: left;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
      border-radius: 0;
      
    }

    a {
      text-decoration: none;
      color: black;
    }
    #home{
      max-width: 10%;
      margin-left: 0%;
      margin-top: -3%;
      

    }

    #home:active {
      background-color: greenyellow;
      
    }

    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 8px solid white;
  padding: 8px;
}


#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  #1161ee;
  color: white;
  text-align: center;
}
a {
      text-decoration: none;
      color: black;
      margin-left:28%;

    }
    #Change:hover  {
      color: #1161ee;

    }
    #ChangeName{
        width:80%;
        background-color:#1161ee;
        color:whitesmoke;
    }

</style>
 </style>
</head>
<body>
        <span style='padding-right:3%; background:#1161ee; '   class="btn btn" id="home" class="addBtn"><a href="shoppinglist.php">Back</a></span>
     <content>
     <div  class="login" id="success">
          <h1 style='background-color:#1161ee;color: white;font-size: 25px;'>profile Details</h1>
          <table id="customers">
          <tr>
    <th>Name </th>
    <th>Phone</th>
  </tr>
  <tr>
<form method="POST">

  <th style='display:none;'  id="myInput"><input id='ChangeName'  type="text"  name="name" placeholder="ChangeName"></th>
 <th id='th1' onclick='show()' ><?php echo $name ?></th>
          <th ><?php echo $phone ?></th>

</tr>

</table>
<br>
<br>
        <a style='margin-left:20%;' class="btn btn-dark" id="Change" href="changepass.php" target="_blank"><strong>ChangePassword</a></strong>
        </form>
     </content>
    
     <footer>
        <hr>
        <h2>&#169 CopyRights</h2>
    </footer>
</body>
<script>
    function show(){
        document.getElementById('myInput').style.display = 'block';
        document.getElementById('th1').style.display = 'none';
    }

</script>
</html>
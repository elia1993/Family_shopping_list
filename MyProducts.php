<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="button.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <style>
    
#name,th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: darkslategray;
  color: white;
  text-align: center;
}
      .login{
          height: 500px;
          position: static;
      }
      .addBtn {
      padding: 10px;
      width: 25%;
      background: #d9d9d9;
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

    #home:hover {
      background-color: green;
    }
 </style>
</head>
<body>
    <header >
        <h1 style="text-align: center;">Welcome To Web Application</h1>
        <span style='width:25%; text-align:center;'  class="btn btn-dark" id="home" class="addBtn"><a href="ShoppingCart.php">Home</a></span>

     </header>
     <hr>
     <content>
     <div class="login" id="success">
        <div id="myDIV" class="header">
          <h1>Products List</h1>

          <form  id="myform" method="POST">
            <input type="text"  name="Product" id="myInput" placeholder="productToChange/Product..">
            <input type="text"  name="update" id="update" placeholder="UpdateProductName..">
            <input style='margin:5%;' type="submit" value="Delete" name='Delete'  id="Delete">
            <input style='margin:5%;' type="submit" value="Update" name='Update'  id="Update">

            <script>
              
  $(function() {
     $( "#myInput").autocomplete({

       source: 'gethintFromProducts.php',
     });
  });
</script>

                </div>
        </form>
        <h1 style='text-align:center;margin:1%;margin-left:-5%; width:45%;'>Product Name</h1>
        <?php //show user_list
session_start();
include "config.php";
$email = $_SESSION['Email'];
$sql_query1 = "SELECT `product` FROM `user_products` where `email` = '".$email."' ";
$result = mysqli_query($conn,$sql_query1);
echo " <table style='position:fixed; '>";
while ($row3 = mysqli_fetch_array($result)) {
  echo "<tr  class='mylist'  value='". $row3['product']."' >"  . "<th style='padding-top: 12px;padding-bottom: 12px;padding: 8px; '>".$row3['product']."</th>"."" . "</tr>";
}
echo "</table>";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Delete'])){
        $product = $_POST['Product'];
        $delete = "DELETE FROM `user_products` WHERE `email` = '$email' AND `product` = '$product'";
        if (mysqli_query($conn, $delete)) {
            echo "<script>alert('Product Deleted successfully')</script>";
        }
		else{
            echo "error";
        }
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Update'])){
        $product = $_POST['Product'];
        $new = $_POST['update'];
        if($product!="" && $new!=""){
        $update = "UPDATE `user_products` SET `product`='$new' WHERE  `email` = '$email' AND `product` = '$product'";
        if (mysqli_query($conn, $update)) {
            echo "<script>alert('Product Updated successfully')</script>";
        }
        else{
            echo "error";
        }
      }
      else{
        echo "<script>alert('please Fill The Two Fields!!')</script>";
      }

}
	mysqli_close($conn);

}
?>
     </content>
     
     <footer>
        <hr>
        <h2>&#169 CopyRights</h2>
    </footer>
</body>
</html>
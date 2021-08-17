<?php
include "config.php";
session_start();
function get_product($conn , $term){ 
  $email = $_SESSION['Email'];
 $query = "SELECT  DISTINCT `productName` FROM `history` WHERE email='$email' AND `productName` LIKE '".$term."%'  ORDER BY `productName` ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getproduct = get_product($conn, $_GET['term']);
 $productlist = array();
 foreach($getproduct as $product){
 $productlist[] = $product['productName'];
 }
 echo json_encode($productlist);
}
?>

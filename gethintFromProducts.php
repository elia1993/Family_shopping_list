<?php
include "config.php";
session_start();
function get_product($conn , $term){ 
  $email = $_SESSION['Email'];
  $query = "SELECT  DISTINCT `product` FROM `user_products` WHERE email='$email' AND `product` LIKE '".$term."%'  ORDER BY `product` ASC";
  $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getproduct = get_product($conn, $_GET['term']);
 $productlist = array();
 foreach($getproduct as $product){
 $productlist[] = $product['product'];
 }
 echo json_encode($productlist);
}
?>

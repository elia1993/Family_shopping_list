<?php
  session_start();
  session_destroy();
  echo "<script>alert('you succesfully logout')</script>";
  header( "refresh:2;url= login.php" );
?>
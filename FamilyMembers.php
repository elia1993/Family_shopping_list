<?php
include 'config.php';
  $email = $_SESSION['Email'];
  $sql = "SELECT `family` From `users` WHERE `email` = '$email'" ;
  $result = mysqli_query($conn,$sql );
  $row = mysqli_fetch_array($result); 
  $familynum = (int)$row['family'];
  $family = "SELECT `name` FROM `users` WHERE `family` = '$familynum' AND  NOT `email` = '$email'";
  $result = mysqli_query($conn,$family);
echo " <table    id='FamilyMembers'>";
while ($row3 = mysqli_fetch_array($result)) {
  echo "<tr  class='mylist'  value='". $row3['name']."' >"  . $row3['name']."<br><br>" . "</tr>";
}
echo"</table>";
mysqli_close($conn);

?>
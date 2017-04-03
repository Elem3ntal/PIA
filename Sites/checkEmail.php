<?php
include("config.php");
$q=$_GET["q"];
try{
   if($q!=""){
      $email=mysqli_real_escape_string($db,$q);
      $sql="CALL checkEmail('".$email."');";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      echo $row[0];
   }
}
catch (Throwable $t) {
   echo $t->getMessage();
}
?>

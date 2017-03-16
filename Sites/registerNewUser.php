<?php
// registerNewUser.php
include("config.php");
$variable = explode(",", $_GET["q"]);
if($variable[0]!=""){
   $user = mysqli_real_escape_string($db,$variable[0]);
   $pass = mysqli_real_escape_string($db,utf8_decode(md5(($variable[1]))));
   $sql = "SELECT CrearUsuario('".$user."','".$pass."');";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result);
   echo $row[0];
}
?>

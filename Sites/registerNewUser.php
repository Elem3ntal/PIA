<?php
// registerNewUser.php
include("config.php");
$variable = explode(",", $_GET["q"]);
if($variable[0]!=""){
    $user = mysqli_real_escape_string($db,$variable[0]);
    $pass = mysqli_real_escape_string($db,utf8_decode(md5(($variable[1]))));
    $sql = "SELECT CrearUsuario('".$user."','".$pass."','".$variable[2]."');";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $createMail = sendMail($user,$variable[2],0);
    if($createMail!=1){
        echo 2;
    }
    echo $row[0];
}
?>

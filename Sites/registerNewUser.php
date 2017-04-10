<?php
// registerNewUser.php
include("config.php");
session_start();
$variable = explode(",", $_GET["q"]);
if($variable[0]!=""){
    if($variable[0]=="1"){
        $user = mysqli_real_escape_string($db,$_SESSION['loginID']);
        $name = mysqli_real_escape_string($db,$variable[1]);
        $email = mysqli_real_escape_string($db,$variable[2]);
        $estimated = mysqli_real_escape_string($db,$variable[3]);
        $sql = "SELECT ExtraDataSet(".$user.",'".$name."','".$email."',".$estimated.");";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        echo $row[0];
    }
    else{
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
}
?>

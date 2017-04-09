<?php
// registerNewbuy.php
include("config.php");
session_start();
$variable = explode(",", $_GET["q"]);
if($variable[0]!=""){
    $descript = mysqli_real_escape_string($db,$variable[0]);
    $price = mysqli_real_escape_string($db,$variable[1]);
    $cant = mysqli_real_escape_string($db,$variable[2]);
    $sold = mysqli_real_escape_string($db,$variable[3]);
    $user = $_SESSION['loginID'];
    $sql = "SELECT ingresarCompra('".$variable[0]."',".$price.",".$cant.",".$sold.",".$user.");";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    echo $row[0];
}
else{
}
?>

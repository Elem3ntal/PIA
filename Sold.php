<?php
include('session.php');
$con = mysqli_connect('localhost','root','qwerasd123');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"PIA");
$userID=$_SESSION['loginID'];
$sql="CALL GetInventario($userID)";
$result = mysqli_query($con,$sql);
echo "Sold View" . "<br>";;
echo "user check: ".$user_check . "<br>";
echo "user check: ".$_SESSION['loginID'] . "<br>";
mysqli_close($con);
?>

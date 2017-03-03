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
echo "user check: ".$user_check . "<br>";
echo "user check: ".$_SESSION['loginID'] . "<br>";
echo "<h1>Inventary</h1>
<table>
<tr>
<th>#</th>
<th>descrip</th>
<th>cant</th>
<th>Price</th>
<th>Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Bought_id'] . "</td>";
    echo "<td>" . $row['Bought_descrip'] . "</td>";
    echo "<td>" . $row['Inventory_Cant'] . "</td>";
    echo "<td>" . $row['Bought_Sold'] . "</td>";
    echo "<td>" . $row['Bought_date'] . "</td>";
    echo "</tr>";
}
echo "</table>";


mysqli_close($con);
?>

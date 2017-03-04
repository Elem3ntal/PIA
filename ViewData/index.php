<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php
header("Content-Type: text/html;charset=utf-8");
$con = mysqli_connect('localhost','root','qwerasd123');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"PIA");
$sql="SELECT * FROM PIA.Users";
$result = mysqli_query($con,$sql);

echo "<h1>Table Users</h1>
<table>
<tr>
<th>Users_ID</th>
<th>Users_name</th>
<th>Users_pass</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Users_id'] . "</td>";
    echo "<td>" . $row['Users_name'] . "</td>";
    echo "<td>" . $row['Users_pass'] . "</td>";
    echo "</tr>";
}
echo "</table>";


$sql="SELECT * FROM PIA.Bought";
$result = mysqli_query($con,$sql);

echo "<h1>Table Bought</h1>
<table>
<tr>
<th>Bought_ID</th>
<th>Bought_descrip</th>
<th>Bought_cost</th>
<th>Bought_cant</th>
<th>Bought_Sold</th>
<th>Bought_date</th>
<th>User_User_id</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Bought_id'] . "</td>";
    echo "<td>" . $row['Bought_descrip'] . "</td>";
    echo "<td>" . $row['Bought_cost'] . "</td>";
    echo "<td>" . $row['Bought_Sold'] . "</td>";
    echo "<td>" . $row['Bought_cost'] . "</td>";
    echo "<td>" . $row['Bought_date'] . "</td>";
    echo "<td>" . $row['Users_Users_id'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$sql="SELECT * FROM PIA.Sold";
$result = mysqli_query($con,$sql);

echo "<h1>Table Sold</h1>
<table>
<tr>
<th>Sold_id</th>
<th>Users_Users_id</th>
<th>Clients_Clients_id</th>
<th>Sold_Price</th>
<th>Sold_Units</th>
<th>Sold_Date</th>
<th>Bought_Bought_id</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Sold_id'] . "</td>";
    echo "<td>" . $row['Users_Users_id'] . "</td>";
    echo "<td>" . $row['Clients_Clients_id'] . "</td>";
    echo "<td>" . $row['Sold_Price'] . "</td>";
    echo "<td>" . $row['Sold_Units'] . "</td>";
    echo "<td>" . $row['Sold_Date'] . "</td>";
    echo "<td>" . $row['Bought_Bought_id'] . "</td>";
    echo "</tr>";
}
echo "</table>";


mysqli_close($con);

?>
</body>
</html>

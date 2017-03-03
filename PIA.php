
<html>
   
   <head>
      <title>Welcome </title>
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
      <h1>Welcome <?php echo $login_session; ?></h1> 
<?php
   include('session.php');
   
header("Content-Type: text/html;charset=utf-8");
$con = mysqli_connect('localhost','root','qwerasd123');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"PIA");
$userID=$_SESSION['loginID'];
$sql="SELECT * FROM PIA.Bought WHERE Users_Users_id = $userID";
$result = mysqli_query($con,$sql);
echo "user check: ".$user_check . "<br>";
echo "user check: ".$_SESSION['loginID'] . "<br>";

echo "<h1>Table Products</h1>
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


mysqli_close($con);
?>
      <a href = "logout.php">Sign Out</a>
</body>
</html>

<?php
include("config.php");
session_start();
$idUser = getIdUser();
$ip = getIPuser();
$variable = explode(",", $_GET["q"]);
if($variable[0]==0){
    if($variable[1]!="" && $variable[2]!=""){
        echo "
    <tr>
<th>Id</th>
<th>Description</th>
<th>Cost</th>
<th>Price</th>
<th>Date</th>
</tr>";
        $sql = "CALL GetInventario(".$_SESSION['loginID'].");";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($result)) {
            $invProductos++;
            if(strpos($row['Inventory_id'],$variable[1])!==false && strpos($row['Bought_descrip'],$variable[2])!==false){
                echo "<tr>";
                echo "<td>" . $row['Inventory_id'] . "</td>";
                echo "<td>" . $row['Bought_descrip'] . "</td>";
                echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
                echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
                echo "<td>" . $row['Bought_date'] . "</td>";
                echo "</tr>";
            }
        }
        mysqli_close($con);
    }
    else if($variable[1]!="" && $variable[2]==""){
        echo "
    <tr>
<th>Id</th>
<th>Description</th>
<th>Cost</th>
<th>Price</th>
<th>Date</th>
</tr>";
        $sql = "CALL GetInventario(".$_SESSION['loginID'].");";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($result)) {
            $invProductos++;
            if(strpos($row['Inventory_id'],$variable[1])!==false){
                echo "<tr>";
                echo "<td>" . $row['Inventory_id'] . "</td>";
                echo "<td>" . $row['Bought_descrip'] . "</td>";
                echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
                echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
                echo "<td>" . $row['Bought_date'] . "</td>";
                echo "</tr>";
            }
        }
        mysqli_close($con);
    }
    else if($variable[1]=="" && $variable[2]!=""){
        echo "
    <tr>
<th>Id</th>
<th>Description</th>
<th>Cost</th>
<th>Price</th>
<th>Date</th>
</tr>";
        $sql = "CALL GetInventario(".$_SESSION['loginID'].");";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($result)) {
            $invProductos++;
            if(strpos($row['Bought_descrip'],$variable[2])!==false){
                echo "<tr>";
                echo "<td>" . $row['Inventory_id'] . "</td>";
                echo "<td>" . $row['Bought_descrip'] . "</td>";
                echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
                echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
                echo "<td>" . $row['Bought_date'] . "</td>";
                echo "</tr>";
            }
        }
        mysqli_close($con);
    }
}
else if($variable[0]==3){
    $sql = "select CambiarDescripcionPrecio(".$variable[1].",'".$variable[2],"',".$variable[3].");";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    echo $row[0];
}
?>

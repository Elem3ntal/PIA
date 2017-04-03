<?php
include("config.php");
session_start();
$anio = date("Y");
$mes = date("m");
try{
    $variable = explode(",", $_GET["q"]);
    if($variable[0]!=""){
        $anio = $variable[0];
        $mes = $variable[1];
    }
}
catch (Throwable $t) {
    echo $t->getMessage();
}
debug('Year: '.$anio);
debug('Month: '.$mes);
debug('Vista de Compras en PIA');
debug('Usuario ID: '.$_SESSION['loginID']);
$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
debug('Visitando: '.$URL);
try{
    $sql = "CALL GetComprasPorMes(".$_SESSION['loginID'].",".$anio.",".$mes.");";
    $result = mysqli_query($db,$sql);
    echo "
<table>
<tr>
<th>Id</th>
<th>Descripcion</th>
<th>Quantity</th>
<th>Cost</th>
<th>Price</th>
<th>Ren %</th>
<th>Date</th>
</tr>
</div>";
    //Bought_id, Bought_descrip, Inventory_Cant, Bought_cost, Bought_Sold, Bought_date
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Bought_id'] . "</td>";
        echo "<td>" . $row['Bought_descrip'] . "</td>";
        echo "<td>" . number_format($row['Bought_cant'], 0) . "</td>";
        echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
        echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
        echo "<td>" . round(((($row['Bought_Sold']-$row['Bought_cost'])*100)/$row['Bought_cost']), 2)."%" . "</td>";
        echo "<td>" . $row['Bought_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch (Throwable $t) {
    echo $t->getMessage();
}
mysqli_close($con);
?>

<script src='/PIA/JS/validator.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
<?php
include("config.php");
session_start();
debug('Vista de Inventario en PIA');
debug('Usuario ID: '.$_SESSION['loginID']);
$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
debug('Visitando: '.$URL);
try{
    $sql = "CALL GetInventario(".$_SESSION['loginID'].");";
    $result = mysqli_query($db,$sql);
    echo "<h1>Inventario</h1>
<table>
<tr>
<th>id</th>
<th>Descripcion</th>
<th>Cantidad</th>
<th>Costo</th>
<th>Venta</th>
<th>Fecha</th>
</tr>";
    //Bought_id, Bought_descrip, Inventory_Cant, Bought_cost, Bought_Sold, Bought_date
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Bought_id'] . "</td>";
        echo "<td>" . $row['Bought_descrip'] . "</td>";
        echo "<td>" . number_format($row['Inventory_Cant'], 0) . "</td>";
        echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
        echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
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


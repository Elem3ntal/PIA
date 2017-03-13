<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/comprasDinamicQuery.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
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
?>
<script>
    var anio = <?php echo $anio; ?>;
    var mes = <?php echo $mes; ?>;
</script>
<?php
debug('Year: '.$anio);
debug('Month: '.$mes);
debug('Vista de Compras en PIA');
debug('Usuario ID: '.$_SESSION['loginID']);
$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
debug('Visitando: '.$URL);
try{
    $sql = "CALL GetComprasPorMes(".$_SESSION['loginID'].",".$anio.",".$mes.");";
    $result = mysqli_query($db,$sql);
    echo "<h1>Compras</h1>
<a></a>
<a id='year' onclick='fechaAnt()'>Anterior</a>
<a id='Today' onclick='fechaToday(1)'>Hoy</a>
<a id='mes' onclick='fechaSig()'>Siguiente</a>
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

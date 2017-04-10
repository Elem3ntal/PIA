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
debug('Year: '.$anio);
debug('Month: '.$mes);
debug('Vista de Compras en PIA');
debug('Usuario ID: '.$_SESSION['loginID']);
$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
debug('Visitando: '.$URL);
try{
    $sql = "CALL GetVentasPorMes(".$_SESSION['loginID'].",".$anio.",".$mes.");";
    $result = mysqli_query($db,$sql);
    echo "
<div class=\"container-fluid\">
<table>
<tr>
<th>Descrip</th>
<th>Sold Price</th>
<th>Units</th>
<th>Total</th>
<th>Date</th>
<th>Client</th>
<th>Contact</th>
</tr>
</div>";
    //Bought_id, Bought_descrip, Inventory_Cant, Bought_cost, Bought_Sold, Bought_date
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Bought_descrip'] . "</td>";
        echo "<td>" .'$'.number_format($row['Sold_Price'], 0) . "</td>";
        echo "<td>" . number_format($row['Sold_Units'], 0) . "</td>";
        echo "<td>" . '$'.number_format(($row['Sold_Units']*$row['Sold_Price']), 0) . "</td>";
        echo "<td>" . $row['Sold_Date'] . "</td>";
        echo "<td>" . $row['Clients_F_Name'] .' '. $row['Clients_L_Name'] . "</td>";
        echo "<td>" . $row['Clients_Contact'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch (Throwable $t) {
    echo $t->getMessage();
}
mysqli_close($con);
?>

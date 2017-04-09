<?php
include("config.php");
session_start();
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "InventarySee";
$invProductos=0;
$invCantidad=0;
$invValor=0;
$invPronost=0;
try{
    $sql = "CALL GetInventario(".$_SESSION['loginID'].");";
    $result = mysqli_query($db,$sql);
    echo "
    <h3>Inventary</h3>
    <ul>
        <li id='InvProductos'></li>
        <li id='InvCant'></li>
        <li id='IntValor'></li>
        <li id='InvPronost'></li>
        <li id='InvRent'></li>
    </ul>
<table>
<tr>
<th>Id</th>
<th>Description</th>
<th>Quantity</th>
<th>Cost</th>
<th>Price</th>
<th>Profit C/u</th>
<th>Ren %</th>
<th>Date</th>
</tr>";
    //Bought_id, Bought_descrip, Inventory_Cant, Bought_cost, Bought_Sold, Bought_date
    while($row = mysqli_fetch_array($result)) {
        $invProductos++;
        echo "<tr>";
        echo "<td>" . $row['Inventory_id'] . "</td>";
        echo "<td>" . $row['Bought_descrip'] . "</td>";
        $invCantidad += $row['Inventory_Cant'];
        echo "<td>" . number_format($row['Inventory_Cant'], 0) . "</td>";
        echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
        $invValor += ($row['Bought_Sold'] * $row['Inventory_Cant']);
        echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
        $ganancia = ($row['Bought_Sold']-$row['Bought_cost']);
        echo "<td>" . "$".number_format($ganancia, 0) . "</td>";
        $invPronost += ($ganancia*$row['Inventory_Cant']);
        echo "<td>" . round(($ganancia*100/$row['Bought_cost']), 2).'%' . "</td>";
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
<script>
    var idUser = "" + <?php echo $idUser; ?>;
    var ip = " + <?php echo $ip; ?>";
    var sitio = " + <?php echo $sitio; ?>";
    registerVisit(idUser,ip,sitio);
    var invProductos = <?php echo $invProductos; ?>;
    var invCant = <?php echo $invCantidad; ?>;
    var invValor = <?php echo $invValor; ?>;
    var invPronostico = <?php echo $invPronost; ?>;
    var invRentabilidad = ((invPronostico/(invValor-invPronostico)*100)).toFixed(2)+'%';
    Number.prototype.format = function(n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };
    document.getElementById('InvProductos').innerHTML = 'Products: '+ invProductos.format(0,3,',');
    document.getElementById('InvCant').innerHTML = 'Quantity: ' + invCant.format(0,3,',');
    document.getElementById('IntValor').innerHTML = 'Value: $' + invValor.format(0,3,',');
    document.getElementById('InvPronost').innerHTML = 'profit: $'+ invPronostico.format(0,3,',');
    document.getElementById('InvRent').innerHTML = 'Rentability: ' + invRentabilidad;
</script>

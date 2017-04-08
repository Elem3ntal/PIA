<script src='/PIA/JS/validator.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">


<?php
include("config.php");
session_start();
$anio = date("Y");
$mes = date("m");
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "Resume";
function dateMonthBefore(){
    global $mes;
    global $anio;
    if($mes==1){
        $anio=$anio-1;
        $mes=12;
    }
    else{
        $mes=$mes-1;
    }
}
$usuario=[];
$inventario=[0,0,0,0,0,0]; //cantidad de productos //stock//costo inventario  //value  //utilty //rent
$resume=[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]];//[periodo][ compra venta]
$mesesParaAtras=[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]];//[meses 0-12][ compra venta]
debug('Vista de Resumen en PIA');
debug('Usuario ID: '.$_SESSION['loginID']);
$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
debug('Visitando: '.$URL);
try{
    $user = $_SESSION['loginID'];
    $user = mysqli_real_escape_string($db,$user);
    $sql = "CALL GetUserNameEmail(".$user.");"; //round 0
    $sql .= "CALL GetInventario(".$user.");";//round 1
    $sql .= "CALL GetCompras(".$user.");";
    $sql .= "CALL GetVentas(".$user.");";

    for($i=0;$i<12;$i++){
        dateMonthBefore();//n>1
        $sql .= "CALL GetVentasPorMes(".$user.",".$anio.",".$mes.");"; //round 2n
        $sql .= "CALL GetComprasPorMes(".$user.",".$anio.",".$mes.");";//round 2n+1
    }
    if (mysqli_multi_query($db, $sql)) {
        $rounds=0;
        do {
            /* store first result set */
            if ($result = mysqli_store_result($db)) {
                $innerRounds=0;
                $mesParaAtras = IntVal((($rounds)/2)-2);
                while ($row = mysqli_fetch_row($result)) {
                    $largo = count($row);
                    if($rounds==0){ //Users Data
                        for($i=0;$i<$largo;$i++){
                            $usuario[$i]=$row[$i];
                        }
                    }
                    else if($rounds==1){ //Inventario
                        $inventario[0]+=1;
                        $inventario[1]+=$row[2];
                        $inventario[2]+=($row[2]*$row[3]);
                        $inventario[3]+=($row[2]*$row[4]);
                    }
                    else if($rounds==2){
                        $resume[4][0]+=($row[4]*$row[3]);
                    }
                    else if($rounds==3){
                        $resume[4][1]+=($row[1]*$row[2]);
                    }
                    else if($rounds>3 && $rounds%2==1){ //compra
                        $mesesParaAtras[$mesParaAtras][0]+=$row[4]*$row[3];

                    }
                    else if($rounds>3 && $rounds%2==0){// venta
                        $mesesParaAtras[$mesParaAtras][1]+=$row[1]*$row[2];
                    }
                    $innerRounds+=1;
                }
                mysqli_free_result($result);
                $rounds+=1;
            }
            /* print divider */
            if (mysqli_more_results($db)) {
            }
        } while (mysqli_next_result($db));
    }
    $inventario[4] = $inventario[3] - $inventario[2];
    $inventario[5] = $inventario[4] / $inventario[2];
    $resume[0][0] = $mesesParaAtras[0][0];
    $resume[0][1] = $mesesParaAtras[0][1];
    $resume[1][0] = $mesesParaAtras[0][0] +$mesesParaAtras[1][0]+$mesesParaAtras[2][0];
    $resume[1][1] = $mesesParaAtras[0][1] +$mesesParaAtras[1][1]+$mesesParaAtras[2][1];
    $resume[2][0] = $resume[1][0] + $mesesParaAtras[3][0] +$mesesParaAtras[4][0]+$mesesParaAtras[5][0];
    $resume[2][1] =  $resume[1][1] + $mesesParaAtras[3][1] +$mesesParaAtras[4][1]+$mesesParaAtras[5][1];
    $resume[3][0] =  $resume[2][0] + $mesesParaAtras[6][0] + $mesesParaAtras[7][0] + $mesesParaAtras[8][0] + $mesesParaAtras[9][0] + $mesesParaAtras[10][0] + $mesesParaAtras[11][0];
    $resume[3][1] = $resume[2][1] + $mesesParaAtras[6][1] + $mesesParaAtras[7][1] + $mesesParaAtras[8][1] + $mesesParaAtras[9][1] + $mesesParaAtras[10][1] + $mesesParaAtras[11][1];
}
catch (Throwable $t) {
    echo $t->getMessage();
}
mysqli_close($db);
?>
<script src='/PIA/JS/UsageStatistics.js'></script>
<script>
    var idUser = "" + <?php echo $idUser; ?>;
    var ip = " + <?php echo $ip; ?>";
    var sitio = " + <?php echo $sitio; ?>";
    registerVisit(idUser,ip,sitio);
    Number.prototype.format = function(n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };
    var Alltimes0 = 0+<?php echo $resume[4][0]; ?>;
    var Alltimes1 = 0+<?php echo $resume[4][1]; ?>;
    var Alltimes2 = Alltimes1-Alltimes0;
    var Alltimes3 = Alltimes2/Alltimes0;

    var lastMonth0 = 0+<?php echo $resume[0][0]; ?>;
    var lastMonth1 = 0+<?php echo $resume[0][1]; ?>;
    var lastMonth2 = lastMonth1-lastMonth0;
    var lastMonth3 = lastMonth2/lastMonth0;

    var p3Months0 = 0+<?php echo $resume[1][0]; ?>;
    var p3Months1 = 0+<?php echo $resume[1][1]; ?>;
    var p3Months2 = p3Months1-p3Months0;
    var p3Months3 = p3Months2/p3Months0;
    var p3Months4 = p3Months2/3;

    var p6Months0 = 0+<?php echo $resume[2][0]; ?>;
    var p6Months1 = 0+<?php echo $resume[2][1]; ?>;
    var p6Months2 = p6Months1-p6Months0;
    var p6Months3 = p6Months2/p6Months0;
    var p6Months4 = p6Months2/6;

    var LastYear0 = 0+<?php echo $resume[3][0]; ?>;
    var LastYear1 = 0+<?php echo $resume[3][1]; ?>;
    var LastYear2 = LastYear1-LastYear0;
    var LastYear3 = LastYear2/LastYear0;
    var LastYear4 = LastYear2/12;

    try {
        document.getElementById("Usuario0").innerHTML = "Name: "+"<?php echo $usuario[0]; ?>";
        document.getElementById("Usuario1").innerHTML = "Email: "+"<?php echo $usuario[1]; ?>";
        document.getElementById("Usuario2").innerHTML = "Estimated Utility: "+"<?php echo $usuario[2]; ?>";

        document.getElementById("Inv0").innerHTML = "Products: "+(<?php echo $inventario[0]; ?>).format(0,3,',');
        document.getElementById("Inv1").innerHTML = "Stock: "+(<?php echo $inventario[1]; ?>).format(0,3,',');
        document.getElementById("Inv4").innerHTML = "Value: $"+(<?php echo $inventario[2]; ?>).format(0,3,',');
        document.getElementById("Inv3").innerHTML = "Cost: $"+(<?php echo $inventario[4]; ?>).format(0,3,',');
        document.getElementById("Inv2").innerHTML = "Profit: $"+(<?php echo $inventario[3]; ?>).format(0,3,',');
        document.getElementById("Inv5").innerHTML = "Rent: "+<?php echo $inventario[5]; ?>.toFixed(3)+'%';

        document.getElementById("AllTimes0").innerHTML="Purchases: $" + (Alltimes0.format(0,3,','));
        document.getElementById("AllTimes1").innerHTML="Sales: $" + Alltimes1.format(0,3,',');
        document.getElementById("AllTimes2").innerHTML="Profits: $" + Alltimes2.format(0,3,',');
        document.getElementById("AllTimes3").innerHTML="Rent: " + Alltimes3.toFixed(3)+'%';

        document.getElementById("lastMonth0").innerHTML="Purchases: $"+lastMonth0.format(0,3,',');
        document.getElementById("lastMonth1").innerHTML="Sales: $"+lastMonth1.format(0,3,',');
        document.getElementById("lastMonth2").innerHTML="Profits: $"+lastMonth2.format(0,3,',');
        document.getElementById("lastMonth3").innerHTML="Rent: "+lastMonth3.toFixed(3)+'%';

        document.getElementById("p3Months0").innerHTML="Purchases: $"+p3Months0.format(0,3,',');
        document.getElementById("p3Months1").innerHTML="Sales: $"+p3Months1.format(0,3,',');
        document.getElementById("p3Months2").innerHTML="Profits: $"+p3Months2.format(0,3,',');
        document.getElementById("p3Months3").innerHTML="Rent: "+p3Months3.toFixed(3)+'%';
        document.getElementById("p3Months4").innerHTML="Per Month: $"+p3Months4.format(0,3,',');

        document.getElementById("p6Months0").innerHTML="Purchases: $"+p6Months0.format(0,3,',');
        document.getElementById("p6Months1").innerHTML="Sales: $"+p6Months1.format(0,3,',');
        document.getElementById("p6Months2").innerHTML="Profits: $"+p6Months2.format(0,3,',');
        document.getElementById("p6Months3").innerHTML="Rent: "+p6Months3.toFixed(3)+'%';
        document.getElementById("p6Months4").innerHTML="Per Month: $" + p6Months4.format(0,3,',');

        document.getElementById("LastYear0").innerHTML="Purchases: $" + LastYear0.format(0,3,',');
        document.getElementById("LastYear1").innerHTML="Sales: $" + LastYear1.format(0,3,',');
        document.getElementById("LastYear2").innerHTML="Profits: $" + LastYear2.format(0,3,',');
        document.getElementById("LastYear3").innerHTML="Rent: " + LastYear3.toFixed(3)+'%';
        document.getElementById("LastYear4").innerHTML="Per Month: $" + LastYear4.format(0,3,',');
    }

    catch(err) {
        alert(err.message);
    }
</script>
<div class='well well-lg'>
    <h3>Resume</h3>
    <div class='well well-sm'>
        <h4>User</h4>
        <ul>
            <li id="Usuario0"></li>
            <li id="Usuario1"></li>
            <li id="Usuario2"></li>
        </ul>
    </div>
    <div class='well well-sm'>
        <h4>Inventory</h4>
        <ul>
            <li id='Inv0'></li>
            <li id='Inv1'></li>
            <li id='Inv2'></li>
            <li id='Inv3'></li>
            <li id='Inv4'></li>
            <li id='Inv5'></li>
        </ul>
    </div>
    <div id="Profits" class='well well-sm'>
        <h4>Profits and Rent</h4>
        <div id="AllTimes">
            <h5>All Times</h5>
            <ul>
                <li id="AllTimes0"></li>
                <li id='AllTimes1'></li>
                <li id='AllTimes2'></li>
                <li id='AllTimes3'></li>
            </ul>
        </div>
        <div id="lastMonth">
            <h5>Last Month</h5>
            <ul>
                <li id='lastMonth0'></li>
                <li id='lastMonth1'></li>
                <li id='lastMonth2'></li>
                <li id='lastMonth3'></li>
            </ul>
        </div>
        <div id="3Months">
            <h5>3 Months</h5>
            <ul>
                <li id='p3Months0'></li>
                <li id='p3Months1'></li>
                <li id='p3Months2'></li>
                <li id='p3Months3'></li>
                <li id='p3Months4'></li>
            </ul>
        </div>
        <div id="6Months">
            <h5>6 Months</h5>
            <ul>
                <li id='p6Months0'></li>
                <li id='p6Months1'></li>
                <li id='p6Months2'></li>
                <li id='p6Months3'></li>
                <li id='p6Months4'></li>
            </ul>
        </div>
        <div id="LastYear">
            <h5>Last Year</h5>
            <ul>
                <li id='LastYear0'></li>
                <li id='LastYear1'></li>
                <li id='LastYear2'></li>
                <li id='LastYear3'></li>
                <li id='LastYear4'></li>
            </ul>
        </div>
    </div>
</div>

<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/IngresarCompras.js'></script>
<script src='/PIA/JS/comprasDinamicQuery.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
<?php
include("config.php");
session_start();
$anio = date("Y");
$mes = date("m");
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "Purchases";
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
<script src='/PIA/JS/UsageStatistics.js'></script>
<script>
    var idUser = "" + <?php echo $idUser; ?>;
    var ip = " + <?php echo $ip; ?>";
    var sitio = " + <?php echo $sitio; ?>";
    registerVisit(idUser,ip,sitio);
    var anio = <?php echo $anio; ?>;
    var mes = <?php echo $mes; ?>;
</script>
<div class="tab-content well well-lg">
    <div id="SaleMakeASell" class="tab-pane fade in active">
        <div class="container-fluid">
            <ul class="nav nav-tabs">
                <li class=" active"><a class="btn btn-info" data-toggle="tab" href="#InsertPurchases">Insert Purchases</a></li>
                <li><a class="btn btn-info" data-toggle="tab" href="#ViewPurchases">View Purchases</a></li>
            </ul>

            <div class="tab-content well well-lg">
                <div id="InsertPurchases" class="tab-pane fade in active">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs">
                            <li class="active"><a class="btn btn-info" data-toggle="tab" href="#agregarProductos">Add</a></li>
                            <li><a class="btn btn-info" data-toggle="tab" href="#eliminarProductos">Delete</a></li>
                        </ul>

                        <div class="tab-content well well-lg">
                            <div id="agregarProductos" class="tab-pane fade in active">
                                <h3>Add</h3>
                                <input type = "text" id="IngresoDescripcion" onkeypress="hideAlerts()" class = "box" placeholder="Descript"/>
                                <input type = "text" id="IngresoCantidad" onkeypress="hideAlerts()" class = "box" placeholder="Quantity"/>
                                <input type = "text" id="IngresoPrecio" onkeypress="hideAlerts()" class = "box" placeholder="Cost"/>
                                <input type = "text" id="IngresoVenta" onkeypress="hideAlerts()" class = "box" placeholder="Price"/>
                                <a class="btn btn-info" onclick="agregarFila()">( + )</a>
                            </div>
                            <div id="eliminarProductos" class="tab-pane fade">
                                <h3>Delete</h3>
                                <input type = "text" id="EliminarID" onkeypress="hideAlerts()" class = "box" placeholder="ID to Delete"/>
                                <a class="btn btn-info" onclick="eliminarID()">( - )</a>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <section id="notificationArea">
                            <div class="alert alert-success" id="alertProductoIngresado">
                                <strong>Product has been add!</strong> The product is already in stock.
                            </div>
                            <div class="alert alert-warning" id="alertIncompleto"> <!--Producto incompleto-->
                                <strong>Product Not Added!</strong> Missing values to enter
                            </div>
                            <div class="alert alert-warning" id="alertEliminado"> <!--Producto Eliminado de la fila-->
                                <strong>Product Not Added!</strong> Removed from the queue.
                            </div>
                            <div class="alert alert-info" id="alertCompleto">
                                <strong>Product added!</strong> Has been added to the queue.
                            </div>
                        </section>
                    </div>
                    <div class="container-fluid">
                        <table id = "tablaIngresarCompras">
                            <tr>
                                <th>ID(temp)</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Profit</th>
                                <th>Date</th>
                            </tr>
                        </table>
                        <a class="btn btn-info" onclick="ingregarComprasAInventario()">Load to Inventory</a>
                    </div>
                </div>
                <div id="ViewPurchases" class="tab-pane fade">
                    <h3>Resume of the Month</h3>
                    <h4 id="ShowingDatePurchases">period</h4>
                    <a type="button" class="btn btn-primary" id='year' onclick='PurchasefechaAnt()'>Before</a>
                    <a type="button" class="btn btn-primary" id='Today' onclick='PurchasefechaToday()'>Today</a>
                    <a type="button" class="btn btn-primary" id='mes' onclick='PurchasefechaSig()'>After</a>
                    <div id="InnerBodyShowPurchases">
                    </div>
                    <script>PurchasefechaToday();</script>
                </div>
            </div>
        </div>
    </div>
</div>

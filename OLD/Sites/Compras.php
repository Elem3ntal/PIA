<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/IngresarCompras.js'></script>
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
                            <li class="active"><a class="btn btn-info" data-toggle="tab" href="#agregarProductos">Agregar</a></li>
                            <li><a class="btn btn-info" data-toggle="tab" href="#eliminarProductos">eliminar</a></li>
                        </ul>

                        <div class="tab-content well well-lg">
                            <div id="agregarProductos" class="tab-pane fade in active">
                                <h3>Agregar</h3>
                                <input type = "text" id="IngresoDescripcion" onkeypress="hideAlerts()" class = "box" placeholder="Descripcion"/>
                                <input type = "text" id="IngresoCantidad" onkeypress="hideAlerts()" class = "box" placeholder="Cant"/>
                                <input type = "text" id="IngresoPrecio" onkeypress="hideAlerts()" class = "box" placeholder="Precio"/>
                                <input type = "text" id="IngresoVenta" onkeypress="hideAlerts()" class = "box" placeholder="Venta"/>
                                <a class="btn btn-info" onclick="agregarFila()">( + )</a>
                            </div>
                            <div id="eliminarProductos" class="tab-pane fade">
                                <h3>Eliminar</h3>
                                <input type = "text" id="EliminarID" onkeypress="hideAlerts()" class = "box" placeholder="ID to Delete"/>
                                <a class="btn btn-info" onclick="eliminarID()">( - )</a>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <section id="notificationArea">
                            <div class="alert alert-success" id="alertProductoIngresado">
                                <strong>Producto Agregado!</strong> El producto ya se encuentra en inventario.
                            </div>
                            <div class="alert alert-warning" id="alertIncompleto"> <!--Producto incompleto-->
                                <strong>Producto NO agregado!</strong> faltan valores por ingresar
                            </div>
                            <div class="alert alert-warning" id="alertEliminado"> <!--Producto Eliminado de la fila-->
                                <strong>Producto No Agregado!</strong> Eliminado de la fila.
                            </div>
                            <div class="alert alert-info" id="alertCompleto">
                                <strong>Producto Agregado!</strong>ha sido añadido a la cola.
                            </div>
                        </section>
                    </div>
                    <div class="container-fluid">
                        <table id = "tablaIngresarCompras">
                            <tr>
                                <th>ID(temp)</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Venta</th>
                                <th>Ganancia</th>
                                <th>Fecha</th>
                            </tr>
                        </table>
                        <a class="btn btn-info" onclick="ingregarComprasAInventario()">Load to Inventory</a>
                    </div>
                </div>
                <div id="ViewPurchases" class="tab-pane fade">
                    <h3>Resume of the Month</h3>
                    <h4 id="ShowingDatePurchases">period</h4>
                    <a type="button" class="btn btn-primary" id='year' onclick='PurchasefechaAnt()'>Anterior</a>
                    <a type="button" class="btn btn-primary" id='Today' onclick='PurchasefechaToday()'>Hoy</a>
                    <a type="button" class="btn btn-primary" id='mes' onclick='PurchasefechaSig()'>Siguiente</a>
                    <div id="InnerBodyShowPurchases">
                    </div>
                    <script>PurchasefechaToday();</script>
                </div>
            </div>
        </div>
    </div>
</div>

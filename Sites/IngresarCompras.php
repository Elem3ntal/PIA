<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/IngresarCompras.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
<?php
include("config.php");
session_start();
debug('Vista de Ingresar Compras (Compras) en PIA');
debug('Usuario ID: '.$_SESSION['loginID']);
$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
debug('Visitando: '.$URL);
try{

}
catch (Throwable $t) {
    echo $t->getMessage();
}
mysqli_close($con);
?>

<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#agregarProductos">Agregar</a></li>
        <li><a data-toggle="tab" href="#eliminarProductos">eliminar</a></li>
    </ul>

    <div class="tab-content">
        <div id="agregarProductos" class="tab-pane fade in active">
            <h3>Agregar</h3>
            <input type = "text" id="IngresoDescripcion" onkeypress="hideAlerts()" class = "box" placeholder="Descripcion"/>
            <input type = "text" id="IngresoCantidad" onkeypress="hideAlerts()" class = "box" placeholder="Cant"/>
            <input type = "text" id="IngresoPrecio" onkeypress="hideAlerts()" class = "box" placeholder="Precio"/>
            <input type = "text" id="IngresoVenta" onkeypress="hideAlerts()" class = "box" placeholder="Venta"/>
            <a onclick="agregarFila()">( + )</a>
        </div>
        <div id="eliminarProductos" class="tab-pane fade">
            <h3>Eliminar</h3>
            <input type = "text" id="EliminarID" onkeypress="hideAlerts()" class = "box" placeholder="ID to Delete"/>
            <a onclick="eliminarID()">( - )</a>
        </div>
    </div>
</div>
<section id="notificationArea">
    <div class="alert alert-success">
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
<a onclick="ingregarComprasAInventario()">Load to Inventory</a>

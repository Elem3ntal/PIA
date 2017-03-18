<script src='/PIA/JS/validator.js'></script>
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
<script>
    function agregarFila(){
        var table = document.getElementById("tablaIngresarCompras");
        var descripcion = document.getElementById("IngresoDescripcion").value;
        var cantidad = document.getElementById("IngresoCantidad").value;
        var precio = document.getElementById("IngresoPrecio").value;
        var venta = document.getElementById("IngresoVenta").value;
        document.getElementById("IngresoDescripcion").value = "";
        document.getElementById("IngresoCantidad").value = "";
        document.getElementById("IngresoPrecio").value = "";
        document.getElementById("IngresoVenta").value = "";
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        cell1.innerHTML = descripcion;
        cell2.innerHTML = cantidad;
        cell3.innerHTML = precio;
        cell4.innerHTML = venta;
        cell5.innerHTML = ((venta-precio)/precio).toFixed(2)+'%';
        var d = new Date();
        cell6.innerHTML = d.getDate()+"-"+(d.getMonth()+1)+"-"+d.getFullYear();
    }
</script>
<p>Productos</p><a>(-)</a><a onclick="agregarFila()">(+)</a>
<input type = "text" id="IngresoDescripcion" class = "box" placeholder="Descripcion"/>
<input type = "text" id="IngresoCantidad" class = "box" placeholder="Cant"/>
<input type = "text" id="IngresoPrecio" class = "box" placeholder="Precio"/>
<input type = "text" id="IngresoVenta" class = "box" placeholder="Venta"/>
<table id = "tablaIngresarCompras">
    <tr>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Venta</th>
        <th>Ganancia</th>
        <th>Fecha</th>
    </tr>
</table>

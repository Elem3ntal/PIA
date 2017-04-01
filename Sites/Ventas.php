<script src='/PIA/JS/validator.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
<script>loadjscssfile("JS/sales.js","js");</script>
<?php
include("config.php");
session_start();
debug('Vista de Ventas en PIA');
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

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <p>Selec a Product</p>
        <li class="active"><a data-toggle="tab" href="#SaleFindID" onclick="SaleFinderIDClear();">Find ID</a></li>
        <li><a data-toggle="tab" href="#SaleExactID" onclick="SaleFinderIDClear();">Exact ID</a></li>
    </ul>

    <div class="tab-content">
        <div id="SaleFindID" class="tab-pane fade in active">
            <a>ID:</a>
            <select id="saleSelecID" onChange="selectIDProductCant();">
            </select>
            <input type = "text" id="SaleFindIDdescripcion" onkeyup="saleFindID()" class = "box" placeholder="Descript"/>
        </div>
        <div id="SaleExactID" class="tab-pane fade">
            <input type = "text" id="saleExactID" onkeyup="SaleConsultarIDdescripcion(event);" class = "box" placeholder="ID"/>
            <input type="text" id="saleExactIDdescription" value="" placeholder="Descript" readonly>
        </div>
    </div>
</div>

<div class="container-fluid">
    <input type = "text" id="EliminarID" onkeypress="" class = "box" placeholder="Cant"/> of:
    <input type="text" id="CantMaxOfSale" value="CantMax!" placeholder="Cant" readonly>
</div>

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <p>Select a Cliente</p>
        <li class="active"><a data-toggle="tab" href="#SaleClientNew">New</a></li>
        <li><a data-toggle="tab" href="#SaleClientOld">Old</a></li>
        <li><a data-toggle="tab" href="#SaleClientPS">P.S.</a></li>
    </ul>

    <div class="tab-content">
        <div id="SaleClientNew" class="tab-pane fade in active">
            <h3>New Client</h3>
            <input type = "text" id="IngresoDescripcion" onkeypress="hideAlerts()" class = "box" placeholder="Descript"/>
        </div>
        <div id="SaleClientOld" class="tab-pane fade">
            <h3>Old Client</h3>
            <input type = "text" id="EliminarID" onkeypress="hideAlerts()" class = "box" placeholder="ID"/>
        </div>
        <div id="SaleClientPS" class="tab-pane fade">
            <h3>Private Sale</h3>
            <input type = "text" id="EliminarID" onkeypress="hideAlerts()" class = "box" placeholder="ID"/>
        </div>
    </div>
</div>
<div class="container-fluid">
    <br>
    <a>sell</a>
</div>


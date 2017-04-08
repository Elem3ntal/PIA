<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/ShowSolds.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
<script>loadjscssfile("JS/sales.js","js");</script>
<?php
include("config.php");
session_start();
$anio = date("Y");
$mes = date("m");
//$URL = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "Sales";
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
<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a class="btn btn-info" data-toggle="tab" href="#SaleMakeASell" onclick="">Register a Sale</a></li>
        <li><a class="btn btn-info" data-toggle="tab" href="#SalesViewSolds" onclick="">View Solds</a></li>
    </ul>

    <div class="tab-content well well-lg">
        <div id="SaleMakeASell" class="tab-pane fade in active">
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                    <h4>Selec a Product</h4>
                    <li class=" active"><a class="btn btn-info" data-toggle="tab" href="#SaleFindID" onclick="SaleFinderIDClear();">Find ID</a></li>
                    <li><a class="btn btn-info" data-toggle="tab" href="#SaleExactID" onclick="SaleFinderIDClear();">Exact ID</a></li>
                </ul>

                <div class="tab-content well well-lg">
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

                <div class="container-fluid">
                    <input type = "text" id="CantiadEnVenta" onkeyup="createProductInSale();" class = "box" placeholder="Cant"/> of:
                    <input type="text" id="CantMaxOfSale" value="CantMax!" placeholder="Cant" readonly>
                    <p>Price: <input type="text" id="SalePrice" value="0" placeholder="Price" readonly></p>
                </div>
            </div>
            <br>
            <div class="container-fluid well well-lg">
                <ul class="nav nav-tabs">
                    <p>Select a Cliente</p>
                    <li class="active"><a class="btn btn-info" data-toggle="tab" onclick="TypeOfSale=1;" href="#SaleClientNew">Register</a></li>
                    <li><a class="btn btn-info" data-toggle="tab" onclick="TypeOfSale=0;" href="#SaleClientPS">Private</a></li>
                </ul>

                <div class="tab-content well well-lg">
                    <div id="SaleClientNew" class="tab-pane fade in active">
                        <h3>New Client</h3>
                        <input type = "text" id="saleNewClientFirst" onkeypress="" class = "box" placeholder="First name"/>
                        <input type = "text" id="saleNewClientLast" onkeypress="" class = "box" placeholder="Last name"/>
                        <input type = "text" id="saleNewClientContact" onkeypress="" class = "box" placeholder="Contact"/>
                    </div>
                    <div id="SaleClientPS" class="tab-pane fade">
                        <h3>Private Sale</h3>
                        <p>the transaction will not register a client, isn't recommended if you want to keep good relationship with your customers through time.</p>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <br>
                <a type="button" class="btn btn-primary" onclick="makeASell();">register the sell</a>
            </div>
        </div>

        <div id="SalesViewSolds" class="tab-pane fade">
            <h3>Resume of the Month</h3>
            <h4 id="ShowingDate">period</h4>
            <a type="button" class="btn btn-primary" id='year' onclick='fechaAnt()'>Anterior</a>
            <a type="button" class="btn btn-primary" id='Today' onclick='fechaToday()'>Hoy</a>
            <a type="button" class="btn btn-primary" id='mes' onclick='fechaSig()'>Siguiente</a>
            <div id="InnerBodyShowSolds">
            </div>
            <script>fechaToday();</script>
        </div>
    </div>

</div>


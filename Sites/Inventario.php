<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/UsageStatistics.js'></script>
<script src='/PIA/JS/InventoryChange.js'></script>
<link rel="stylesheet" type="text/css" href="/PIA/CSS/tablas.css">
<?php
include("config.php");
session_start();
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "Invetary";
?>
<script>
    var idUser = "" + <?php echo $idUser; ?>;
    var ip = " + <?php echo $ip; ?>";
    var sitio = " + <?php echo $sitio; ?>";
    registerVisit(idUser,ip,sitio);
</script>
<div id="InventaryBody" class="well well-lg">
    <div id="InventaryHeader">
        <h3 class="align-baseline">Inventary</h3>
        <div class="container-fluid">
            <div class="dropdown navbar-right">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options <span class="glyphicon glyphicon-cog"></span></button>
                <ul class="dropdown-menu">
                    <li><a onclick="menuInventary(1)">See</a></li>
                    <li><a onclick="menuInventary(2)">Edit</a></li>
                    <li><a onclick="menuInventary(3)">Export</a></li>
                </ul>
            </div>

            <br>
        </div>
    </div>

    <div class="tab-content well well-lg">
        <div id="seeInventary" class="tab-pane fade in active">
            <div id="InventarySee">
                <script>menuInventary(1);</script>
            </div>
</div>

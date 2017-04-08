<?php
include("config.php");
session_start();
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "Home";
?>
<script src='/PIA/JS/UsageStatistics.js'></script>
<script>
    var idUser = "" + <?php echo $idUser; ?>;
    var ip = " + <?php echo $ip; ?>";
    var sitio = " + <?php echo $sitio; ?>";
    registerVisit(idUser,ip,sitio);
</script>
<h3>Welcome to P.I.A.</h3>
<h4>Products and Inventory Administered</h4>
<p>PIA is a little web system to help to the micro and little's businessman to keep and eye in their business's numbers.</p>
<p>we provide a register of your inventory, register of purchases/sales, calculating the profitability and utility of all time, every month and in cycles of 3, 6 and 12 months</p>
<br>
<p>By the moment PIA is in constant development, so, if you wanna get involved, here is the project, it's open source! feel free to contribute!</p>
<a type="button" class="btn btn-primary" href="https://github.com/Elem3ntal/PIA" target="_blank">GitHub</a>

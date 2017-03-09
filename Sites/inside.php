
<?php
$destroy=0;
session_start();
$variable = explode(",", $_GET["q"]);
if($variable[0]=="exit"){
    if(session_destroy()){
        $destroy=1;
    }
}
?>

<script src='/PIA/JS/validator.js'></script>
<script src='/PIA/JS/InsideSources.js'></script>
<script>
    var destroy = ""+ <?php echo $destroy; ?>;
    if(destroy==1){
        window.location.href = '';
    }
    function logout(){
        user=false;
        $("#main").load("Sites/inside.php?q=exit");
    }
</script>
<section id="mainContent">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="HeaderPart2" onclick="NavBar(0)">WebSiteName</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a  onclick="NavBar(1)">Inventario</a></li>
                    <li><a  onclick="NavBar(2)">Ventas</a></li>
                    <li><a  onclick="NavBar(3)">Compras</a></li>
                    <li><a  onclick="NavBar(4)">Resumen</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a onclick="alert('The translate service in\'t avalible');"><span class="glyphicon glyphicon-flag"></span>English</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="BodyInside">
        <script>
            $("#BodyInside").load("Sites/Home.php");
        </script>
    </section>
</section>
<section id="footerInside">
    <a onclick="logout();">logout</a>
    <p>Sitio en Construcción</p>
    <p>Creditos: &copy;Elem3ntal Development</p>
    <ul>
        <li id="Elem3ntalDmnt"><a href="/">WebSite</a></li>
        <li id="Elem3ntalDmnt"><a href="https://www.facebook.com/Elem3ntalDmnt" target="_blank" role="button">FanPage</a></li>
    </ul>
</section>

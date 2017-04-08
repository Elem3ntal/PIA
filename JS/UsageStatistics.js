function registerVisit(idUser, ip, sitio){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            retorno = this.responseText;
            if(retorno!=""){
                debugOutput("Visita registrada");
            }
            else{
            }
        }
        else{
        }
    }
    xmlhttp.open("GET","/PIA/Sites/UsageStatistics.php?q="+ idUser +"," + ip + "," + sitio,true);
    xmlhttp.send();
}

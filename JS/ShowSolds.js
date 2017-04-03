
function fechaSig() {
    if(mes == 12){
        anio += 1;
        mes = 1;
    }
    else{
        mes+=1;
    }
    document.getElementById("ShowingDate").innerHTML = mes+" - "+anio;
    $("#InnerBodyShowSolds").load("/PIA/Sites/ShowSoldsDinamic.php?q="+anio+","+mes);
}
function fechaAnt() {
    if (mes==1){
        mes=12;
        anio-=1;
    }
    else{
        mes-=1;
    }
    document.getElementById("ShowingDate").innerHTML = mes+" - "+anio;
    $("#InnerBodyShowSolds").load("/PIA/Sites/ShowSoldsDinamic.php?q="+anio+","+mes);
}
function fechaToday(){
    anio = new Date().getFullYear();
    mes = new Date().getMonth()+1;
    document.getElementById("ShowingDate").innerHTML = mes+" - "+anio;
    $("#InnerBodyShowSolds").load("/PIA/Sites/ShowSoldsDinamic.php?q="+anio+","+mes);
}

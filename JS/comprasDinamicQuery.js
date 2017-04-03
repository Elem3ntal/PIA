function PurchasefechaSig() {
    if(mes == 12){
        anio += 1;
        mes = 1;
    }
    else{
        mes+=1;
    }
    document.getElementById("ShowingDatePurchases").innerHTML = mes+" - "+anio;
    $("#InnerBodyShowPurchases").load("/PIA/Sites/ComprasDinamicView.php?q="+anio+","+mes);
}
function PurchasefechaAnt() {
    if (mes==1){
        mes=12;
        anio-=1;
    }
    else{
        mes-=1;
    }
    document.getElementById("ShowingDatePurchases").innerHTML = mes+" - "+anio;
    $("#InnerBodyShowPurchases").load("/PIA/Sites/ComprasDinamicView.php?q="+anio+","+mes);
}
function PurchasefechaToday(auto){
    anio = new Date().getFullYear();
    mes = new Date().getMonth()+1;
    document.getElementById("ShowingDatePurchases").innerHTML = mes+" - "+anio;
    $("#InnerBodyShowPurchases").load("/PIA/Sites/ComprasDinamicView.php?q="+anio+","+mes);
}

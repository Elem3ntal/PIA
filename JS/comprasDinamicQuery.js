function fechaSig() {
    if(mes == 12){
        anio += 1;
        mes = 1;
    }
    else{
        mes+=1;
    }
    document.getElementById('year').innerHTML = 'Año: '+anio;
    document.getElementById('mes').innerHTML = 'mes: '+mes;
    $("#BodyInside").load("/PIA/Sites/Compras.php?q="+anio+","+mes);
}
function fechaAnt() {
    if (mes==1){
        mes=12;
        anio-=1;
    }
    else{
        mes-=1;
    }
    document.getElementById('year').innerHTML = 'Año: '+anio;
    document.getElementById('mes').innerHTML = 'mes: '+mes;
    $("#BodyInside").load("/PIA/Sites/Compras.php?q="+anio+","+mes);
}
function fechaToday(auto){
    var anio = new Date().getFullYear();
    var mes = new Date().getMonth()+1;
    document.getElementById('year').innerHTML = 'Año: '+anio;
    document.getElementById('mes').innerHTML = 'mes: '+mes;
    if(auto!=0){
        NavBar(3);
    }
}

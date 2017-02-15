Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};

economicIndicators();
function economicIndicators(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById("demoDolar").innerHTML = myObj.dolar.valor.format(2, 3, '.', ',');
            document.getElementById("demoEuro").innerHTML = myObj.euro.valor.format(2, 3, '.', ',');
            document.getElementById("demoUF").innerHTML = myObj.uf.valor.format(2, 3, '.', ',');
            document.getElementById("demoUTM").innerHTML = myObj.utm.valor.format(0, 3, '.', ',');
        }
    };
    xmlhttp.open("GET", "http://www.mindicador.cl/api", true);
    xmlhttp.send();
    setTimeout(economicIndicators,90000);
}

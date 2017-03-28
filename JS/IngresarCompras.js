var productos = 1;
function hideAlerts(){
    $("#alertCompleto").hide();
    $("#alertIncompleto").hide();
    $("#alertEliminado").hide();
    $("#alertProductoIngresado").hide();
}
hideAlerts();
function agregarFila(){
    var id = productos;
    var table = document.getElementById("tablaIngresarCompras");
    var descripcion = document.getElementById("IngresoDescripcion").value;
    var cantidad = document.getElementById("IngresoCantidad").value;
    var precio = document.getElementById("IngresoPrecio").value;
    var venta = document.getElementById("IngresoVenta").value;
    if (descripcion == "" || cantidad == "" || precio == "" || venta == ""){
        $("#alertIncompleto").show();
        return;
    }
    productos+=1;
    document.getElementById("IngresoDescripcion").value = "";
    document.getElementById("IngresoCantidad").value = "";
    document.getElementById("IngresoPrecio").value = "";
    document.getElementById("IngresoVenta").value = "";
    var row = table.insertRow(1), cell1 = row.insertCell(0), cell2 = row.insertCell(1), cell3 = row.insertCell(2), cell4 = row.insertCell(3), cell5 = row.insertCell(4), cell6 = row.insertCell(5), cell7 = row.insertCell(6);
    cell1.innerHTML = id;
    cell2.innerHTML = descripcion;
    cell3.innerHTML = cantidad;
    cell4.innerHTML = precio;
    cell5.innerHTML = venta;
    cell6.innerHTML = ((venta-precio)/precio).toFixed(2)+'%';
    var d = new Date();
    cell7.innerHTML = d.getDate()+"-"+(d.getMonth()+1)+"-"+d.getFullYear();
    $("#alertCompleto").show();
}
function eliminarID(){
    var idToDelete = document.getElementById("EliminarID").value;
    if(idToDelete == "" ){
        return;
    }
    var table = document.getElementById('tablaIngresarCompras');
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        if(rows[i].firstChild.textContent == idToDelete){
            table.deleteRow(i);
            $("#alertEliminado").show();
            return;
        }
    }
}
function ingregarComprasAInventario(){
    var table = document.getElementById('tablaIngresarCompras');
    var rows = table.rows;
    for (var i = 1, row; row = table.rows[i]; i++) {
        hideAlerts();
        //iterate through rows
        //rows would be accessed using the "row" variable assigned in the for loop
        colDescrip = row.cells[1].innerHTML;
        colCant = row.cells[2].innerHTML;
        colPrecio = row.cells[3].innerHTML;
        colVenta = row.cells[4].innerHTML;
        alert(colDescrip+', '+colCant+', '+colPrecio+', '+colVenta);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                retorno = this.responseText;
                if(retorno==1){
                    $("#alertProductoIngresado").show();
                }
                else{
                    console.log(retorno);
                    $("#alertIncompleto").show();
                }
            }
            else{
            }
        }
        xmlhttp.open("GET","/PIA/Sites/registerNewBuy.php?q="+colDescrip+","+colPrecio+','+colCant+','+colVenta,true);
        xmlhttp.send();
    }
}

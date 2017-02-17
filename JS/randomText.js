function about()
{
    $("#mainContent").load("about.html");
}
function inventory()
{
    $("#mainContent").load("inventory.html");
}
function otherServices()
{
    alert("Not Implemented");
}
//funciones random para llenar el table del inventario
var nombresColumnas=['ID','Region','Nombre','Stock','Cant','Precio','Descrip','random','familia','Grupo','texto','pais','origen','moneda'];
function llenarTabla(){
    var cantColum = parseInt(document.getElementById("cantColumnas").value);
    var cantFilas = parseInt(document.getElementById("cantFilas").value);
    console.log("Colum: "+cantColum+", cantFilas: "+cantFilas);
    var tbl = document.getElementById("tableShow");
    if(tbl) tbl.parentNode.removeChild(tbl);

    console.log("tabla eliminada");

    var myTableDiv = document.getElementById("table-responsive")
    var table = document.createElement('TABLE')
    var tableBody = document.createElement('TBODY')
    table.className = "table";
    table.id = "tableShow";
    table.appendChild(tableBody);
    console.log("se creo tabla nueva");
    //TABLE COLUMNS
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);
    for (i = 0; i < cantColum; i++) {
        var th = document.createElement('TH')
        th.width = '75';
        th.appendChild(document.createTextNode(nombresColumnas[Math.floor(Math.random() * nombresColumnas.length)]));
        tr.appendChild(th);
    }
    console.log("se crearon las columnas");

    //TABLE ROWS
    for (i = 0; i < cantFilas; i++) {
        console.log("i: "+i+"cantFilas: "+cantFilas);
        var tr = document.createElement('TR');
        for (j = 0; j < cantColum; j++) {
            var td = document.createElement('TD')
            td.appendChild(document.createTextNode(palabraRandom()));
            tr.appendChild(td)
        }
        tableBody.appendChild(tr);
    }
    myTableDiv.appendChild(table)
}

function palabraRandom(){
    var salida="";
    for (i2=0;i2<Math.floor(Math.random()*6);i2++){
        var res = String.fromCharCode(Math.floor(Math.random()*26)+71);
        salida+=res;
    }
    return salida;
}

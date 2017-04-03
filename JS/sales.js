var products=[]; //id,
var TypeOfSale=1; //1 register client, 0 Private Sale.
var productInSale=[]; //0 ID del producto en BougthID, 1, cantidad que se vende

function createProductInSale(){
    productInSale[1] = document.getElementById("CantiadEnVenta").value;
    debugOutput("Cant in sale: "+productInSale[1]);
}

function SaleConsultarIDdescripcion(e){
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {
        var IDaProducto = document.getElementById("saleExactID").value;
        productInSale[0] = IDaProducto;
        if(IDaProducto!=""){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    retorno = this.responseText;
                    //                        alert(retorno);
                    if(retorno=="YOU SHALL NOT PASS!"){
                        alert("ERROR in the server, please contact the Admin");
                    }
                    else{
                        if(retorno==""){
                            document.getElementById("saleExactIDdescription").value = "ID erroneo";
                            document.getElementById("CantMaxOfSale").value = "CantMax!";
                        }
                        else{
                            document.getElementById("saleExactIDdescription").value = retorno.split(',')[1];
                            document.getElementById("CantMaxOfSale").value = retorno.split(',')[2];
                            document.getElementById("SalePrice").value = retorno.split(',')[3];
                        }
                    }
                }
                else{
                }
            }
            xmlhttp.open("GET","/PIA/Sites/VentasIngresarMetodos.php?q=2,"+IDaProducto,true);
            xmlhttp.send();
        }
    }
}
function SaleFinderIDClear(){
    var select = document.getElementById("saleSelecID");
    select.selectedIndex = "-1";
    select.options.size = 0;
    document.getElementById("CantMaxOfSale").value="CantMax!";
    document.getElementById("SalePrice").value="";
}

function selectIDProductCant(){
    var selectBox = document.getElementById("saleSelecID");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    productInSale[0] = products[selectedValue.split(' ')[0]][0];
    var MaxProductos = products[selectedValue.split(' ')[0]][2];
    var precioVenta =  products[selectedValue.split(' ')[0]][3];
    document.getElementById("CantMaxOfSale").value = MaxProductos;
    document.getElementById("SalePrice").value = precioVenta;
}

function saleFindID(){
    var descripcion = document.getElementById("SaleFindIDdescripcion").value;
    if(descripcion.length<3){
        SaleFinderIDClear();
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            retorno = this.responseText;
            //                        alert(retorno);
            if(retorno=="YOU SHALL NOT PASS!"){
                alert("ERROR in the server, please contact the Admin");
            }
            else{
                //separar la cadena en 3 en 3
                var productsReturn = retorno.split(",");
                var cantProduct = (productsReturn.length/4);
                //reset de variables
                document.getElementById("saleSelecID").innerHTML = "";
                products=[];

                for(i=0;i<cantProduct;i++){
                    products[i]=[];
                    for(j=0;j<4;j++)
                        products[i][j]=productsReturn[(i*4)+j];
                    debugOutput(products[i][0]+', '+products[i][1]+', '+products[i][2]+', '+products[i][3]);
                }
                console.log("Cantidad de productos: "+products.length);
                var index=0;
                var selectIDSale = document.getElementById("saleSelecID");
                for(element in products)
                {
                    var opt = document.createElement("option");
                    opt.value = index;
                    opt.innerHTML = products[index][0]+" "+products[index][1]; // whatever property it has
                    // then append it to the select element
                    selectIDSale.appendChild(opt);
                    index++;
                }
                saleDisplayFinID();
            }
        }
        else{
        }
    }
    xmlhttp.open("GET","/PIA/Sites/VentasIngresarMetodos.php?q=1,"+descripcion,true);
    xmlhttp.send();
}

function saleDisplayFinID(){
    selectbox = $('#saleSelecID')[0];
    selectbox.size = selectbox.options.length+1;
}
function makeASell(){
    debugOutput(TypeOfSale);
    if(TypeOfSale==0){
        debugOutput("Anonimate Sale");
        //FROM HERE!
        var link = "/PIA/Sites/VentasIngresarMetodos.php?q=3,"+productInSale[0]+","+productInSale[1];
        alert(link);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET",link,true);
        xmlhttp.send();
        //TO HERE
    }
    else if (TypeOfSale==1){
        debugOutput("New client");
        var nombre = document.getElementById("saleNewClientFirst").value;
        var apellido = document.getElementById("saleNewClientLast").value;
        var contact = document.getElementById("saleNewClientContact").value;
        //FROM HERE!
        var link = "/PIA/Sites/VentasIngresarMetodos.php?q=4,"+productInSale[0]+","+productInSale[1]+","+nombre+","+apellido+","+contact;
        debugOutput(link);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET",link,true);
        xmlhttp.send();
        //TO HERE
    }
}

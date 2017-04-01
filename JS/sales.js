var products=[];
function SaleConsultarIDdescripcion(e){
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {
        var IDaProducto = document.getElementById("saleExactID").value;
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
}

function selectIDProductCant(){
    var selectBox = document.getElementById("saleSelecID");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var MaxProductos=products[selectedValue.split(' ')[0]][2];
    document.getElementById("CantMaxOfSale").value=MaxProductos;
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
                var cantProduct = (productsReturn.length/3);
                //reset de variables
                document.getElementById("saleSelecID").innerHTML = "";
                products=[];

                for(i=0;i<cantProduct;i++){
                    products[i]=[];
                    for(j=0;j<3;j++)
                        products[i][j]=productsReturn[(i*3)+j];
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

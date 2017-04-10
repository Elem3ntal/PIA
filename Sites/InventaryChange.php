<?php
include("config.php");
session_start();
$idUser = getIdUser();
$ip = getIPuser();
$sitio = "InventaryChange";
try {
    $user = $_SESSION['loginID'];
    $variable = explode(",", $_GET["q"]);
    if($variable[0]=="0"){//opcion de menu, cero busquedas, carga todo el inventario
    }
    if($variable[0]=="1"){//opcion 1 que se llama desde menu cero, viene con dos parametros, para buscar elementos y filtrarlos
    }
    if($variable[0]=="2"){ //exportar inventario
    }
}
catch(Throwable $t) {
    echo $t->getMessage();
}
if($variable[0]=="0"){
    try{
        $sql = "CALL GetInventario(".$_SESSION['loginID'].");";
        $result = mysqli_query($db,$sql);
        echo "
        <h3>Edit</h3>
<input type='text' id='InventoryChangeID' value='' placeholder='ID' readonly>
<input type='text' id='InventoryChangeDescript' value='' placeholder='Descript'>
<input type='text' id='InventoryChangePrice' value='' placeholder='Price'>
<input type='text' id='InventoryChangeDate' value='' placeholder='Date' readonly>
<a type='button' class='btn btn-info' onclick='actualizarProducto();'>Update</a>

<br>
<a type='button' class='btn btn-info' data-toggle='collapse' data-target='#filtersChangeInvent' onclick='ICcleanFilters();'>Filter List</a>
<div id='filtersChangeInvent' class='collapse row' style='width:90%;height:500px'>
    <input type='text' id='ICFid' value='' placeholder='ID' onkeyup='ICfilterList()'>
    <input type='text' id='ICFdescript' value='' placeholder='Descript' onkeyup='ICfilterList()'>
</div>
    <h3>Modificate Inventary</h3>
<table id='ICTable'>
<tr>
<th>Id</th>
<th>Description</th>
<th>Cost</th>
<th>Price</th>
<th>Date</th>
</tr>";
        //Bought_id, Bought_descrip, Inventory_Cant, Bought_cost, Bought_Sold, Bought_date
        while($row = mysqli_fetch_array($result)) {
            $invProductos++;
            echo "<tr>";
            echo "<td>" . $row['Inventory_id'] . "</td>";
            echo "<td>" . $row['Bought_descrip'] . "</td>";
            echo "<td>" . "$".number_format($row['Bought_cost'], 0) . "</td>";
            echo "<td>" . "$".number_format($row['Bought_Sold'], 0) . "</td>";
            echo "<td>" . $row['Bought_date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    catch (Throwable $t) {
        echo $t->getMessage();
    }
    mysqli_close($con);
}
else if($variable[0]=="2"){
?>
<h4>Export service isn't available</h4>
<?php
}
?>
<script>
    function ICfilterList(){
        var ICFid = document.getElementById("ICFid").value;
        var ICFdescript = document.getElementById("ICFdescript").value;
        if(ICFid == "" && ICFdescript == ""){
            console.log("hace nada");
            menuInventary(2);
        }
        else{
            console.log("hace todo");
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
                        alert("Producto Modificado");
                        ICcleanFilters();

                    }

                    window.onload = addRowHandlers();
                }
            }
            xmlhttp.open("GET","/PIA/Sites/InventoryFilters.php?q=1,"+ICFid+',' +ICFdescript, true);
            xmlhttp.send();
        }
    }
    function actualizarProducto(){
        var ICupdateID = document.getElementById("InventoryChangeID").value;
        var ICupdateDescrip = document.getElementById("InventoryChangeDescript").value;
        var ICupdatePrice = document.getElementById("InventoryChangePrice").value;
        var ICupdateDate = document.getElementById("ICFdescript").value;
        if (ICupdateDescrip=="")
            return;
        if (ICupdatePrice=="")
            return;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                retorno = this.responseText;
                console.log(retorno);
                limpiarTabla();
                document.getElementById("ICTable").innerHTML=retorno;
                window.onload = addRowHandlers();
            }
        }
        xmlhttp.open("GET","/PIA/Sites/InventoryFilters.php?q=3,"+ICFid+',' +ICFdescript, true);
        xmlhttp.send();
    }
    function limpiarTabla(){
        var table = document.getElementById('ICTable');
        var rows = table.rows.length;
        for (var i = 1; i <= rows-1; i++) {
            table.deleteRow(1);
        }

    }
    function ICcleanFilters(){
        document.getElementById("ICFid").value="";
        document.getElementById("ICFdescript").value="";
    }
    function addRowHandlers() {
        var table = document.getElementById("ICTable");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
            {
                return function() {
                    var cellID = row.getElementsByTagName("td")[0];
                    var cellDescript = row.getElementsByTagName("td")[1];
                    var cellPrice = row.getElementsByTagName("td")[3];
                    var cellDate = row.getElementsByTagName("td")[4];
                    document.getElementById("InventoryChangeID").value=cellID.innerHTML;
                    document.getElementById("InventoryChangeDescript").value=cellDescript.innerHTML;
                    document.getElementById("InventoryChangePrice").value=cellPrice.innerHTML;
                    document.getElementById("InventoryChangeDate").value=cellDate.innerHTML;
                };
            };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    window.onload = addRowHandlers();
</script>

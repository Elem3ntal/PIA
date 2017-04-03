<?php
include("config.php");
session_start();
try {
    $user = $_SESSION['loginID'];
    $variable = explode(",", $_GET["q"]);
    if($variable[0]=="1"){ //obtener inventario por filtro descripcion
        $descript = mysqli_real_escape_string($db,$variable[1]);
        $user = mysqli_real_escape_string($db,$user);
        $sql = "CALL inventarioPorDescripcion(".$user.",'".$descript."');";
        $result = mysqli_query($db,$sql);
        $j=0;
        $maxlength=$result->num_rows;
        while($row = mysqli_fetch_array($result)) {
            for ($i = 0; $i <= 2; $i++) {
                echo $row[$i].',';
            }
            $j=$j+1;
            if($j==$maxlength){
                echo $row[3];
            }
            else{
                echo $row[3].',';
            }
        }
    }
    elseif($variable[0]=="2"){
        $IDrequest = mysqli_real_escape_string($db,$variable[1]);
        $user = mysqli_real_escape_string($db,$user);
        $sql = "CALL productoPorID(".$user.",'".$IDrequest."');";
        $result = mysqli_query($db,$sql);
        $j=0;
        $maxlength=$result->num_rows;
        while($row = mysqli_fetch_array($result)) {
            for ($i = 0; $i <= 2; $i++) {
                echo $row[$i].',';
            }
            $j=$j+1;
            if ($j == $maxlength){
                echo $row[3];
            }
            else{
                echo $row[3].',';
            }
        }
    }


    elseif($variable[0]=="3"){ // venta anonima, recive el ID del producto y la cantidad
        $user = mysqli_real_escape_string($db,$user);
        $IDproducto = mysqli_real_escape_string($db,$variable[1]);
        $CantVenta = mysqli_real_escape_string($db,$variable[2]);
        $sql = "SELECT venta(".$user.",1,".$IDproducto.",".$CantVenta.");";
        $result = mysqli_query($db,$sql);
        $Resultado = mysqli_fetch_array($result);
        echo $Resultado;

    }
    elseif($variable[0]=="4"){ // venta con cliente, recive el ID del producto y la cantidad, nombre, apellido y contacto del cliente.
        $user = mysqli_real_escape_string($db,$user);
        $IDproducto = mysqli_real_escape_string($db,$variable[1]);
        $CantVenta = mysqli_real_escape_string($db,$variable[2]);
        $clienteNombre = mysqli_real_escape_string($db,$variable[3]);
        $clienteApellido = mysqli_real_escape_string($db,$variable[4]);
        $clienteTelefono = mysqli_real_escape_string($db,$variable[5]);
        $sql = "SELECT ClienteRegistrar('".$clienteNombre."','".$clienteApellido."','".$clienteTelefono."');";
        $result = mysqli_query($db,$sql);
        $clientID = mysqli_fetch_array($result);
        $sql = "SELECT venta(".$user.",".$clientID[0].",".$IDproducto.",".$CantVenta.");";
        $result = mysqli_query($db,$sql);
        $Resultado = mysqli_fetch_array($result);
        echo $Resultado;
    }
//     si es llamado sin parametros
    else{
        echo "YOU SHALL NOT PASS!";
    }
}
catch(Throwable $t) {
    echo $t->getMessage();
}
?>

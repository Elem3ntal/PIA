<?php
include("config.php");
session_start();
try{
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
            for ($i = 0; $i <= 1; $i++) {
                echo $row[$i].',';
            }
            $j=$j+1;
            if($j==$maxlength){
                echo $row[2];
            }
            else{
                echo $row[2].',';
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
            for ($i = 0; $i <= 1; $i++) {
                echo $row[$i].',';
            }
            $j=$j+1;
            if($j==$maxlength){
                echo $row[2];
            }
            else{
                echo $row[2].',';
            }
        }
    }
    else{
        echo "YOU SHALL NOT PASS!";
    }
}
catch(Throwable $t) {
    echo $t->getMessage();
}
?>

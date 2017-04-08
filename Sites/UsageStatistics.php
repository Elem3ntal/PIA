<?php
include('config.php');
try{
    $variable = explode(",", $_GET["q"]);
    if ($variable[0]!="") {
        $id = mysqli_real_escape_string($db,$variable[0]);
        $ip = mysqli_real_escape_string($db,$variable[1]);
        $sitio = mysqli_real_escape_string($db,$variable[2]);
        $sql = "SELECT LogVisit(". $id .",'". $ip ."','". $sitio ."');";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        echo $row[0];
    }
    else {
        echo "Sin variables a registrar\n";
        $sql = "select LogVisit(0,'NO IP','NO SITE');";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        echo $row[0];
    }
}
catch (Throwable $t) {
    echo $t->getMessage();
}
?>

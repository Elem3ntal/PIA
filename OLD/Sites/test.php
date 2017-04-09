
<?php
define('ENDL', '<br>');
include("config.php");
echo date("m").ENDL;
echo 'TestSite for PIA in PHP'.ENDL;
//Call the proc() procedure follow
$sql = "CALL GetCompras(1);";
echo 'sql send'.ENDL;
try{
    echo 'inside try'.ENDL;
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_row($result))
    {
        for($i=0;$i<=6;$i++)
        {
            echo  $row[$i].ENDL;
        }
    }
}
catch (Throwable $t) {
    echo $t->getMessage();
}
echo 'cerrando sql'.ENDL;
mysqli_close($con);
?>

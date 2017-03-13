<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'qwerasd123');
define('DB_DATABASE', 'PIA');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
define('DEBUG',true);
define('ENDL', '<br>');
setlocale(LC_MONETARY, 'en_US');
function debug(string $mensaje){
    if(DEBUG==true){
        echo "<p id='debugMessage'>" .$mensaje ."</p>";
    }
}
?>

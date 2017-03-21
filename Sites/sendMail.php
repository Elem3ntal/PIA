<?php
$to = "javier08@hotmail.com";
$subject = "validar cuenta";
$txt = "hola mundo, link para validar";
$headers = "From: Javier javier.rodriguez.benavente@gmail.com";
try{
    $retorno = mail($to,$subject,$txt,$headers);
    echo 'Mail Enviado: '.$retorno;
}
catch (Throwable $t) {
    echo $t->getMessage();
}
?>

<?php
//for currency data
setlocale(LC_MONETARY, 'en_US');
// to make new lines more easy to read
define('ENDL', '<br>');
// server variables.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'qwerasd123');
define('DB_DATABASE', 'PIA');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//debug in true to show, false to hide the info.
define('DEBUG',false);
function debug(string $mensaje){
    if(DEBUG==true){
        echo "<p id='debugMessage'>" .$mensaje ."</p>";
    }
}
//mail config
function bodyMail($type,$toName,$toMail){
    if($type==0){
        return "
        <html>
<head>
<title>finish your registration</title>
</head>
<body>
<p>PIA is a little web system to help to the micro and little's businessman to keep and eye in their business's numbers</p>
<p>This email contains a link to finish your registration in PIA</p>
<table>
<tr>
<th>Finish your registration ".$toName." to access to the full site!</th>
</tr>
<tr>
<td><a href='elem3ntal.dnsdynamic.net/PIA/Sites/ValidateAccount.php?q=".$toMail."'>HERE!</a></td>
</tr>
</table>
</body>
</html>";
    }
    return "Text Not Defined!";
}
function typeMail($type,$toName){
    if($type==0){
        return 'Finish your registration '.$toName.'!';
    }
    return "Subject Not Defined!";
}
function sendMail($toName,$toMail,$type){
    try{
        $message=bodyMail($type,$toName,$toMail);
        $subject=typeMail($type,$toName);
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: PIA(Products and Inventory Administred) elem3naldnt@gmail.com';
        mail($toMail,$subject,$message,$headers);
        return 1;
    }
    catch (Throwable $t) {
        echo 'error catched!: '.$t->getMessage();
        return 0;
    }
}
?>

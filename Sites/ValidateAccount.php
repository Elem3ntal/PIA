<?php
// registerNewUser.php
include("config.php");
$variable = explode(",", $_GET["q"]);
if($variable[0]!=""){
   $email = mysqli_real_escape_string($db,$variable[0]);
   $sql = "SELECT VerificarEmail('".$email."');";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result);
}
?>
<html>
   <head>
      <script>
         var enviar = ""+ <?php echo $row[0]; ?>;
         function mandarAInside(enviar){
            if(parseInt(enviar)==1){
               alert("validation successful, redirecting to login");
               //usuario validado correctamente, dirigiendo al login!
            }
         }
         mandarAInside(enviar);
         function outOfHere(){
            window.location.assign("/PIA/");
         }
         setTimeout(outOfHere,666);
      </script>
   </head>
   <body>
      <p>Enjoy PIA MOTHERFUCKER!!</p>
   </body>
</html>

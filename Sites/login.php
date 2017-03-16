<?php
include("config.php");
session_start();
$inside = 0;
$error = "";
$variable = explode(",", $_GET["q"]);
if($variable[0]!=""){
   $user=mysqli_real_escape_string($db,$variable[0]);
   $pass=mysqli_real_escape_string($db,utf8_decode(md5(($variable[1]))));
   //
   $sql = "SELECT Users_id FROM PIA.Users WHERE Users_name = '$user' and Users_pass = '$pass'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['Users_id'];
   $count = mysqli_num_rows($result);
   $error = "query ejecutada: ".$count." filas.";
   $inside = $row['Users_id'];
   $_SESSION['login_user'] = $user;
   $_SESSION['loginID'] = $inside;

}
else{
   if(isset($_SESSION['login_user'])){
      $error = "Usuario Encontrado";
      $inside = $_SESSION['loginID'];
   }
}
?>
<script>
   var enviar = ""+ <?php echo $inside; ?>;
   function mandarAInside(enviar){
      if(parseInt(enviar)>0){
         user=true;
         $("#main").load("Sites/inside.php");
      }
   }
   mandarAInside(enviar);
   function login(){
      var user = document.getElementById("username").value;
      var pass = document.getElementById("password").value;
      $("#main").load("Sites/login.php?q="+user+","+pass);
   }
   function ChangeToRegistrer(){
      $("#main").load("/PIA/Sites/register.php");
   }
</script>
<div id="main2">
   <div style = "width:300px; border: solid 1px #333333; " align = "left">
      <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
      <form action = "" method = "post">
         <label>UserName  :</label><input type = "text" id="username" class = "box"/><br /><br />
         <label>Password  :</label><input type = "password" id="password" class = "box" /><br/><br />
         <a onclick="login();">Submit</a>
         <br/>
         <a onclick="ChangeToRegistrer();">Registrer FREE!</a>
      </form>
      <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
   </div>
</div

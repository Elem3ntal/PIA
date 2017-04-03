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
   $sql = "CALL Login('".$user."','".$pass."');";
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
   loadjscssfile("/CSS/inside.css","css");
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
   function enviarUsuario(e){
      // look for window.event in case event isn't passed in
      e = e || window.event;
      if (e.keyCode == 13)
      {
         console.log('Key Enter Detected');
         login();
      }
   }
</script>
<script>loadjscssfile("CSS/login.css","css");</script>
<div id="InfoPIA">
   <h3>Welcome to P.I.A.</h3>
   <h4>Products and Inventory Administered</h4>
   <p>PIA is a little web system to help to the micro and little's businessman to keep and eye in their business's numbers.</p>
   <p>We provide a register of your inventory, register of purchases/sales, calculating the profitability and utility of all time, every month and in cycles of 3, 6 and 12 months</p>
</div>
<div id="main2">
   <div id="login" align = "center">
      <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login In</b></div>
      <form action = "" method = "post">
         <input type = "text" id="username" class = "box" placeholder="Username"><br/>
         <input type = "password" id="password" class = "box" onkeyup='enviarUsuario(event);' placeholder="Password"/>
         <br/><br/>
         <a type="button" class="btn btn-success" onclick="login();">log in</a>
         <br/><br/>
         <a type="button" class="btn btn-info" onclick="ChangeToRegistrer();">Sign Up</a>
      </form>
      <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
   </div>
</div

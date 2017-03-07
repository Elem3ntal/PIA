
<?php
$destroy=0;
session_start();
$variable = explode(",", $_GET["q"]);
if($variable[0]=="exit"){
   if(session_destroy()){
      $destroy=1;
   }
}
?>

<script src="JS/validator.js"></script>
<script>
   var destroy = ""+ <?php echo $destroy; ?>;
   if(destroy==1){
      window.location.href = '';
   }
   function logout(){
      user=false;
      $("#main").load("Sites/inside.php?q=exit");
   }
</script>
<section id="mainContent">
   <p>Dentro del programa</p>
   <p>Sitio en construccion</p>
</section>
<section>
   <a onclick="logout();">logout</a>
</section>

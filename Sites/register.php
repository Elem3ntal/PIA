<?php
include("config.php");
?>
<script>
   function showResult(){
      console.log('console text');
      var inputElem = document.getElementById("username");
      var stra = document.getElementById("username").value;
      console.log(stra);
      if (stra.length == 0) {
         if (inputElem.value == "") {
            inputElem.style.backgroundColor = "";
            return;
         }
      }
      if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
         if (this.readyState==4 && this.status==200) {
            retorno = this.responseText;
            inputElem.style.backgroundColor = "yellow";
            if(retorno==1){
               inputElem.style.backgroundColor = "red";
            }
            else{
               inputElem.style.backgroundColor = "green";
            }
         }
         else{
         }
      }
      xmlhttp.open("GET","/PIA/Sites/checkUser.php?q="+stra,true);
      xmlhttp.send();
   }
   function registrarUsuarioNuevo(){
      var pass1 = document.getElementById("password").value;
      var pass2 = document.getElementById("password2").value;
      var user = document.getElementById("username").value;
      if(user.length > 6 && pass1==pass2){
         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
         } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
               retorno = this.responseText;
               if(retorno==1){
                  alert('Usuario Registrado!');
                  $("#main").load("/PIA/Sites/login.php");
               }
               else{
                  alert("no return found");
               }
            }
            else{
            }
         }
         xmlhttp.open("GET","/PIA/Sites/registerNewUser.php?q="+user+','+pass1,true);
         xmlhttp.send();
      }
   }
   function searchKeyPress(e)
   {
      // look for window.event in case event isn't passed in
      e = e || window.event;
      if (e.keyCode == 13)
      {
         registrarUsuarioNuevo();
         console.log('Key Enter Detected');
         return false;
      }
      return true;
   }
   function checkPassword(){
      var pass1 = document.getElementById("password").value;
      var pass2 = document.getElementById("password2").value;
      if(pass2.length == 0){
         document.getElementById("password2").style.backgroundColor="";
         return;
      }
      if(pass1 == pass2){
         document.getElementById("password2").style.backgroundColor="green";
      }
      else{
         document.getElementById("password2").style.backgroundColor="yellow";
      }
   }
</script>
<label>UserName:</label><input type = "text" id="username" class = "box" onkeyup = "showResult();"/><br/>
<label>Password:</label><input type = "password" id="password" class = "box" /><br/>
<label>Reinsert Password:</label><input type = "password" id="password2" class = "box" onkeyup = "checkPassword();return searchKeyPress(event);"/><br/>

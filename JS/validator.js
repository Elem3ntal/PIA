function validator(){
   try {
      if(master==true){
         console.log("no problems with the master");
      }
      else{
         window.location.href = '/PIA/index.html';
      }
   }
   catch(err) {
      window.location.href = '/PIA/index.html';
   }
   try{
      if(user==true){
      }
      else{
         $("#main").load('/PIA/Sites/login.php');
      }
   }
   catch(err) {
      $("#main").load('/PIA/Sites/login.php');
   }
}
validator();

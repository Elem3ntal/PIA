function validator(){
   try {
      if(master==true){
         console.log("no problems with the master");
      }
      else{
         window.location.href = 'index.html';
      }
   }
   catch(err) {
      window.location.href = 'index.html';
   }
   try{
      if(user==true){
      }
      else{
         $("#main").load('Sites/login.php');
      }
   }
   catch(err) {
      $("#main").load('Sites/login.php');
   }
}
validator();

//variables
var debug = true;
//functions
function debugOutput(Messsage) {
   console.log(Messsage);
}
function debugStatus(TrueFalse) {
   try {
      if(Boolean(TrueFalse))
         debug = true;
      else if (!Boolean(TrueFalse))
         debug = false;
      console.log("debug Status Changed to: "+debug);
   }
   catch(err) {
      console.log("Fail to change the Debug Status: "+err.message);
      console.log("Set default in true");
   }
}
function validator() {
   try {
      if(master==true)
         debugOutput("no problems with the master");
      else
         window.location.href = '/PIA/index.html';
   }
   catch(err) {
      window.location.href = '/PIA/index.html';
   }
   try{
      if(!Boolean(user))
         $("#main").load('/PIA/Sites/login.php');
   }
   catch(err) {
      $("#main").load('/PIA/Sites/login.php');
   }
}
//call to those functions
debugOutput("Validador Javascript Loaded");
validator();

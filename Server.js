var express         =         require("express");
var mysql           =         require("mysql");
var app             =         express();

/*
  * Configure MySQL parameters.
*/
var connection      =         mysql.createConnection({
        host        :         "localhost",
        user        :         "root",
        password    :         "qwerasd123",
        database     :         "PIA"
});

connection.connect(function(error){
  if(error)
    {
      console.log("Problem with MySQL"+error);
    }
  else
    {
      console.log("Connected with Database");
    }
});

/*
  * Configure Express Server.
*/
app.use(express.static(__dirname + '/angular'));
/*
  * Define routing of the application.
*/
app.get('/',function(req,res){
  res.sendfile('index.html');
});

app.get('/load',function(req,res){
  connection.query("SELECT * from user_info",function(err,rows){
    if(err)
      {
        console.log("Problem with MySQL"+err);
      }
      else
        {
          res.end(JSON.stringify(rows));
        }
  });
});

/*
  * Start the Express Web Server.
*/
app.listen(3000,function(){
  console.log("It's Started on PORT 3000");
});

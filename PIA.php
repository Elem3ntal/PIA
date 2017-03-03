
<?php
include('session.php');
?>
<html>
   <head>
      <title>Welcome </title>
      <script src="JS/firstSources.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="JS/firstSources.js"></script>
   </head>

   <body>
      <h1>Welcome <?php echo $user_check; ?></h1>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
               <li><a onclick="inventory()">Inventory</a></li>
               <li><a onclick="Bought()">Bought</a></li>
               <li><a onclick="Sold()">Sold</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
               <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
         </div>
      </nav>
      <section id="mainContent">
         <script>
            $("#mainContent").load("inventario.php");
         </script>
      </section>
      <a href = "logout.php">Sign Out</a>
   </body>
   <script src="JS/lastSources.js"></script>
</html>

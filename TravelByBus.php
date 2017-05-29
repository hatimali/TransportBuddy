<?php 
			
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "fastiandevloper";
			$dbname = "transport buddy";
			$db = mysql_connect($dbhost,$dbuser,$dbpass);
            mysql_select_db("transport buddy",$db);
         
?>






<!DOCTYPE html>
<html lang="en">
<head>
<style>
.img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  max-width: 100%;
  height: 300px;
}

.jumbotron { 
    background-color:orange; /* Orange */
    color: #ffffff;
	width:400px;
	padding:0px;
	
}


.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 760px;;
      margin: auto;
  }
  
  
  .carousel-inner > .item > button,
  .carousel-inner > .item > a > img {
      width: 760px;;
      margin-left:20px;
	  margin-bottom:20px;
  }
  
  
  .nopadding {
   padding: 0 !important;
   margin: 0 !important;
}

h1,h2{
	
color:green;	
}




</style>

  <title>Travel By BUS</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise-slider/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="allcss.css">

  <link rel="stylesheet" href="dist/css/bootstrap-select.css">
    <link rel="text/script" href="dist/js/bootstrap-select.js">
  
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="dist/css/bootstrap-select.css">
   <link rel="stylesheet" href="dist/css/bootstrap-select.min.css">
    <link rel="text/script" href="dist/js/bootstrap-select.js">
  
  <style>
body{
background-image:url('new.jpg');
background-repeat:no-repeat;
background-size:cover;
}
      
#section1 
    
{
    padding-top:52px;
    

   
}
      
.vijay img {
  width: auto;
  height: 100px;
  max-height: 80px;
}      

      
</style>


</head>
<body >
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
	  <a class="navbar-brand" href="#"><img src="Drawing.png" style="height:30px;width:80px;" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="main.php">Home</a></li>
        <li><a href="web/about.html">About</a></li>
        <li><a href="#">Contact</a></li> 

      </ul></nav></div>
     
	  
	  
	  <div id="section1">
    <div class="col-sm-6 nopadding">
     <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="bus.jpg" class="vijay" alt="Chania" >
        <div class="carousel-caption">
          <h1>Travel By Bus</h1>
		  <h2>Get info about all routes and its bus</h2>
		  <br><br>
        </div>
      </div>

	  
      <div class="item">
        <img src="bus.jpg"  class="vijay" alt="Chania" >
        <div class="carousel-caption">
          <h1>Travel By Bus</h1>
		  <h2>Get info about all routes and its bus</h2>
		  <br><br>
        </div>
      </div>
    
	
      <div class="item">
        <img src="bus.jpg" class="vijay" alt="Flower" >
        <div class="carousel-caption">
          <h1>Travel By Bus</h1>
		  <h2>Get info about all routes and its bus</h2>
		  <br><br>
        </div>
      </div>

        
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <button type="button" class="btn btn-primary btn-lg outline" data-toggle="collapse" data-target="#travel">Travel</button><br>
	<div id="travel" class="collapse"><br>
	
	  
	   <form class = "form-horizontal" role = "form" action="seetravel.php"  method="post">
          <div class = "form-group">
		    <div class="col-sm-6">
        <select name="source" class="form-control">
                
			<option selected>Source</option>	
              <?php
                $sql = mysql_query("SELECT distinct stop FROM bus_stops");
                while($row = mysql_fetch_array($sql))
                {
                    echo "<option>".$row['stop']. "</option>";
                }
              ?>
         </select>
           </div>
             </div>
			 
			 
			 <div class = "form-group">
		       <div class="col-sm-6">
           <select name="destination" class="form-control">
            <option selected>Destination</option>		   
              <?php
                $sql = mysql_query("SELECT distinct stop FROM bus_stops");
                while($row = mysql_fetch_array($sql))
                {
                    echo "<option>".$row['stop']. "</option>";
                }
              ?>
             </select>
               </div>
                </div>
			 <div class = "form-group">
              <div class = "col-sm-offset-2 col-sm-6">
                <button type = "submit" class = "btn btn-secondary">Generate</button>
				
                  </div>
                   </div>
	
			 </form>
			 
			 
  
   
   
	
	
    

  

  
	</div>

			 


	</div>



	
     	
	<div class="col-sm-6 nopadding">
     <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="EXPLORE1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h1>Explore all Bus </h1>
		  <h2>Get info about all routes and its bus</h2>
		  <br><br>
		  <br><br>
        </div>
      </div>

      <div class="item">
        <img src="EXPLORE2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h1>Explore all Bus </h1>
		  <h2>Get info about all routes and its bus</h2>
		  <br><br>
        </div>
      </div>
    
      <div class="item">
        <img src="Nagan_Ch_Karachi.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
           <h1>Explore all Bus </h1>
		  <h2>Get info about all routes and its bus</h2>
		  <br><br>
        </div>
      </div>

      

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
	
  </div>
</div>

<button type="button" class="btn btn-primary btn-lg outline" data-toggle="collapse" data-target="#Explore">Explore</button><br>
	<div id="Explore" class="collapse"><br>
	
	
	 <form id = "bootsrapSelectForm" method = "post"  name="select"   class="form-horizontal" action="EX.php">
      
        <div class="form-group">
        <label class="col-xs-3 control-label"><strong>Select BUS</strong></label>
        <div class="col-xs-5 selectContainer">
            <select name="select" class="form-control">
                <optgroup label="BUS">
              <?php
                $sql = mysql_query("SELECT * FROM BUS WHERE type LIKE 'BUS' ");
                while($row = mysql_fetch_array($sql))
                {
                    echo "<option>".$row['busName']. "</option>";
                }
              ?>
          </optgroup>

               
       <optgroup label="MINI BUS">
                    <?php
                $sql = mysql_query("SELECT * FROM BUS WHERE type LIKE 'Mini Bus' ");
                while($row = mysql_fetch_array($sql))
                {
                    echo "<option>".$row['busName']. "</option>";
                }
              ?>
          </optgroup>
          			   
         <optgroup label="COACH">
                    <?php
                $sql = mysql_query("SELECT * FROM BUS WHERE type LIKE 'Coach' ");
                while($row = mysql_fetch_array($sql))
                {
                    echo "<option>".$row['busName']. "</option>";
                }
              ?>
          </optgroup>
                 
				
               
            </select>
        </div>
    </div>      
      
    
        <div class="form-group">
            <div class="col-xs-5 col-xs-offset-3">
                <button type = "submit" class = "btn btn-success">Generate</button>
            </div>
        </div>
</form>
	 
	 

	</div>

	

	
	
	
	
	

   
   
</body>
</html>

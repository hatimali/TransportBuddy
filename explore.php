<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "fastiandevloper";
    $dbname = "trasnsport buddy";
    $db = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db("transport buddy",$db);
?>
<?php
		   
    $bus_name = $_POST['select'];
    $query = "SELECT stop FROM bus_stops WHERE bName LIKE ".'\''.$bus_name.'\'';
    $sql = mysql_query($query);
    while($row = mysql_fetch_array($sql))
     {  
          $lon="SELECT * FROM `co-ordinates` WHERE location LIKE ".'\''.$row['stop'].'\'';
		  $chala=mysql_query($lon);
			while($inner=mysql_fetch_array($chala))
			{
 ?>
 
		<script>
				var data = <?php echo json_encode($inner['longt']." ".$inner['lat']); ?>; //Don't forget the extra semicolon!
				     
		</script>
	    <?php
		$sas = 5;
			}	   
	 }		
?>


<!DOCTYPE html>
<html lang="en">

<meta type="description" content="Find the distance between two places on the map and the shortest route."/>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true" 
        type="text/javascript"></script>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>


<script>
var myCenter=new google.maps.LatLng(24.850874,67.9120850);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:10,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("map_canvas"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });
marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>



	

<style>
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}

body{
background-image:url('back.jpg');
background-repeat:no-repeat;
background-size:cover;
}
</style>
    
  <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>






<body onload="initialize()">
<div align="right">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li> 
        <li><a href="#">Logout</a></li> 
      </ul></nav></div>
     


	<div class="col-sm-4 nopadding">
    <table class="table" style="width:150px;">
    <thead>
      <tr>
        <th>Stops</th>
      </tr>
    </thead>
    <tbody>
    <?php  
	
	  $Latitude=[];
	  $Longitude=[];
	  
	
      $flag = true;
      $bus_name = $_POST['select'];
      $query = "SELECT stop FROM bus_stops WHERE bName LIKE ".'\''.$bus_name.'\'';
      $sql = mysql_query($query);
        while($row = mysql_fetch_array($sql))
                {  
                        echo "<tr class=\"success\">";
                        echo "<td>". $row['stop']."</td>";
						
							}
							
							
						
                        echo "</tr>";
    ?>
        </tbody>
        </table>
        </div>
		
		
		
	<div class="col-sm-8 nopadding">
	<div id="map_canvas" style="width:80%; height:60%"></div>
	
	</div>
    </body>
</html>
<script>
    var longitudes = new Array();
    var latitudes = new Array();
</script>

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
                longitudes.push(<?php echo json_encode($inner['longt']);?>);
                latitudes.push(<?php echo json_encode($inner['lat']);?>);     
				
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
var latlang = new array();
for(var i =0 ;i<latitudes.length;i++)
{
		latlang[i] = new google.maps.LatLng(parseFloat(latitudes[i]),parseFloat(longitudes[i]));
}

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






<body onload="initMap()">
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
	<div id="floating-panel">
      <button id="drop" onclick="drop()">Drop Markers</button>
     </div>
    <div id="map"></div>
    <script>

// If you're adding a number of markers, you may want to drop them on the map
// consecutively rather than all at once. This example shows how to use
// window.setTimeout() to space your markers' animation.

var neighborhoods = [
  {lat: 52.511, lng: 13.447},
  {lat: 52.549, lng: 13.422},
  {lat: 52.497, lng: 13.396},
  {lat: 52.517, lng: 13.394}
];

var markers = [];
var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center:latlang[0];
  });
}

function drop() {
  clearMarkers();
  for (var i = 0; i < latlang.length; i++) {
    addMarkerWithTimeout(latlang[i], i * 200);
  }
}

function addMarkerWithTimeout(position, timeout) {
  window.setTimeout(function() {
    markers.push(new google.maps.Marker({
      position: position,
      map: map,
      animation: google.maps.Animation.DROP
    }));
  }, timeout);
}

function clearMarkers() {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
  markers = [];
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=&signed_in=true&callback=initMap"></script>
	</div>
    </body>
</html>
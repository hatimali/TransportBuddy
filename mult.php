<script>
    var longitudes = new Array();
    var latitudes = new Array();
	var latlang = new Array();
</script>




<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "fastiandevloper";
    $dbname = "trasnsport buddy";
    $db = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db("transport buddy",$db);
	
    $query = "SELECT stop FROM bus_stops ";
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
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker animations with <code>setTimeout()</code></title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

      #floating-panel {
        margin-left: -52px;
      }
    </style>
  </head>
  <body onload="initialize()">
    
    <div id="map">
	<button type="button" class="btn btn-primary" onclick="initialize()">Click</button>
	</div>
    <script>

// If you're adding a number of markers, you may want to drop them on the map
// consecutively rather than all at once. This example shows how to use
// window.setTimeout() to space your markers' animation.

var map = null;
function initialize() {

var lat=parseFloat(latitudes[0]);
var lon=parseFloat(longitudes[0]);
// initialize map center on first point
var latlng = new google.maps.LatLng(parseFloat(24.8600,67.0100);
var myOptions = {
    zoom: 10,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("map"), myOptions);
for (i = 0; i < latitudes.length; i++) {  
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(parseFloat(latitudes[i]), parseFloat(longitudes[i])),
      offset: '0',
      title: "Hello world",
      map: map
   });

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
        }
      })(marker, i));
   } 

   var marker1, n;
      for (n = 0; n < locationsb.length; n++) {  
         marker1 = new google.maps.Marker({
           position: new google.maps.LatLng(locationsb[n][1], locationsb[n][2]),
           offset: '0',
           icon: image2,
           title: locationsb[n][4],
           map: map       
        });


     google.maps.event.addListener(marker1, 'click', (function(marker1, n)
     {
       return function() {
          infowindow.setContent(locationsb[n][0]);
          infowindow.open(map, marker1);
       }
     })(marker1, n));
   }
}
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Lb--FggRT5MeSTUu2EEIcZ-UDVmRVS4&signed_in=true&callback=initMap"></script>
  </body>
</html>

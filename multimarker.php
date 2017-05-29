<script>
    var longitudes = new Array();
    var latitudes = new Array();
	
		  
	   
	

	
</script>

<?php

$var=5;
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
  <body>
    <div id="floating-panel">
      
     </div>
    <div id="map"></div>
	
	
		
    <script>
	
	
	
	jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});
	

// If you're adding a number of markers, you may want to drop them on the map
// consecutively rather than all at once. This example shows how to use
// window.setTimeout() to space your markers' animation.

function initMap() {
  var myLatLng = {lat: parseFloat(latitudes[0]), lng: parseFloat(longitudes[0])};
  var myLatLng2 = {lat: parseFloat(latitudes[1]), lng: parseFloat(longitudes[1])};
  
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: myLatLng
  });
  
/*
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
  
  */
  
  
  var markers=[
           ['London Eye, London', parseFloat(latitudes[0]),parseFloat(longitudes[0])],
           ['Palace of Westminster, London',parseFloat(latitudes[1]),parseFloat(longitudes[1])]
		
		]
  
  
  for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }
  var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
  
  
  
  
}
  








    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Lb--FggRT5MeSTUu2EEIcZ-UDVmRVS4&signed_in=true&callback=initMap"></script>
  </body>
</html>
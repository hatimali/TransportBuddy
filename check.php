<?php

$src=$_POST['source'];
$dst=$_POST['destination'];
?>



<script>

var Src=<?php echo json_encode($src);?>;
var Dst=<?php echo json_encode($dst);?>;


Src=Src+" "+"Karachi";
Dst=Dst+" "+"Karachi";

</script>



<script type="text/javascript"
  src=
"http://maps.googleapis.com/maps/api/js?key=AIzaSyB1tbIAqN0XqcgTR1- FxYoVTVq6Is6lD98&sensor=false">
</script>
<script type="text/javascript">

var location1;
	var location2;
	
	var address1;
	var address2;
	var latlng;
	var geocoder;
	var map;
	
	var distance;
	
	
	// finds the coordinates for the two locations and calls the showMap() function
	function initialize()
	{
		geocoder = new google.maps.Geocoder(); // creating a new geocode object
		
		// getting the two address values
		address1 ="Sadar karachi pakistan"
		address2 = "Clifton karachi pakistan";
		
	
		
		if (geocoder)
{
   geocoder.geocode( { 'address': address1}, function(results, status)
   {
      if (status == google.maps.GeocoderStatus.OK)
      {
         //location of first address (latitude + longitude)
         location1 = results[0].geometry.location;
		 
      } else
      {
         alert("Geocode was not successful for the following reason: " + status);
      }
   });
   geocoder.geocode( { 'address': address2}, function(results, status)
   {
      if (status == google.maps.GeocoderStatus.OK)
      {
         //location of second address (latitude + longitude)
         location2 = results[0].geometry.location;
         // calling the showMap() function to create and show the map
        
		 
      } else
      {
        alert("Geocode was not successful for the following reason: " + status);
      }
   });
		
		 var mapOptions = 
		{
			zoom: 20,
			center: address1,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};
		
		// create a new map object
			// set the div id where it will be shown
			// set the map options
		map = new google.maps.Map(document.getElementById("default"), mapOptions);
		
		// show route between the points
		directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer(
		{
			suppressMarkers: true,
			suppressInfoWindows: true
		});
		directionsDisplay.setMap(map);
		var request = {
			origin:address1, 
			destination:address2,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) 
		{
			if (status == google.maps.DirectionsStatus.OK) 
			{
				directionsDisplay.setDirections(response);
				
			}
		});
		
		// show a line between the two points
		var line = new google.maps.Polyline({
			map: map, 
			path: [location1, location2],
			strokeWeight: 7,
			strokeOpacity: 0.8,
			strokeColor: "#FFAA00"
		});
		
		// create the markers for the two locations		
		var marker1 = new google.maps.Marker({
			map: map, 
			position: location1,
			title: "First location"
		});
		var marker2 = new google.maps.Marker({
			map: map, 
			position: location2,
			title: "Second location"
		});
	
		
		
		
		
		
		
	}
		
		


google.maps.event.addDomListener(window, 'load', initialize);

</script>








	
	
	
	
	

<!DOCTYPE html>
<html lang="en">
<head>



<title>Travel By Bus</title>
<meta type="description" content="Find the distance between two places on the map and the shortest route."/>
<title>Travel By Bus</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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


html, body, #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
      }
</style>



</head>
<body>
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
        <li><a href="web/about.html">About</a></li>
        <li><a href="#">Contact</a></li> 

      </ul></nav></div>
	  

	
	<div div id="default" class = "col-xs-5 col-md-10 col-lg nopadding" style="width:100%; height:100%">
	
	</div>
	
	


</body>
    
</html>
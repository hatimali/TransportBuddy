
<script>
var loc1=" ";
var loc2=" ";
</script>

<?php
if(isset($_POST['subbut'])){
	$address1=$_POST['srcc'];
    $address2=$_POST['dstt'];
	?>
	<script>

 loc1=<?phpecho json_encode($address1);?>;
 loc2=<?phpecho json_encode($address2);?>;


</script>
<?php
}


?>



<!DOCTYPE html>
<html>
<head>
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
		
		showMap();
		
	}
		
	// creates and shows the map
	function showMap()
	{
		// center of the map (compute the mean value between the two locations)
		
		
		// set map options
			// set zoom level
			// set center
			// map type
		var mapOptions = 
		{
			zoom: 5,
			center: loc1,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};
		
		// create a new map object
			// set the div id where it will be shown
			// set the map options
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		
		// show route between the points
		directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer(
		{
			suppressMarkers: true,
			suppressInfoWindows: true
		});
		directionsDisplay.setMap(map);
		var request = {
			origin:loc1, 
			destination:loc2,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) 
		{
			if (status == google.maps.DirectionsStatus.OK) 
			{
				directionsDisplay.setDirections(response);
				distance = "The distance between the two points on the chosen route is: "+response.routes[0].legs[0].distance.text;
				distance += "<br/>The aproximative driving time is: "+response.routes[0].legs[0].duration.text;
				document.getElementById("distance").innerHTML = distance;
			}
		});
		
		// show a line between the two points
		var line = new google.maps.Polyline({
			map: map, 
			path: [loc1,loc2],
			strokeWeight: 7,
			strokeOpacity: 0.8,
			strokeColor: "#FFAA00"
		});
		
		// create the markers for the two locations		
		var marker1 = new google.maps.Marker({
			map: map, 
			position: loc1,
			title: "First location"
		});
		var marker2 = new google.maps.Marker({
			map: map, 
			position: loc2,
			title: "Second location"
		});
		
		
</script>
</head>
<body>

<div id="map">
</div>
<p id="distance"></p>






</body>
</html>
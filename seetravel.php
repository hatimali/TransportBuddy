
<script>
 var source" ";
 var destination=" ";

</script>



<?php



$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "fastiandevloper";
    $dbname = "trasnsport buddy";
    $db = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db("transport buddy",$db);

    
    if(isset($_POST['source']) && isset($_POST['destination']))
    {
        $s=$_POST['source'];
        $d=$_POST['destination'];
    }
	?>

<?php
if(isset($_POST["buses"]))
    {
       $myBus = $_POST["bus"];
       echo $myBus;
       $sql = mysql_query("SELECT stop FROM bus_stops where bName = '$myBus'");
       while($row = mysql_fetch_array($sql))
                {
                    echo $row['stop'];
                }
        
    }
?>
	<script>
	     source=<?php echo json_encode($s);?>;
		 destination=<?php echo json_encode($d);?>;
		 
		// source=source+" "+"Karachi";
        // destination=destination+" "+Karachi;
		 
		 
	</script>

<!DOCTYPE html>
<html lang="en">
<head>



<title>Travel By Bus</title>
<meta type="description" content="Find the distance between two places on the map and the shortest route."/>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
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
		address1 = source;
		address2 = destination;
		
		// finding out the coordinates
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
					showMap();
				} else 
				{
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
		
	// creates and shows the map
	function showMap()
	{
		// center of the map (compute the mean value between the two locations)
		latlng = new google.maps.LatLng((location1.lat()+location2.lat())/2,(location1.lng()+location2.lng())/2);
		
		// set map options
			// set zoom level
			// set center
			// map type
		var mapOptions = 
		{
			zoom: 5,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};
		
		// create a new map object
			// set the div id where it will be shown
			// set the map options
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		// show route between the points
		directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer(
		{
			suppressMarkers: true,
			suppressInfoWindows: true
		});
		directionsDisplay.setMap(map);
		var request = {
			origin:location1, 
			destination:location2,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) 
		{
			if (status == google.maps.DirectionsStatus.OK) 
			{
				directionsDisplay.setDirections(response);
				distance = "The distance between the two points on the chosen route is: "+response.routes[0].legs[0].distance.text;
				distance += "<br/>The aproximative driving time is: "+response.routes[0].legs[0].duration.text;
				document.getElementById("distance_road").innerHTML = distance;
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
		
		// create the text to be shown in the infowindows
		var text1 = '<div id="content">'+
				'<h1 id="firstHeading">First location</h1>'+
				'<div id="bodyContent">'+
				'<p>Coordinates: '+location1+'</p>'+
				'<p>Address: '+address1+'</p>'+
				'</div>'+
				'</div>';
				
		var text2 = '<div id="content">'+
			'<h1 id="firstHeading">Second location</h1>'+
			'<div id="bodyContent">'+
			'<p>Coordinates: '+location2+'</p>'+
			'<p>Address: '+address2+'</p>'+
			'</div>'+
			'</div>';
		
		// create info boxes for the two markers
		var infowindow1 = new google.maps.InfoWindow({
			content: text1
		});
		var infowindow2 = new google.maps.InfoWindow({
			content: text2
		});
		// add action events so the info windows will be shown when the marker is clicked
		google.maps.event.addListener(marker1, 'click', function() {
			infowindow1.open(map,marker1);
		});
		google.maps.event.addListener(marker2, 'click', function() {
			infowindow2.open(map,marker1);
		});
		
		// compute distance between the two points
		var R = 6371; 
		var dLat = toRad(location2.lat()-location1.lat());
		var dLon = toRad(location2.lng()-location1.lng()); 
		
		var dLat1 = toRad(location1.lat());
		var dLat2 = toRad(location2.lat());
		
		var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
				Math.cos(dLat1) * Math.cos(dLat1) * 
				Math.sin(dLon/2) * Math.sin(dLon/2); 
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
		var d = R * c;
		
		document.getElementById("distance_direct").innerHTML = "<br/>The distance between the two points (in a straight line) is: "+d;
	}
	
	function toRad(deg) 
	{
		return deg * Math.PI/180;
	}
</script>


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
background-image:url('new.jpg');
background-repeat:no-repeat;
background-size:cover;
}

#section1 
    
{
    padding-top:52px;
    

   
}
      
      
</style>
</head>
<body onload="initialize()">

    <nav class="navbar navbar-default navbar-fixed-top " role="navigation">
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

      </ul></nav>

     
<div id="section1">
	  <div class="col-sm-4 nopadding">
	    <div class = "container-fluid">
        
        
                        
 
     
    
    <form name = "select" class = "form-horizontal" role = "form" action="EX.php" method="post">
          <div class = "form-group">
		    <div class="col-sm-6">
        <select name="select" class="form-control">
                
			<option selected>Buses</option>	
              <?php
                $sql = mysql_query("SELECT DISTINCT B.bName FROM bus_stops B WHERE '$s' IN (SELECT C.stop FROM bus_stops C WHERE C.bName = B.bName )
           AND '$d' IN (SELECT D.stop FROM bus_stops D WHERE D.bName = B.bName )");
                while($row = mysql_fetch_array($sql))
                {
                    echo "<option>".$row['bName']. "</option>";
                }
                
              ?>
         </select>
                <button type ="submit" name = "buses" class = "btn btn-primary">SHOW</button>
              </div>
        </div>
        
    </form>
</div></div>


<div class="col-sm-8 nopadding">
	<div class = "container-fluid">
	
	<div id="map_canvas">
	
	</div>
	<center><div style="width:100%; height:10% ;color:#green" id="distance_direct"></div></center>
	<center><div style="width:100%; height:10%;color:#green" id="distance_road"></div></center>
	
	
	
	
	</div></div>
	


</body>
    
</html>
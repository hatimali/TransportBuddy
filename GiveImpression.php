
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script >
    var lanlat1 = null;
    var lanlat2 = null;
    </script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
      html, body {
        height: 85%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
          margin-top:30px;
      }
        body{
background-image:url('new.jpg');
background-repeat:no-repeat;
background-size:cover;
}

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1tbIAqN0XqcgTR1- FxYoVTVq6Is6lD98&signed_in=true"></script>
    <script>
// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.

var count = 0;
var flag = false;
var markers = [];     
var cities = [];
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var distanceTotal;
function initialize() {
   directionsDisplay = new google.maps.DirectionsRenderer();
  var bangalore = { lat: 24.83973, lng: 67.0656 };
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: bangalore
      
  });

    
  // This event listener calls addMarker() when the map is clicked.
  google.maps.event.addListener(map, 'click', function(event) {
    count++;
      if(count<3 )
    addMarker(event.latLng, map);
      else
          count--;
      calcRoute();
  });
    
  google.maps.event.addListener(map, 'rightclick', function(event) {
    
        
      count--;
      if(count>=0 )
      {
          markers.pop().setMap(null);
          cities.pop().setMap(null);
      }
      else
          count++;
  });
    
  
  // Add a marker at the center of the map.
  
}

// Adds a marker to the map.
function addMarker(location, map) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
      var marker = new google.maps.Marker({
        position: location,
        label: (count == 1) ? 'S' : 'D',
        map: map,
        animation:google.maps.Animation.DROP

        });    
        
        var myCity = new google.maps.Circle({
          center:marker.position,
          radius:100,
          strokeColor:"#FF0000",
          strokeOpacity:0.8,
          strokeWeight:2,
          fillColor:"#00FF00",
          fillOpacity:0.4
        });

        myCity.setMap(map);
        cities.push(myCity);
        markers.push(marker);
        if(count == 1)
        {
            lanlat1 = location;
        }
        else if (count == 2)
            {
                lanlat2 = location;
                       
            } 
}
        function calcRoute() {
        var start =markers[0].position;
        var end =markers[1].position;
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
            distanceTotal = response.routes[0].legs[0].distance.text;
            document.getElementById("dist").innerHTML = distanceTotal;
        });   
        }
        
        
        $(document).ready(initialize);
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
      
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
        <li><a href="web/about,html">About</a></li>
        <li><a href="#">Contact</a></li> 

      </ul></nav>
      
      
    <div id="map" ></div>
    <div class="panel panel-default" style = "margin-bottom : 0px">
        <div class="panel panel-default"><center><strong>RICKSHAW FARES</strong></center></div>
    <div >
        <h3><center>TELL US ABOUT THE FARES</center></h3>
    </div>
<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Shortest Distance</th>
                    <th>The initial demand</th>
                    <th>The final Bargain</th>    
                    <th>AVERAGE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id = "dist"></td>
                    <td ><input id = "max" input type = "text"></td>
                    <td ><input id = "min" input type = "text" onchange="Call()"></td>
                    <td id = "avg"></td>
                </tr>
            </tbody>
        </table>
    
    </div>
        
    </div>
      <center><button class = "btn btn-success" onclick="IntakeData()">SUBMIT</button></center>
    </body>  
    <script>
        function Call()
        {
             document.getElementById("avg").innerHTML = (parseInt(document.getElementById("max").value) + parseInt(document.getElementById("min").value))/2;
        }
        function IntakeData()
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);        
            }};
        xmlhttp.open("GET", "putintodb.php?dist=" + document.getElementById("dist").innerHTML+"&min="+document.getElementById("min").value+"&max="+document.getElementById("max").value+"&avg="+document.getElementById("avg").innerHTML,true);
        xmlhttp.send();
        
        }
    </script>
</html>
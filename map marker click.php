
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    function showHint(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("dist").innerHTML = str;
                document.getElementById("min").innerHTML = "Rs. " + xmlhttp.responseText.split(" ")[0];
                document.getElementById("max").innerHTML = "Rs. " + xmlhttp.responseText.split(" ")[2];
                document.getElementById("avg").innerHTML = "Rs. " + xmlhttp.responseText.split(" ")[1].substr(2,xmlhttp.responseText.split(" ")[1].length);;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    
}
</script>

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
    $( "#map" ).fadeIn( "slow", function() {
    // Animation complete   
  });
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
                //directionsDisplay.setDirections(response);
                //directionsDisplay.setMap(map);
                alert("if");
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
            distanceTotal = response.routes[0].legs[0].distance.text;
            showHint(distanceTotal);
            alert(distanceTotal);
        });   
        }
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map" ></div>
    <div class="panel panel-default">
        <div class="panel-heading"><center><strong>FARES</strong></center></div>
    <div class="panel-body">
        <p><center>FIND THE RICKSHAW FARES</center></p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Shortest Distance</th>
                    <th>Minimum Fare</th>
                    <th>Average Fare</th>
                    <th>Maximum Fare</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id = "dist"></td>
                    <td id = "min"></td>
                    <td id = "avg"></td>
                    <td id = "max"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
      
    </body>  
</html>
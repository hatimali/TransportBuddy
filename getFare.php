<!DOCTYPE html>
<html lang="en">
<head>
<style>


body{
background-image:url('back.jpg');
background-repeat:no-repeat;
background-size:cover;
}

.panel-body{
   background-image:url('back.jpg');
}


strong{
 color:gray;	
}


</style>
<title>Travel By riksaw</title>
  
  
  
</head>




<body onload="initmap">
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
        <li class="active"><a href="main.php">Home</a></li>
        <li><a href="web/about.html">About</a></li>
        <li><a href="#">Contact</a></li> 
      </ul></nav></div>
	  
	  <div class="col-sm-12 nopadding">
	  <div class='container-fluid>
	  <div id="map"></div>
        
        <!--our form-->
        <h2>Chosen Location</h2>
        <form method="post">
            <input type="text" id="lat" readonly="yes"><br>
            <input type="text" id="lng" readonly="yes">
        </form>
		
	  
	  
	  </div></div>
	  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
	
	 var lat=" ";
	 var long=" ";
	 
         function initmap() {
            var mapOptions = {
                center: new google.maps.LatLng(24.83973,67.0656),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
				 lat=e.latLng.lat();
				 long=e.latLng.long();
				 alert(lat);
				 alert(long);
				 document.getElementById("lat").value=lat;
				 document.getElementById("long").value=lat;
				 
				 
				
            });
			
			latlngset = new google.maps.LatLng(lat, long);

          var marker = new google.maps.Marker({  
          map: map, title: loan , position: latlngset  
        });
        map.setCenter(marker.getPosition())
        }
    </script>
</body>
</html>
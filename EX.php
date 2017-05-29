<script>
    var longitudes = new Array();
    var latitudes = new Array();
    var stops = new Array();
</script>

<?php
            $dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "fastiandevloper";
			$dbname = "transport buddy";
			$db = mysql_connect($dbhost,$dbuser,$dbpass);
            mysql_select_db("transport buddy",$db);

 $bus_name=$_POST['select'];
$query = "SELECT stop FROM bus_stops WHERE bName like '$bus_name' ";
    $sql = mysql_query($query);
    while($row = mysql_fetch_array($sql))
     {  
          $lon="SELECT * FROM `co-ordinates` WHERE location LIKE ".'\''.$row['stop'].'\'';
		  $chala=mysql_query($lon);
			while($inner=mysql_fetch_array($chala))
			{
 ?>
		<script>
                stops.push(<?php echo json_encode($inner['location']);?>);
                longitudes.push(Number(<?php echo json_encode($inner['longt']);?>));
                latitudes.push(Number(<?php echo json_encode($inner['lat']);?>));
                        			
		</script>
	    <?php
		$sas = 5;
			}	   
	 }		
?>


<html>
    <head>

        <title>Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.css" rel="stylesheet" media="screen">
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
 
    <style>
      #map-container { height: 250px }
    </style>
	
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

h1,h2{
	color:white;
}
        
#section1 
    
{
    padding-top:52px;
    margin-right:300px;

   
}
        
        
</style>
        
<style type="text/css">
  html { height: 100% }
 
  #map_canvas { height: 100% }
</style>
<script type="text/javascript"
  src=
"http://maps.googleapis.com/maps/api/js?key=AIzaSyB1tbIAqN0XqcgTR1- FxYoVTVq6Is6lD98&sensor=false">
</script>
<script type="text/javascript">

var locations = [
  ['loan 1', latitudes[3], longitudes[3], 'address 1'],
  ['loan 2', latitudes[4], longitudes[4], 'address 2'],
  ['loan 3', latitudes[5], longitudes[5], 'address 3'],
  ['loan 4', latitudes[6], longitudes[6], 'address 4'],
  ['loan 5', latitudes[7], longitudes[7],, 'address 5']
  ];

  function initialize() {

    
    var myOptions = {
      center: new google.maps.LatLng(latitudes[1],longitudes[1]),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    var map = new google.maps.Map(document.getElementById("default"),
        myOptions);

    setMarkers(map,locations)

  }
  
  
  


  function setMarkers(map,locations){

      var marker, i

for (i = 0; i < latitudes.length; i++)
 {  

 var loan = i+1;
 if(loan == 0)
     loan = "start";
 else if (loan == latitudes.length-1)
     loan = "end";
 var lat = latitudes[i];
 var long = longitudes[i];
 var add =  stops[i];

 latlngset = new google.maps.LatLng(lat, long);

  var marker = new google.maps.Marker({  
          map: map, title: loan , position: latlngset  
        });
        map.setCenter(marker.getPosition())


        var content = "Stop Number: " + loan +  '</h3>' + "Address: " + add     

  var infowindow = new google.maps.InfoWindow()

google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(content);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow)); 
	
	

  }
  directionsService = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer(
		{
			suppressMarkers: true,
			suppressInfoWindows: true
		});
		directionsDisplay.setMap(map);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		for(var i=0;i<latitudes.length-1;i++){
		// show a line between the two points
		var line = new google.maps.Polyline({
			map: map, 
			path: [new google.maps.LatLng(latitudes[i],longitudes[i]), new google.maps.LatLng(latitudes[i+1],longitudes[i+1])],
			strokeWeight: 5,
			strokeOpacity: 0.8,
			strokeColor: "#FF0000"
		});
		}
  
  

  
  }



  </script>
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
        <li><a href="web/about,html">About</a></li>
        <li><a href="#">Contact</a></li> 

      </ul></nav>

     
     
   <div id="section1">
    <div class="col-sm-3 nopadding"> 
     <div class = "container-fluid">
         <h2>BUS-STOP</h2>
        <div class = "row">
            <div class="col-xs-7 col-md-2 nopadding">
                <table class="table" style="width:150px;">
                    <thead>
                        <tr>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $flag = true;
                      $bus_name = $_POST['select'];
                      $query = "SELECT stop FROM bus_stops WHERE bName LIKE ".'\''.$bus_name.'\'';
                      $sql = mysql_query($query);
                      while($row = mysql_fetch_array($sql))
                        {  
                            if($flag)
                                echo "<tr class=\"success\">";
                            else
                                echo "<tr class=\"danger\">";
                          
                            echo "<td>". $row['stop']."</td>";
                            echo "<td>"."</td>";
                          $flag = !($flag);

                        }
                        echo "</tr>";
                    ?>
                        </tbody>
                        </table>
            </div></div></div></div></div>
						
                    <div class="col-sm-9 nopadding">
					<h1>Google Map showing All the routes</h1>
            <div id="default" class = "col-xs-5 col-md-10 col-lg nopadding" style="width:100%; height:100%"></div>
			<p id="distance_road"></p>
        </div>     
     </div>
 </body>
  </html>

 
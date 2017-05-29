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
			}	   
	 }		
?>

<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="dist/css/bootstrap-select.css">
   <link rel="stylesheet" href="dist/css/bootstrap-select.min.css">
    <link rel="text/script" href="dist/js/bootstrap-select.js">
      

    
<!--Source code -->
<!-- Style to put some height on the map -->
<style type="text/css">
    #map-canvas { height: 500px }; 
    
#section1 
    
{
    padding-top:52px;
    

   
}

    body{
background-image:url('new.jpg');
background-repeat:no-repeat;
background-size:cover;
}


</style>

<!-- Load the Google Maps aPI -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1tbIAqN0XqcgTR1- FxYoVTVq6Is6lD98&sensor=false"></script>

<!-- All of the script for multiple requests -->
<script type="text/javascript">

    // Initialise some variables
    var directionsService = new google.maps.DirectionsService();
    var num, map, data;
    var requestArray = [], renderArray = [];

       

    // Let's make an array of requests which will become individual polylines on the map.
    function generateRequests(){
            var start;
            var end;
            for(var i = 0; i<latitudes.length-1;i++)
            {
                    start = new google.maps.LatLng(latitudes[i],longitudes[i]);
                    end   = new google.maps.LatLng(latitudes[i+1],longitudes[i+1]);
            
            
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING
            };

            // and save it in our requestArray
            requestArray.push(request);
            }
        processRequests();
        
    }

    function processRequests(){

        // Counter to track request submission and process one at a time;
        var i = 0;
        // Used to submit the request 'i'
        function submitRequest(){
            directionsService.route(requestArray[i], directionResults);
        }

        // Used as callback for the above request for current 'i'
        function directionResults(result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                
                // Create a unique DirectionsRenderer 'i'
                renderArray[i] = new google.maps.DirectionsRenderer();
                renderArray[i].setMap(map);

                // Some unique options from the colorArray so we can see the routes
                renderArray[i].setOptions({
                    preserveViewport: true,
                    suppressInfoWindows: true,
                    polylineOptions: {
                        strokeWeight: 2,
                        strokeOpacity: 0.5,
                    },
                    markerOptions: {
                     icon : 'https://google-developers.appspot.com/maps/documentation/javascript/examples/full/images/beachflag.png'
                }
                });

                // Use this new renderer with the result
                renderArray[i].setDirections(result);
                // and start the next request
                nextRequest();
            }

        }

        function nextRequest(){
            // Increase the counter
            i++;
            // Make sure we are still waiting for a request
            if(i >= requestArray.length){
                // No more to do
                return;
            }
            // Submit another request
            submitRequest();
        }

        // This request is just to kick start the whole process
        submitRequest();
    }

    // Called Onload
    function init() {

        // Some basic map setup (from the API docs) 
        var mapOptions = {
            center: new google.maps.LatLng(24.895497, 66.923987),
            zoom: 11,
            mapTypeControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
            
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // Start the request making
        generateRequests()
    }

    // Get the ball rolling and trigger our init() on 'load'
    google.maps.event.addDomListener(window, 'load', init);
</script>
    </head>
<body>
<!-- Somewhere in the DOM for the map to be rendered -->
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
					
            <div id="map-canvas" class = "col-xs-5 col-md-10 col-lg nopadding" style="width:100%; height:100%"></div>
			<p id="distance_road"></p>
        </div>     
     </div>
 
</body>
</html>
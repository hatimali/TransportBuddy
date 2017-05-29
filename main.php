<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "fastiandevloper";
    $dbname = "trasnsport buddy";
    $db = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db("transport buddy",$db);
	if(isset($_POST['submit'])){
	 $NAME=$_POST['name'];
	 $EMAIL=$_POST['Email'];
	 $MOBILE=$_POST['phone'];
	
	 $quer="INSERT INTO user VALUES($MOBILE,'$NAME','$EMAIL')";
	 if(mysql_query($quer)){
		 echo"Sucess";   
	 }
	}
?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TransportBuddy</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">
	<link href="login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Lato","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: 700;
}

	
	strong{
	 color:gray;
	}
	
	body{
	  background-color:gray;
	}
	
	.container-fluid{
      padding: 0 !important;
       margin: 0 !important;
	}
	
	.carousel-caption{
		text-align:center;
	}
	</style>
	

</head>

<body>
   
   <div class="container-fluid">
   <nav class="navbar navbar-default navbar-fixed-top">
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
  <li class="dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Register</b> <span class="caret"></span></a>
	<ul id="login-dp" class="dropdown-menu">
	   <li>
		<div class="row">
		 <div class="col-md-12">
			<center><h3 style="color:gray;">Register Now</h3></center>
								
			 <form class="form" role="form" method="post" action="main.php">
				<div class="form-group">
				 <label for="exampleInputEmail2"><strong>Name</strong></label>
					<input type="text" class="form-control" name="name"  placeholder="Name">
						</div>
						<div class="form-group">
						 <label for="exampleInputEmail2"><strong>Email</strong></label>
							<input type="email" class="form-control" name="Email" id="exampleInputEmail2" placeholder="Email address" required>
							</div>
							<div class="form-group">
							<label class="" for="exampleInputPassword2"><strong>Mobile#</strong></label>
							<input type="password" class="form-control" name="phone" id="exampleInputPassword2" placeholder="Mobile Number" required>
							  </div>
								<div class="form-group">
								 <button type="submit" name="submit" class="btn btn-primary btn-block">Sign up</button>
								</div>
										
								 </form>
							</div>
							<div class="bottom text-center">
							<center><h3 style="color:gray;">MyTransportBuddy</h3></center>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      
      </ul></nav></div>
     

       

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide" data-interval="500" data-pause="hover">
        <!-- Indicators -->
        
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            
            <div class="item active">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('1.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Travel By Bus </h1>    
                      <h2>Search Buses route And Its Stop</h2>	
                         <br><br>		 
                    <a href = "TravelByBus.php" style = ><button type="button" class="btn btn-primary btn-lg"> Travel By Bus</button></a>
                <br><br></div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('auto-001.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Travel By Ricksaw </h1>    
                    <h2>Know the true fairs ,</br> Your Pockets would remain heavier</h2>	
           <br><br>		 
	<a href = "riksaw.php"> <button type="button" class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#demo">Travel By Ricksaw</button>
                </div>
				
            </div>
			
			<div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('3.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Travel By Cab </h1>    
         <h2>You are just a text away from your first web booked taxi drive</h2>
          <br><br>		 
	 <a href = "taxi.php"><button type="button" class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#demo" >Travel By Cab</button></a>
                </div>
				<br><br>
            </div>
			
			
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
    <div class="container">

        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>

</body>

</html>

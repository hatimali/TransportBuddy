<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "fastiandevloper";
    $dbname = "trasnsport buddy";
    $db = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db("transport buddy",$db);
	if(isset($_POST['cabsubmit']))
    {
                 $com=$_POST['Company'];
                 $no=$_POST['No'];
                 $minfare=$_POST['min'];
                 $maxfare=$_POST['max'];
                 $avg=($minfare+$maxfare)/2;
	       $quer="INSERT INTO cab VALUES('$no','$com',$maxfare,$minfare,$avg)";
           
	           if(mysql_query($quer))
                {
                      
	            }
	}
?>



<?php

   if(isset($_POST['dsubmit']))
    {
                 $name=$_POST['name'];
                 $NIC=$_POST['Nic'];
                 $Mobile=$_POST['Mobile Number'];
                 
	       $quer="INSERT INTO driver VALUES('$NIC','$Mobile','$name')";
           $q2="INSERT INTO driver_cab VALUES('we',$NIC')";
	           if(mysql_query($quer))
                {
                      mysql_query($q2);
	            }
	}
   
?>











<!DOCTYPE html>
<html lang="en">
<head>
<style>


body{
background-image:url('taxii.jpg');
background-repeat:no-repeat;
background-size:cover;
    
      position: relative; 
  
}
    
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
 color:white;	
}

#section1 
    
{
    padding-top:52px;
    margin-right:300px;

   
}

.panel-success > .panel-heading {
  background-color: red;
}
    
    .panel.panel-success{
    background-color: rgba(245, 245, 245, 0);
}
    
.panel-heading{
    border-top-radius:0px;
    border-bottom-radius:0px;
    
}
    
.check{
 background-color: rgba(245, 245, 245, 0);  
}
    

</style>
<title>Travel By Taxi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="sec.css">
    <link href="login.css" rel="stylesheet">
  
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top ">
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
          
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Driver Cab</a>
            <div class="dropdown-menu" style="padding:17px;">
              <form class="form" id="formLogin" action="taxi.php" method="post"> 
                <input name="Compnay" id="username" type="text" placeholder="CabCompnay"><br><br>
                <input name="No" id="password" type="text" placeholder="CabNumber"><br><br>
                 <input name="min" id="password" type="text" placeholder="MinFare"><br><br>
                  <input name="max" id="password" type="text" placeholder="MaxFare"><br><br>
                <button type="submit" id="btnLogin" name="cabsubmit" class="btn">Login</button>
              </form>
            </div>
          </li>

          
          
          
          
          
          
          <li class="dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Driver Register</b> <span class="caret"></span></a>
	<ul id="login-dp" class="dropdown-menu">
	   <li>
		<div class="row">
		 <div class="col-md-12">
			
								
			 <form class="form" role="form" method="post" action="taxi.php">
				<div class="form-group">
				 <label for="exampleInputEmail2"><strong>Name</strong></label>
					<input type="text" class="form-control" name="name"  placeholder="Name">
						</div>
						<div class="form-group">
						 <label for="exampleInputEmail2"><strong>CNIC#</strong></label>
							<input type="text" class="form-control" name="Nic" id="exampleInputEmail2" placeholder="Email address" required>
							</div>
							<div class="form-group">
							     <label class="" for="exampleInputPassword2"><strong>Mobile#</strong></label>
							     <input type="password" class="form-control" name="phone" id="exampleInputPassword2"                                                                  name="mobile"  aplaceholder="Mobile Number" required>
							  </div>
                 
                                   
                 
                 
								<div class="form-group">
								 <button type="submit" name="dsubmit" class="btn btn-primary btn-block">Sign up</button>
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
  
        

        </ul></div></div></nav>
    
    
    
    <div id="section1" class="container-fluid">
    <div class="col-sm-5">
        </div>
    
    
     
    
     
	
	
<div class="col-sm-6 nopadding">
    <div class = "panel panel-success">
   <div class = "panel-heading">
   <center>
      <h1 class = "panel-title">Taxi Specification</h1></center>
   </div>
   
   <div class = "panel-body">
      <center>
	  
	  <form class = "form-horizontal" role = "form" method="post" action="Application/index.php">
   
   
    <div class = "form-group">
      <label for = "firstname" class = "col-sm-2 control-label"><strong>NAME</strong></label>
		
      <div class = "col-sm-6">
         <input type = "text"  name="name" class = "form-control" id = "firstname" placeholder = "NAME">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "firstname" class = "col-sm-2 control-label"><strong>SOURCE</strong></label>
		
      <div class = "col-sm-6">
         <input type = "text"  name="source" class = "form-control" id = "firstname" placeholder = "Source">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "lastname" class = "col-sm-2 control-label"><strong>Destination</strong></label>
		
      <div class = "col-sm-6">
         <input type = "text"  name ="destination" class = "form-control" id = "lastname" placeholder = "Destination">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "lastname" class = "col-sm-2 control-label"><strong>Mobile#</strong></label>
		
      <div class = "col-sm-6">
         <input type = "text" name="mobile" class = "form-control" id = "lastname" placeholder = "Mobile Number">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "lastname"  class = "col-sm-2 control-label"><strong>Budget</strong></label>
		
      <div class = "col-sm-3">
         <input type = "text" name ="min" class = "form-control" id = "lastname" placeholder = "Minimum">
      </div>
	  <div class = "col-sm-3">
         <input type = "text" name ="max" class = "form-control" id = "lastname" placeholder = "Maximum">
      </div>
   </div>
   
          
          
<div class = "form-group">
      <label for = "lastname"  class = "col-sm-2 control-label"><strong>DateTime</strong></label>
		
      <div class = "col-sm-3">
         <input type = "text" name ="date" class = "form-control" id = "lastname" placeholder = "Date">
      </div>
	  <div class = "col-sm-3">
         <input type = "text" name ="time" class = "form-control" id = "lastname" placeholder = "Time">
      </div>
   </div>
             
          
          
          
          
   
   <div class = "form-group">
      <div class = "col-sm-offset-2 col-sm-10">
         <div class = "checkbox">
            <label><input type = "checkbox"><strong>Save MyLog</strong></label>
         </div>
      </div>
   </div>
   
   <div class = "form-group">
      <div class = "col-sm-offset-2 col-sm-10">
         <button type = "submit" name="submit" class = "btn btn-success"><strong>Send Request</strong></button>
      </div>
   </div>
	
</form>
          </div></div></div>
    

    
</div>

</div>

</body>
</html>
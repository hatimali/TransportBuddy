<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "fastiandevloper";
    $dbname = "trasnsport buddy";
    $db = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db("transport buddy",$db);
	
	 $var=" ";
	  $Name=$_POST['dname'];
	  $Dcnic=$_POST['dCNIC'];
	  $mobile=$_POST['Dphone'];
	  $cabNo=$_POST['cab'];
	  $CabCompany=$_POST['cabComp'];
	  $minFare=$_POST['min'];
	  $maxFare=$_POST['max'];
	  $avg=($minFare+$maxFare)/2;
	  $quer="INSERT INTO driver VALUES('$Dcnic','$mobile','$Name')";
	  $quer2="INSERT INTO cab VALUES('$cabNo','$CabCompany',$minFare,$maxFare,$avg)";
	  if(mysql_query($quer)){
		  echo"yes";
	  }
	   
	   
	  if(mysql_query($quer2)){
		  echo"yes2";
	  }
	
?>

<?php

$dist = $_REQUEST["dist"];
$dist = substr($dist,0,strpos($dist,'k')-1);
$min = $_REQUEST["min"];
$avg = $_REQUEST["avg"];
$max = $_REQUEST["max"];
echo $dist;
echo $min;
echo $avg;
echo $max;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "fastiandevloper";
$dbname = "trasnsport buddy";
$dist = (float)$dist;
$min = (int)$min;
$max = (int)$dist;
$avg = (float)$avg;
$db = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db("transport buddy",$db);
mysql_query("INSERT INTO `rikshaw_fares` VALUES($dist,$max,$min,$avg)");
?>


<?php

$q = $_REQUEST["q"];
echo $q;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "fastiandevloper";
$dbname = "trasnsport buddy";
$db = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db("transport buddy",$db);
$minfares = 0;
$maxfares = 0;
$avgfares = 0;

$sql = mysql_query("SELECT distance,maxf,minf,avgf FROM rikshaw_fares ");
while($row = mysql_fetch_array($sql))
    {
        $minfares += ($row['minf']/$row['distance']);    
        $maxfares += ($row['maxf']/$row['distance']);
        $avgfares += ($row['avgf']/$row['distance']);    
    }

echo "".($minfares*$q)." ".($maxfares*$q)." ".($avgfares*$q)."";
?>
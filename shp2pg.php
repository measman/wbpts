<?php

$srid_from = $_POST['from_srid'];
$srid_to = $_POST['to_srid'];
$shpFile = $_POST['filename'];
$path = $_POST['path'];


// $srid_from = "32645";
// $srid_to = "4326";
// $shpFile = "LMC_Metric_Road_Network_25092019";
// $path = "D:/xampp/htdocs/convert/abc/";


$command="shp2pgsql -s ".$srid_from.":".$srid_to." -I ".$path.$shpFile." ".$shpFile." |  psql \"dbname='routedb' user='postgres' password='postgres' host='localhost'\"";
//echo $command;
exec($command,$out, $ret);
print_r($ret);
// echo $command;

?>
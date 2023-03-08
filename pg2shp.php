<?php

$shpFile = $_POST['filename'];
// $path = $_POST['path'];


// $srid_from = "32645";
// $srid_to = "4326";
// $shpFile = "LMC_Metric_Road_Network_25092019";
$path = "D:/xampp/htdocs/wbpts/export/";

$command="pgsql2shp -f ".$path.$shpFile." -h localhost -u postgres -P postgres routedb public.".strtolower($shpFile);
//$command="shp2pgsql -s ".$srid_from.":".$srid_to." ".$path.$shpFile." ".$shpFile." |  psql \"dbname='routedb' user='postgres' password='postgres' host='localhost'\"";
//echo $command;
exec($command,$out, $ret);
print_r($ret);
// echo $command;

?>
<?php 

$serverName ="PC-IS-002";
$connectionInfo = array("Database"=>"db_usuarios", "UID"=>"sa", "PWD"=>"C0rporativ0@2016");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>
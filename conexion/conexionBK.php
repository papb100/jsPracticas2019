<?php

$bd_host = "sysacad.com.mx";
$bd_usuario = "sysacadc";
$bd_password = "D8I4oz3c1b";
$bd_base = "sysacadc_jsfinal";

$conexion = mysql_connect($bd_host,$bd_usuario,$bd_password) ;
mysql_select_db($bd_base,$conexion)or die (mysql_error());
?>
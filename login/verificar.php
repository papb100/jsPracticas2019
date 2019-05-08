<?php 

include "../conexion/conexion.php";

$usuario=$_POST['usuario'];
$contra=$_POST['contra'];

    mysql_query("SET NAMES utf8");
    $consulta = mysql_query("SELECT
                                usuarios.id_usuario,
                                usuarios.usuario,
                                usuarios.contra,
                                personas.nombre,
                                personas.ap_paterno,
                                personas.ap_materno,
                                CONCAT(personas.nombre,' ',personas.ap_paterno,' ',personas.ap_materno)as NomPersona
                            FROM
                                usuarios
                            INNER JOIN personas ON usuarios.id_persona = personas.id_persona
                            WHERE usuario='$usuario' AND contra='$contra'
                            AND personas.activo=1 AND usuarios.activo=1",$conexion)or die(mysql_error());

    $row=mysql_fetch_row($consulta);
    $contador=mysql_num_rows($consulta);
    $contador=($contador==1)?1:0;
    echo $contador;
?> 

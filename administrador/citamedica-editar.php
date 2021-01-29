<?php
require __DIR__ . "/configuracion.php";

$conexion = conexion();

if (count($_POST) > 0) {
    $id = get_post($conexion, "id");
    $especialidad = get_post($conexion, "especialidad");
    $fechaYhora = get_post($conexion, "datatime");
    $emergencia = get_post($conexion, "emergencia");
    $usuario = get_post($conexion, "usuario");
    
    $query = "UPDATE `cita` SET `especialidad` = '$especialidad', `datatime` = '$fechaYhora',
    `emergencia` = '$emergencia', `usuario` = '$usuario' WHERE `id` = $id";
    $result = $conexion->query($query);
     if ($result) {
         echo "exito";
     } else {
         echo "error";
    }
}
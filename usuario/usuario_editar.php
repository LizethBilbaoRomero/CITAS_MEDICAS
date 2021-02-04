<?php
require __DIR__ . "/configuracion.php";

$conexion = conexion();

if (count($_POST) > 0) {
    $id = get_post($conexion, "id");
    $escuela = get_post($conexion, "escuela");
    $nombres = get_post($conexion, "nombres");
    $apellidos = get_post($conexion, "apellidos");
    $codigo = get_post($conexion, "codigo");
    $correo = get_post($conexion, "correo");
    $usuario = get_post($conexion, "usuario");
    $password = get_post($conexion, "password");

    if ($password == "") {
        $query = "UPDATE `usuario` SET `escuela` = '$escuela', `nombres` = '$nombres',
        `apellidos` = '$apellidos', `codigo` = '$codigo', `correo` = '$correo', `usuario` = '$usuario'
         WHERE `id` = $id";
        $result = $conexion->query($query);
        if ($result) {
            echo "exito";
        } else {
            echo "error";
        }
    } else if ($password != "") {
        $password = md5($password);
        $query = "UPDATE `usuario` SET `escuela` = '$escuela', `nombres` = '$nombres',
        `apellidos` = '$apellidos', `codigo` = '$codigo', `correo` = '$correo', `usuario` = '$usuario',
         `password` = '$password' WHERE `id` = $id";
        $result = $conexion->query($query);
        if ($result) {
            echo "exito";
        } else {
            echo "error";
        }
    }
}
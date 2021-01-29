<?php

function session($name)
{
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    } else {
        return "";
    }
}

function conexion(){
    $conexion = new mysqli("localhost", "root", "", "tarea",3306);
    return $conexion;
}

function get_post($con, $var)
{
	return $con->real_escape_string($_POST[$var]);
}

function get_get($con, $var)
{
	return $con->real_escape_string($_GET[$var]);
}
<?php
$host = "localhost";
$dbname = "COMERCIO";
$usuario = "postgres";
$contrasena = "0.000";

$conexion = pg_connect("host=$host dbname=$dbname user=$usuario password=$contrasena");

if (!$conexion) {
    die("Error de conexión con PostgreSQL.");
}
?>

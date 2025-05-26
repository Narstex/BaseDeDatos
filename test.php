<?php
$host = "localhost";
$dbname = "NEGOCIO"; 
$usuario = "postgres";
$contrasena = "0.000"; 

$conexion = pg_connect("host=$host dbname=$dbname user=$usuario password=$contrasena");

if (!$conexion) {
    echo "<h2 style='color:red'>❌ Error de conexión con PostgreSQL</h2>";
} else {
    echo "<h2 style='color:green'>✅ ¡Conexión exitosa con PostgreSQL!</h2>";
}
?>

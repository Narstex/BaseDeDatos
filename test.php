<?php
$host = "localhost";
$dbname = "NEGOCIO"; // Asegúrate de que sea el nombre exacto de tu base
$usuario = "postgres";
$contrasena = "0.000"; // tu contraseña real

$conexion = pg_connect("host=$host dbname=$dbname user=$usuario password=$contrasena");

if (!$conexion) {
    echo "<h2 style='color:red'>❌ Error de conexión con PostgreSQL</h2>";
} else {
    echo "<h2 style='color:green'>✅ ¡Conexión exitosa con PostgreSQL!</h2>";
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

$desde = $_GET['desde'] ?? '';
$hasta = $_GET['hasta'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Auditoría de Cambios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Auditoría de Cambios</header>
<main>
    <h2>Filtrar por Fecha</h2>
    <form method="GET">
        <label>Desde: <input type="date" name="desde" value="<?= $desde ?>"></label>
        <label>Hasta: <input type="date" name="hasta" value="<?= $hasta ?>"></label>
        <input type="submit" value="Buscar" class="btn">
        <a href="index.php" class="btn">Volver</a>
    </form>

    <h2>Registros de Auditoría</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tabla</th>
                <th>Operación</th>
                <th>Usuario</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM auditoria_cambios";
            if ($desde && $hasta) {
                $sql .= " WHERE fecha_hora::date BETWEEN $1 AND $2 ORDER BY fecha_hora DESC";
                $params = [$desde, $hasta];
                $res = pg_query_params($conexion, $sql, $params);
            } else {
                $sql .= " ORDER BY fecha_hora DESC";
                $res = pg_query($conexion, $sql);
            }

            while ($row = pg_fetch_assoc($res)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['tabla_afectada']}</td>
                        <td>{$row['operacion']}</td>
                        <td>{$row['usuario_bd']}</td>
                        <td>{$row['fecha_hora']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>

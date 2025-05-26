<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Top 3 Vendedores con Menores Ventas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Reporte de Ventas Bajas</header>
<main>
    <h2>Top 3 Vendedores con las Ventas Más Bajas</h2>
    <a href="index.php" class="btn">Volver</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "
                SELECT v.cod_ven, v.nom_ven, v.ape_ven,
                       COALESCE(SUM(df.can_ven * df.pre_ven), 0) AS total_ventas
                FROM vendedor v
                LEFT JOIN factura f ON v.cod_ven = f.cod_ven
                LEFT JOIN detalle_factura df ON f.num_fac = df.num_fac
                GROUP BY v.cod_ven, v.nom_ven, v.ape_ven
                ORDER BY total_ventas ASC
                LIMIT 3
            ";
            $res = pg_query($conexion, $sql);
            while ($row = pg_fetch_assoc($res)) {
                echo "<tr>
                        <td>{$row['cod_ven']}</td>
                        <td>{$row['nom_ven']}</td>
                        <td>{$row['ape_ven']}</td>
                        <td>\${$row['total_ventas']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>

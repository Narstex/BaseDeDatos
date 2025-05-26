<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión de Vendedores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Panel de Gestión - PostgreSQL</header>
<main>
    <h2>Listado de Vendedores</h2>
    <a href="create.php" class="btn">Agregar Nuevo</a>
    <table>
        <thead>
            <tr>
                <th>Código</th><th>Nombre</th><th>Apellido</th><th>Sueldo</th>
                <th>Fecha Ingreso</th><th>Tipo</th><th>Distrito</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = pg_query($conexion, "SELECT * FROM vendedor");
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['cod_ven']}</td>
                    <td>{$row['nom_ven']}</td>
                    <td>{$row['ape_ven']}</td>
                    <td>{$row['sue_ven']}</td>
                    <td>{$row['fin_ven']}</td>
                    <td>{$row['tip_ven']}</td>
                    <td>{$row['cod_dis']}</td>
                    <td>
                        <a href='update.php?id={$row['cod_ven']}'>Editar</a> |
                        <a href='delete.php?id={$row['cod_ven']}'>Eliminar</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>

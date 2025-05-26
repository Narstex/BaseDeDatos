<?php include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO vendedor (cod_ven, nom_ven, ape_ven, sue_ven, fin_ven, tip_ven, cod_dis)
            VALUES ($1, $2, $3, $4, $5, $6, $7)";
    $params = [
        $_POST['cod'], $_POST['nom'], $_POST['ape'],
        $_POST['sue'], $_POST['fin'], $_POST['tip'], $_POST['dis']
    ];
    pg_query_params($conexion, $sql, $params);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Vendedor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Agregar Nuevo Vendedor</header>
<main>
    <form method="POST">
        <input type="text" name="cod" placeholder="Código" required>
        <input type="text" name="nom" placeholder="Nombre" required>
        <input type="text" name="ape" placeholder="Apellido" required>
        <input type="number" step="0.01" name="sue" placeholder="Sueldo" required>
        <input type="date" name="fin" required>
        <input type="text" name="tip" placeholder="Tipo" required>
        <input type="text" name="dis" placeholder="Distrito" required>
        <input type="submit" value="Guardar" class="btn">
    </form>
</main>
</body>
</html>

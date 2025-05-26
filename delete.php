<?php include 'db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    pg_query_params($conexion, "DELETE FROM vendedor WHERE cod_ven=$1", [$id]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Vendedor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Eliminar Vendedor</header>
<main>
    <p>¿Estás seguro de que deseas eliminar este vendedor?</p>
    <form method="POST">
        <input type="submit" value="Eliminar" class="btn">
        <a href="index.php" class="btn">Cancelar</a>
    </form>
</main>
</body>
</html>

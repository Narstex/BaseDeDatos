<?php include 'db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE vendedor SET nom_ven=$1, ape_ven=$2, sue_ven=$3, fin_ven=$4, tip_ven=$5, cod_dis=$6 WHERE cod_ven=$7";
    $params = [
        $_POST['nom'], $_POST['ape'], $_POST['sue'],
        $_POST['fin'], $_POST['tip'], $_POST['dis'], $_POST['cod']
    ];
    pg_query_params($conexion, $sql, $params);
    header("Location: index.php");
}

$data = pg_fetch_assoc(pg_query_params($conexion, "SELECT * FROM vendedor WHERE cod_ven=$1", [$id]));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Vendedor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Editar Vendedor</header>
<main>
    <form method="POST">
        <input type="hidden" name="cod" value="<?= $data['cod_ven'] ?>">
        <input type="text" name="nom" value="<?= $data['nom_ven'] ?>" required>
        <input type="text" name="ape" value="<?= $data['ape_ven'] ?>" required>
        <input type="number" step="0.01" name="sue" value="<?= $data['sue_ven'] ?>" required>
        <input type="date" name="fin" value="<?= $data['fin_ven'] ?>" required>
        <input type="text" name="tip" value="<?= $data['tip_ven'] ?>" required>
        <input type="text" name="dis" value="<?= $data['cod_dis'] ?>" required>
        <input type="submit" value="Actualizar" class="btn">
    </form>
</main>
</body>
</html>

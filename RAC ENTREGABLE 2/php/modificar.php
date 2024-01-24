<?php
$hostDB = '127.0.0.1';
$nombreDB = 'rac';
$usuarioDB = 'root';
$contrasenyaDB = 'Lucas6093';
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
$comentario = isset($_REQUEST['comentario']) ? $_REQUEST['comentario'] : null;
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $miUpdate = $miPDO->prepare('UPDATE rac SET usuario = :usuario, contrasena = :contrasena, comentario = :comentario WHERE codigo = :codigo');
    $miUpdate->execute(
        [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'contrasena' => $contrasena,
            'comentario' => $comentario
        ]
    );
    header('Location: leer.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM rac WHERE codigo = ?;');
    $miConsulta->execute([ $codigo]);
}
$rac = $miConsulta->fetch();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" name="usuario" value="<?= $rac['usuario'] ?>">
        </p>
        <p>
            <label for="contrasena">Contraseña</label>
            <input id="contrasena" type="text" name="contrasena" value="<?= $rac['contrasena'] ?>">
        </p>
        <p>
            <label for="comentario">Comentario</label>
            <input id="comentario" type="text" name="comentario" value="<?= $rac['comentario'] ?>">
        </p>
        <p>
            <input type="hidden" name="codigo" value="<?= $codigo ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>

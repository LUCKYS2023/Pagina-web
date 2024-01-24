<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
    $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
    $comentario = isset($_REQUEST['comentario']) ? $_REQUEST['comentario'] : null;
    $hostDB = '127.0.0.1';
    $nombreDB = 'rac';
    $usuarioDB = 'root';
    $contrasenyaDB = 'Lucas6093';
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    $miInsert = $miPDO->prepare('INSERT INTO rac (usuario, contrasena, comentario) VALUES (:usuario, :contrasena, :comentario)');
    $miInsert->execute(
        array(
            'usuario' => $usuario,
            'contrasena' => $contrasena,
            'comentario'=> $comentario
        )
    );
    header('Location: leer.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
</head>
<body>
    <form action="" method="post">
        <p>
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" name="usuario">
        </p>
        <p>
            <label for="contrasena">Contraseña</label>
            <input id="contrasena" type="text" name="contrasena">
        </p>
        <p>
            <label for="comentario">Comentario</label>
            <input id="comentario" type="text" name="comentario">
        </p>
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>
</body>
</html>

</form>

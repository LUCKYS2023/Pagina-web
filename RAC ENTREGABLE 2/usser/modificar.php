<?php
$hostDB = '127.0.0.1';
$nombreDB = 'usser';
$usuarioDB = 'root';
$contrasenyaDB = 'Lucas6093';
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$mensaje = isset($_REQUEST['mensaje']) ? $_REQUEST['mensaje'] : null;
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $miUpdate = $miPDO->prepare('UPDATE usser SET usuario = :usuario, contrasena = :contrasena, email = :email, mensaje = :mensaje WHERE codigo = :codigo');
    $miUpdate->execute(
        [
            'usuario' => $usuario,
            'contrasena' => $contrasena,
            'email' => $email,
            'mensaje' => $mensaje,
        ]
    );
    header('Location: leer.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM usser WHERE codigo = ?;');
    $miConsulta->execute([ $codigo]);
}
$coche = $miConsulta->fetch();

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
            <label for="usuario">Modelo</label>
            <input id="usuario" type="text" name="usuario" value="<?= $usser['usuario'] ?>">
        </p>
        <p>
            <label for="contrasena">Contraseña</label>
            <input id="contrasena" type="text" name="contrasena" value="<?= $usser['contrasena'] ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="<?= $usser['email'] ?>">
        </p> 
        <p>
            <label for="mensaje">Mensaje</label>
            <input id="mensaje" type="text" name="mensaje" value="<?= $usser['mensaje'] ?>">
        </p>
        <p>
            <input type="hidden" name="codigo" value="<?= $codigo ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>

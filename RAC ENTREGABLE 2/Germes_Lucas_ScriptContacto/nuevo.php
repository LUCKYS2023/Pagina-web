<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
    $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $mensaje = isset($_REQUEST['mensaje']) ? $_REQUEST['mensaje'] : null;
    $hostDB = '127.0.0.1';
    $nombreDB = 'usser';
    $usuarioDB = 'root';
    $contrasenyaDB = 'Lucas6093';
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    $miInsert = $miPDO->prepare('INSERT INTO usser (usuario, contrasena, email, mensaje) VALUES (:usuario, :contrasena, :email, :mensaje)');
    $miInsert->execute(
        array(
            'usuario' => $usuario,
            'contrasena' => $contrasena,
            'email'=> $email,
            'mensaje' => $mensaje,
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
            <label for="contrasena">ContraseÑa</label>
            <input id="contrasena" type="text" name="contrasena">
        </p>
        <p>
            <label for="email">Email</label>
            <input id="email" type="text" name="email">
        </p>
        <p>
            <label for="mensaje">Mensaje</label>
            <input id="mensaje" type="text" name="mensaje">
        </p>
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>
</body>
</html>

</form>

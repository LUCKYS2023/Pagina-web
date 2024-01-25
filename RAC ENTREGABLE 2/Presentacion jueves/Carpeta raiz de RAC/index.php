<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
    $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
    $comentario = isset($_REQUEST['comentario']) ? $_REQUEST['comentario'] : null;
    $hostDB = '127.0.0.1';
    $nombreDB = 'rac';
    $usuarioDB = 'root';
    $contrasenyaDB = 'Lucas6093';
    $conexion = mysqli_connect($hostDB, $usuarioDB, $contrasenyaDB, $nombreDB);
    if (mysqli_connect_error()) {
        die("Datos introducidos incorrectos " . mysqli_connect_error());
    }
    
    if (!isset($_POST['usuario'], $_POST['contrasena'])) 
    {
        header('Location: index.php');
    }
    if ($stmt = $conexion->prepare('SELECT codigo,contrasena FROM rac WHERE usuario = ?')) {
        $stmt->bind_param('s', $_POST['usuario']);
        $stmt->execute();
    }
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($codigo, $contrasena);
        $stmt->fetch();
    
    if ($_POST['contrasena'] === $contrasena) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['usuario'];
        $_SESSION['codigo'] = $codigo;
        header('Location: index2.html');
    }
    } else {
        header('Location: index.php');
}   

$stmt->close();
$conexion->close();
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
            <input type="submit" value="Guardar">
        </p>
    </form>
</body>
</html>

</form>

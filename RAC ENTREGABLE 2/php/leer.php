<?php
$hostDB = '127.0.0.1';
$nombreDB = 'rac';
$usuarioDB = 'root';
$contrasenyaDB = 'Lucas6093';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$miConsulta = $miPDO->prepare('SELECT * FROM rac;');
$miConsulta->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer - CRUD PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid orange;
            text-align: center;
            padding: 1.3rem;
        }
        .button {
            border-radius: .5rem;
            color: white;
            background-color: blueviolet;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p><a class="button" href="nuevo.php">Crear</a></p>
    <table>
        <tr>
            <th>Código</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Comentario</th>
            <td></td>
            <td></td>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['codigo']; ?></td>
           <td><?= $valor['usuario']; ?></td>
           <td><?= $valor['contrasena']; ?></td>
           <td><?= $valor['comentario']; ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>

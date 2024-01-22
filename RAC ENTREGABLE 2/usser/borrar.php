
<?php
$hostDB = '127.0.0.1';
$nombreDB = 'usser';
$usuarioDB = 'root';
$contrasenyaDB = 'Lucas6093';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
$miConsulta = $miPDO->prepare('DELETE FROM usser WHERE codigo = ?');
$miConsulta->execute([ $codigo]);
header('Location: leer.php');
?>
<?php
// reiniciarVotos.php

// Datos de conexión
//$conexion = new mysqli("localhost", "root", "", "hamburguerquiz");
$conexion = new mysqli("sql309.infinityfree.com:3306", "if0_40434472", "M0moH1r4i", "if0_40434472_hamburguerquiz");


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar todos los votos
$sql = "TRUNCATE TABLE votacion";  
$conexion->query($sql);

$conexion->close();

// Volver al gráfico
header("Location: /hamburguerquiz/graficos.html");
exit();
?>

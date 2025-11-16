<?php
// votar.php
// Datos de conexión
//$conexion = new mysqli("localhost", "root", "", "hamburguerquiz");
$conexion = new mysqli("sql309.infinityfree.com:3306", "if0_40434472", "M0moH1r4i", "if0_40434472_hamburguerquiz");


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET["combo"])) {
    $combo = intval($_GET["combo"]);

    // Insertar voto
    $sql = "INSERT INTO votacion (Combos_idCombos) VALUES ($combo)";
    $conexion->query($sql);
}

$conexion->close();

// Redirigir al gráfico
header("Location: /hamburguerquiz/graficos.html");
exit();
?>

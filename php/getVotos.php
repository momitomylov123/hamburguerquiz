<?php
header("Content-Type: application/json");

// Datos de conexión
//$conexion = new mysqli("localhost", "root", "", "hamburguerquiz");
$conexion = new mysqli("sql309.infinityfree.com:3306", "if0_40434472", "M0moH1r4i", "if0_40434472_hamburguerquiz");

if ($conexion->connect_error) {
    die(json_encode(["error" => "Error de conexión"]));
}

// Consulta para contar votos por combo
$sql = "SELECT Combos_idCombos AS combo, COUNT(*) AS votos 
        FROM votacion 
        GROUP BY Combos_idCombos";

$resultado = $conexion->query($sql);

$datos = array_fill(1, 6, 0); // 6 combos → IDs del 1 al 6

while ($fila = $resultado->fetch_assoc()) {
    $combo = intval($fila["combo"]);
    $votos = intval($fila["votos"]);
    if ($combo >= 1 && $combo <= 6) {
        $datos[$combo] = $votos;
    }
}

echo json_encode(array_values($datos)); // devuelve un array tipo [5,2,7,1,0,4]

$conexion->close();

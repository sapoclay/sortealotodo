<?php
include_once("conexion/db-connect.php"); // Conexión a la BD
$db = new Database(); // Crea una instancia de la clase Database
// Seleccionamos uno de los resultados de la tabla winners
$stmt = $db->conn->prepare("SELECT * FROM `winners` ORDER BY abs(`draw`) DESC LIMIT 1"); // Prepara la sentencia para seleccionarlo todo de la tabla winners
$stmt->execute(); // Ejecuta la sentencia
$result = $stmt->get_result(); // Guardamos el resultado en $result
$draw = 1;

// Comprueba si el numero de filas obtenido en el resultado es mayor a 0
if ($result->num_rows) {
    $row = $result->fetch_assoc();
    $draw = $row['draw'] + 1;
}
$stmt->close(); // Se cierra la sentencia

include 'includes/ordinal.php';

// Escribimos el número de premio sorteado
$draw_text = (ordinal($draw)) . " Sorteo";
$db->close(); //cierra la conexion
?>
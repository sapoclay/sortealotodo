<?php
session_start(); //inicia sesión PHP
require_once('conexion/db-connect.php'); //Aqui se debe incluir el archivo de la clase Database
$db = new Database(); // Crea una instancia de la clase Database

if ($_SERVER['REQUEST_METHOD'] == "POST") { // Verifica si el método de la petición es POST
    
    $id = $_POST['id']; // Obtiene el ID del ticket a eliminar
    
    // Eliminamos el ticket con el id recibido
    $stmt = $db->conn->prepare("DELETE FROM `tickets` where id = ?"); // Prepara una sentencia SQL para eliminar un registro de la tabla "tickets"
    $stmt->bind_param("i", $id); // Vincula el parámetro "i" a la variable $id,
    $delete = $stmt->execute(); // Ejecuta la sentencia preparada y almacena el resultado en la variable $delete.

    // Verifica si la consulta se ejecutó correctamente,
    if ($delete) {
        $response['status'] = 'success';
        $_SESSION['success_msg'] = "Ticket eliminado correctamente";
    } else {
        $response['error'] = 'Error: ' . $db->conn->error;
    }

    $stmt->close(); // Cierra la sentencia preparada
    $db->close(); //cierra la conexion

    echo json_encode($response); // Devuelve la respuesta en formato json
}else{
    echo "No se han enviado datos";
}





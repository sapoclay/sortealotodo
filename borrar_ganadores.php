<?php
require_once('conexion/db-connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new Database();
    // Eliminamos todos los ganadores
    $stmt = $db->conn->prepare("DELETE FROM `winners`");
    $stmt->execute();
    
    if($stmt->affected_rows > 0){
        $response['status'] = 'success';
    }else{
        $response['error'] = 'Error: ' . $db->conn->error;
    }
    // Devolvemos el ID autoincrement a 1
    $stmt = $db->conn->prepare("ALTER TABLE winners AUTO_INCREMENT = 1");
    $stmt->execute();
    
    $stmt->close();
    $db->close();
   
    echo json_encode($response); // Devuelve la respuesta en formato json
    
}else{
    echo "No se han enviado datos";
}

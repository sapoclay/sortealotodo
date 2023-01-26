<?php
require_once("conexion/db-connect.php");
$db = new Database(); //crea una instancia de la clase Database

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ticket_id = $_POST['ticket_id'];
    $draw = $_POST['draw'];
    // Guardamos en la tabla winners el ticket_id y el número de sorteo
    $stmt = $db->conn->prepare("INSERT INTO `winners` (`ticket_id`, `draw`) VALUES (?, ?)");
    $stmt->bind_param("is", $ticket_id, $draw);

    if($stmt->execute()){
        $response['status'] = 'success';
    }else{
        $response['error'] = 'Error: '. $stmt->error;
    }
    $stmt->close();
    $db->close();
    echo json_encode($response);

}else{
    $response['error'] = 'Error: No se han enviado datos.';
}

?>
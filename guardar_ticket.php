<?php 
session_start();
require_once('conexion/db-connect.php');
$db = new Database(); //crea una instancia de la clase Database

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // ddslashes() agrega barras diagonales invertidas "" delante de los caracteres que tienen un significado especial en una consulta SQL
    $code = addslashes($_POST['code']);
    $name = addslashes($_POST['name']);
    $id= $_POST['id'];
    
    if(!empty($id)){
        $stmt = $db->conn->prepare("SELECT id FROM `tickets` where `code` = ? and `id` != ?");
        $stmt->bind_param("si", $code, $id);
        $stmt->execute();
        // Se guarda el resultado de la ejecución de la sentencia en la variable "$check"
        $check = $stmt->get_result();
        $stmt = $db->conn->prepare("UPDATE `tickets` set `code` = ?, `name` = ? where `id` = ?");
        $stmt->bind_param("ssi", $code, $name, $id);
        $stmt->execute();
    }else{
        $stmt = $db->conn->prepare("SELECT id FROM `tickets` where `code` = ?");
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $check = $stmt->get_result();
        $stmt = $db->conn->prepare("INSERT INTO `tickets` (`code`, `name`) VALUES (?, ?)");
        $stmt->bind_param("ss", $code, $name);
        $stmt->execute();
    }

    if($check->num_rows > 0){
        $response['status'] = 'failed';
        $response['error'] = 'El número de Ticket ya existe';
    }else{
        if($stmt->affected_rows){
            $response['status'] = 'success';
            if(empty($id))
                $_SESSION['success_msg'] = "Nuevo Ticket añadido correctamente.";
            else
                $_SESSION['success_msg'] = "Ticket actualizado correctamente.";
        }else{
            $response['status'] = 'failed';
            $response['error'] = 'Al no producirse cambios en el ticket, no se ha guardado.';
        }
    }
    $stmt->close();
    $db->close();
    
    echo json_encode($response);
}

?>
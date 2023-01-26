<?php 
require_once('conexion/db-connect.php');
$db = new Database(); // Se crea una instancia de la clase Database

if($_SERVER['REQUEST_METHOD'] == 'POST'){ // se comprueba si el método utilizado para acceder a la página es "POST" 
    $id = $_POST['id'];
    // Seleccionamos todos los tickets con el id que se recibe
    $stmt = $db->conn->prepare("SELECT * FROM `tickets` where `id` = ?");
    $stmt->bind_param("i", $id); // Se enlaza el valor de la variable "$id" con la sentencia preparada
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){ // Se comprueba si el numero de filas obtenido en el resultado es mayor a 0
         // Si la comprobación es verdadera se establece una respuesta con el estado 'success' y se asigna a la variable "data" el resultado obtenido
        $response['status'] = 'success';
        $response['data'] = $result->fetch_assoc();
    }else{
        // Si la comprobación es falsa se establece una respuesta con un mensaje de error.
        $response['error'] = "Error. Sin datos que devolver."; 
    }
    
    $stmt->close(); // Se cierra la sentencia preparada
    $db->close(); // Se cierra la conexión

    echo json_encode($response); // Se convierte la respuesta en un formato json y se muestra en pantalla

}else{
    $response['error'] = "No se han enviado datos";
}


?>
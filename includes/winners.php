<?php include_once("conexion/db-connect.php");
$db = new Database();
// Selecciona todas las columnas (indicado por "*") de la tabla "tickets" (alias "t") y de la tabla "winners" (alias "w") y combina 
// los resultados mediante una INNER JOIN en la columna "ticket_id" de la tabla "winners" con la columna "id" de la tabla "tickets". 
// La sentencia también está ordenando los resultados por el valor absoluto de la columna "draw" en orden ascendente (ASC).
$stmt = $db->conn->prepare("SELECT t.*, w.draw FROM `winners` w INNER JOIN `tickets` t ON w.ticket_id = t.id ORDER BY ABS(w.`draw`) ASC");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) :
    $i = 1;
    while ($row = $result->fetch_assoc()) :
?>
        <tr>
            <th class="text-center"><?= ordinal($row['draw']) ?></th>
            <td><?= $row['code'] ?></td>
            <td><?= $row['name'] ?></td>
        </tr>
    <?php endwhile; ?>
<?php else :
endif;
$stmt->close();
$db->close();
?>
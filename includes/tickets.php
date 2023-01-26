<?php
include_once("conexion/db-connect.php"); 
$db = new Database();

 // Buscamos todos los resultados de la tabla tickets y los ordenamos por nombre
 $qry = $db->conn->query("SELECT * FROM `tickets` order by `name` asc");
 if ($qry->num_rows > 0) :
     $i = 1;
     while ($row = $qry->fetch_assoc()) :
 ?>
         <tr>
             <th class="text-center"><?= $i++ ?>º</th>
             <td><?= $row['code'] ?></td>
             <td><?= $row['name'] ?></td>
             <td class="text-center">
                 <div class="btn-group btn-group-sm">
                     <button class="btn btn-outline-danger rounded-0 btn-sm edit_ticket" data-id="<?= $row['id'] ?>" type="button"><i class="fa-solid fa-edit"></i></button>
                     <button class="btn btn-outline-danger rounded-0 btn-sm delete_ticket" data-id="<?= $row['id'] ?>" type="button"><i class="fa-solid fa-trash"></i></button>
                 </div>
             </td>
         </tr>
     <?php endwhile; ?>
 <?php else : ?>
 <?php endif; 
 $qry->close();
 $db->close(); 
?>
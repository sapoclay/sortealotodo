<div id="ticket-list" class="d-flex overflow-hidden">
            <?php
            $highlight = false;
            $where = "";
            // Si include_wineers no se envía, en el where buscamos un id que no esté en la tabla winners
            if (!isset($_GET['include_winners'])) {
                $where = "where id not in (SELECT ticket_id FROM `winners`)";
            }
            $db = new Database(); //crea una instancia de la clase Database
            $stmt = $db->conn->prepare("SELECT * FROM `tickets` {$where} order by `name` asc");
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) :
            ?>
                    <div class="col-auto ticket-item <?= (!$highlight) ? 'highlight-item' : '' ?>" data-id="<?= $row['id'] ?>">
                        <div class="card rounded-0 mx-2">
                            <div class="card-body">
                                <div class="container-fluid item-details">                                   
                                    <h2 class="text-center item-name"><?= $row['name'] ?></h2>
                                    <h3 class="text-muted text-center item-code"><?= $row['code'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $highlight = true; ?>
                <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
        <hr>
        <div class="d-flex w-100 justify-content-between align-items-end">
            <div class="col-auto">
                <!-- mostramos el número de jugadores resultantes, según esté o no marcado include_winners -->
                <div class="text-light">JUGADORES = <b><?= number_format($result->num_rows) ?></b></div>
                <div class="form-check form-switch"> <!-- Check include winners -->
                    <input class="form-check-input" type="checkbox" role="switch" id="exclude_winners" <?= (!isset($_GET['include_winners'])) ? "checked" : "" ?>>
                    <label class="form-check-label text-muted" for="exclude_winners">Excluir Ganadores Anteriores Del Sorteo</label>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-lg btn-danger rounded-pill col-lg-4 col-md-6 col-sm-8 col-xs-10" type="button" id="draw">Jugar</button>
        </div>
    </div>
</div>
<?php 
$stmt->close();
$db->close(); ?>
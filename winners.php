<?php
include 'includes/ordinal.php';
?>
<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
    <h2 class="text-light pt-5 pb-2  text-center titulo">Premios</h2>
    <hr>

    <div class="card rounded-0">
        <div class="card-header rounded-0">
            <div class="d-flex justify-content-between align-items-end">
                <div class="col-auto flex-shrink-1 flex-grow-1">
                    <div class="card-title"><b>Lista de Ganadores</b></div>
                </div>
                <div class="col-auto">
                </div>
            </div>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <colgroup>
                            <col width="20%">
                            <col width="30%">
                            <col width="50%">
                        </colgroup>
                        <thead>
                            <tr class="bg-danger bg-gradient">
                                <th class="text-center">Premios</th>
                                <th class="text-center">Número</th>
                                <th class="text-center">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'includes/winners.php';
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <button id="delete-all-winners"><i class="fa-solid fa-trash"></i> Eliminar todos los registros</button>
        </div>
    </div>
</div>
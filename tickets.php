<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto">
    <h2 class="text-light pt-5 pb-2 text-center titulo">Añadir Tickets Nuevos Jugadores</h2>
    <hr>

    <div class="card rounded-0">
        <div class="card-header rounded-0">
            <div class="d-flex justify-content-between align-items-end">
                <div class="col-auto flex-shrink-1 flex-grow-1">
                    <div class="card-title"><b>Lista de Tickets</b></div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-danger rounded-0" id="new_ticket"><i class="fa-solid fa-plus-square"></i> Añadir Ticket</button>
                </div>
            </div>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <div class="alert alert-success rounded-0"><?= $_SESSION['success_msg'] ?></div>
                    <?php unset($_SESSION['success_msg']); ?>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <colgroup>
                            <col width="10%">
                            <col width="20%">
                            <col width="60%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr class="bg-warning bg-gradient">
                                <th class="text-center">Jugador</th>
                                <th class="text-center">Código</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'includes/tickets.php'
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade rounded-0" id="ticketModal" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h1 class="modal-title fs-5" id="ticketModalTitle"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body rounded-0">
                <div class="container-fluid">
                    <form action="" id="ticketForm">
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label for="code" class="control-label">Código</label>
                            <input type="text" class="form-control rounded-0" id="code" name="code" maxlength="7" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="control-label">Nombre</label>
                            <input type="text" class="form-control rounded-0" id="name" name="name" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer rounded-0">
                <button type="submit" form="ticketForm" class="btn btn-danger">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
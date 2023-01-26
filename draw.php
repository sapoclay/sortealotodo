<?php
include 'includes/draw.php';
?>
<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto h-100 d-flex flex-column justify-content-center align-items-center">
    <div id="raffle-draw" class="w-100">
        <input type="hidden" id="rdraw" value="<?= $draw ?>">
        <input type="hidden" id="draw_text" value="<?= $draw_text ?>">
        <h2 class="text-center titulo"><b><?= $draw_text ?></b></h2>
        <hr>
        <?php
        include 'includes/draw1.php';
        ?>

<div class="modal fade rounded-0" id="winnerModal" data-bs-backdrop="static">
    <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable rounded-0">
        <div class="modal-content rounded-0">

            <div class="modal-body rounded-0">
                <div class="container-fluid h-50">
                    <div id="win_template" class="position-relative">
                        <img src="img/win_bg.jpg" alt="Felicidades" class="img-fluid">
                        <div id="winner_greet">
                            <h3 id="draw_winner" class="text-center"><b></b></h3>
                            <h1 class="text-center"><b>Felicitaciones</b></h1>
                        </div>
                        <div id="winner_name">
                            <h1 id="winner" class="text-center"><b></b></h1>
                            <h3 id="winner_code" class="text-center"><b></b></h3>
                        </div>
                    </div>
                </div>
                <div class="text-center my-2">
                    <button type="button" class="btn btm-sm rounded-pill btn-light border" data-bs-dismiss="modal">Guardar Ganador</button>
                </div>
            </div>
        </div>
    </div>
</div>
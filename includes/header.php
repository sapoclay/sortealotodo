<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="./">Sortealotodo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menú -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 'draw')) ? "active" : "" ?>" href="./">Sorteo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'tickets') ? "active" : "" ?>" href="./?page=tickets">Jugador@s</a>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'winners') ? "active" : "" ?>" href="./?page=winners">Premios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
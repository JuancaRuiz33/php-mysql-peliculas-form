<?php
require_once("./controllers/funciones.php");

// Crear la conexión a la base de datos
$bd = conexion("localhost", "cine_isil", "root", "");

// Variable para controlar el modal
$registroExitoso = false;

// Verificar si se envió el formulario (por POST)
if ($_POST) {
    // Insertar los datos del formulario en la tabla 'movies'
    guardarPelicula($bd, 'movies', $_POST);
    $registroExitoso = true; // Activar el modal de éxito
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Cine ISIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-camera-reels me-2"></i>CineISIL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#estrenos2025">Estrenos</a></li>

                </ul>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovieModal">
                    <i class="bi bi-plus-circle"></i> Agregar Película
                </button>
            </div>
        </div>
    </nav>


    <!-- Modal Agregar Película -->
    <div class="modal fade" id="addMovieModal" tabindex="-1" aria-labelledby="addMovieModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-light border-0 rounded-4 shadow-lg">
                <form method="POST">
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title fw-bold" id="addMovieModalLabel">
                            <i class="bi bi-film me-2 text-danger"></i>Formulario de <span class="text-danger">Películas</span>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-secondary mb-4 text-center">Ingresa los detalles de tus películas favoritas</p>

                        <div class="row g-4">
                            <!-- Título -->
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Título de la Película</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-light border-0">
                                        <i class="bi bi-type"></i>
                                    </span>
                                    <input type="text" class="form-control bg-secondary text-white border-0" id="titulo" name="titulo" placeholder="Ej: El Padrino" required>
                                </div>
                            </div>

                            <!-- Premios -->
                            <div class="col-md-6">
                                <label for="premios" class="form-label">Premios</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-light border-0">
                                        <i class="bi bi-trophy"></i>
                                    </span>
                                    <input type="number" class="form-control bg-secondary text-white border-0" id="premios" name="premios" placeholder="Ej: 5" required>
                                </div>
                            </div>

                            <!-- Fecha de Creación -->
                            <div class="col-md-6">
                                <label for="fechaCreacion" class="form-label">Fecha de Creación</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-light border-0">
                                        <i class="bi bi-calendar-event"></i>
                                    </span>
                                    <input type="date" class="form-control bg-secondary text-white border-0" id="fechaCreacion" name="fechaCreacion" required>
                                </div>
                            </div>

                            <!-- Duración -->
                            <div class="col-md-6">
                                <label for="duracion" class="form-label">Duración (minutos)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-light border-0">
                                        <i class="bi bi-clock"></i>
                                    </span>
                                    <input type="number" class="form-control bg-secondary text-white border-0" id="duracion" name="duracion" placeholder="Ej: 175" required>
                                </div>
                            </div>

                            <!-- Género -->
                            <div class="col-md-12">
                                <label for="genero" class="form-label">Género</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-light border-0">
                                        <i class="bi bi-tags"></i>
                                    </span>
                                    <input type="text" class="form-control bg-secondary text-white border-0" id="genero" name="genero" placeholder="Ej: Drama" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Cancelar
                        </button>
                        <button type="submit" name="guardar" class="btn btn-danger">
                            <i class="bi bi-save2 me-1"></i> Guardar Película
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Banner -->
    <section class="banner-section text-white d-flex align-items-center">
        <div class="container text-center py-5">
            <h1 class="display-3 fw-bold mb-4">Administra tu colección de películas</h1>
            <p class="lead mb-5">Organiza, cataloga y disfruta de tu biblioteca cinematográfica</p>
            <button class="btn btn-primary btn-lg px-4 me-2" data-bs-toggle="modal" data-bs-target="#addMovieModal">
                <i class="bi bi-plus-circle"></i> Agregar Película
            </button>
        </div>
    </section>


    <!-- Carrussel de estrenos-->
    <section id="estrenos2025" class="text-white">
        <h2 class="text-center fw-bold py-4 bg-dark mb-0">
            🎥 Estrenos <span class="text-danger">2025</span>
        </h2>

        <div id="estrenosCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="img/tron-ares.jpg" class="d-block w-100" alt="Tron-Ares">
                    <div class="carousel-caption text-start d-flex flex-column justify-content-center h-100 px-5">
                        <h1 class="display-3 fw-bold text-white text-shadow">
                            <span class="bg-danger px-3 py-1 d-inline-block">TRON ARES</span><br>

                        </h1>
                        <p class="lead mt-3 text-white text-shadow">
                            Ares, un programa altamente sofisticado, es enviado al mundo real en una misión peligrosa. Este será el primer encuentro de la humanidad con un ser de la IA.
                        </p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="img/El-conjuro-portada.jpg" class="d-block w-100" alt="Horizonte Final">
                    <div class="carousel-caption text-start d-flex flex-column justify-content-center h-100 px-5">
                        <h1 class="display-3 fw-bold text-white text-shadow">
                            <span class="bg-danger px-3 py-1 d-inline-block">El Conjuro 4: Últimos Ritos</span><br>

                        </h1>
                        <p class="lead mt-3 text-white text-shadow">
                            Vera Farmiga y Patrick Wilson se reúnen para un último caso como los célebres investigadores paranormales de la vida real, Ed y Lorraine Warren, en una adición poderosa y escalofriante a la franquicia que rompe récords en taquilla global.
                        </p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="img/demon-slayer.webp" class="d-block w-100" alt="Sombras del Pasado">
                    <div class="carousel-caption text-start d-flex flex-column justify-content-center h-100 px-5">
                        <h1 class="display-3 fw-bold text-white text-shadow">
                            <span class="bg-danger px-3 py-1 d-inline-block">Demon Slayer Castillo Infinito</span><br>

                        </h1>
                        <p class="lead mt-3 text-white text-shadow">
                            El Cuerpo de Cazadores de Demonios se enfrenta a los Doce Kizuki restantes antes de enfrentarse a Muzan en el Castillo del Infinito para derrotarlo de una vez por todas.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Controles flechas -->
            <button class="carousel-control-prev" type="button" data-bs-target="#estrenosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#estrenosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>




    <!-- FOOTER -->
    <footer class="text-center py-4 bg-dark text-white mt-0 border-top border-danger">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center mb-1">
                <img src="img/isil.png" alt="Logo Cine ISIL" class="me-2" style="width: 40px; height: 40px;">
                <p class="mb-0 fs-5 fw-semibold">Cine ISIL</p>
            </div>
            <small class="d-block mb-2">© 2025 Todos los derechos reservados</small>
            <div>
                <a href="#" class="text-danger text-decoration-none mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-danger text-decoration-none mx-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-danger text-decoration-none mx-2"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>
    </footer>


    <!-- Modal de confirmación -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 rounded-circle" style="width: 100px; height: 100px;">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-success mb-3">¡Película registrada!</h4>
                    <p class="text-muted fs-5 mb-4">La película se ha guardado exitosamente en la base de datos.</p>
                    <button type="button" class="btn btn-success px-5 py-2 fw-semibold rounded-pill" data-bs-dismiss="modal">
                        <i class="bi bi-hand-thumbs-up-fill me-1"></i> Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

<?php if ($registroExitoso): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script>
<?php endif; ?>

</html>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../view/login.html");
    exit(); // Asegúrate de usar exit() después de header()
}

// Obtener el nombre del usuario y el rol
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CobosHub - <?php echo $rol == 'admin' ? 'Admin' : 'Cliente'; ?></title>
    <link rel="stylesheet" href="../styles/CSS/estiloIndex.css">
    <link rel="stylesheet" href="../styles/CSS/estilomenu.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <script src="../../node_modules/bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../../node_modules/fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.css">
</head>
<body>
    <div class="container-fluid" id="contenedorprincipal">
        <header>
            <div class="row">
                <div class="col-sm-4 mt-4">
                    <h3 class="titulo">CobosHub - <?php echo $rol == 'admin' ? 'Admin' : 'Cliente'; ?></h3>
                </div>
                <div class="col p-sm-6 mt-4">
                    <div class="input-group mt-3 mb-3">
                        <button class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">Categoria</button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">Telefonia</li>
                            <li class="dropdown-item">Calzado</li>
                            <li class="dropdown-item">Autos</li>
                        </ul>
                        <input class="form-control" type="text" name="txtbuscar" placeholder="Buscar">
                        <button class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018"/>
                                <path d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 0 0 0-11 5.5 5.5 0 0 0 0 11"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col p-sm-2 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                </div>
            </div>
        </header>
        <nav>
            <ul class="menudesplegable">
                <a class="qq" href="#" data-bs-toggle="offcanvas" data-bs-target="#demo"><i class="fa-solid fa-bars-progress"></i> Todo</a>
                <!-- Offcanvas Sidebar -->
                <div class="offcanvas offcanvas-start text-bg-dark" id="demo">
                    <div class="offcanvas-header">
                        <h1 class="offcanvas-title">Heading</h1>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                    </div>
                </div>
                <li><a href="../view/promociones.html">Promociones</a></li>
                <li><a href="../view/productos.html">Lo más vendido</a></li>
                <li id="Perfil">
                    <a href="logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        Hola, <?php echo htmlspecialchars($usuario); ?>
                        <br><a href="logout.php">Cerrar sesión</a>
                    </a>
                </li>
            </ul>
        </nav>
        <section>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../public/assets/img/imagenespromociones/promocion2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../public/assets/img/imagenespromociones/promocio3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../public/assets/img/imagenespromociones/promocion1.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>
</body>
</html>

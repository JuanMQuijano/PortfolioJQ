<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Juan Quijano Portafolio">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/build/css/app.css" />
    <link rel="shortcut icon" href="/build/img/favicon.ico" type="image/x-icon">
    <title>Portafolio - Juan Quijano</title>
</head>

<body>
    <header>
        <div>
            <div id="menu" class="menu"></div>
            <nav id="nav" class="nav">
                <?php if (!$admin) { ?>
                    <a href="#resumen">Resumen</a>
                    <a href="#tecnologias">Tecnologías</a>
                    <a href="#proyectos">Proyectos</a>
                    <a href="#contacto">Contacto</a>
                <?php } else { ?>
                    <a href="/logout">Cerrar Sesión</a>
                <?php } ?>
            </nav>
        </div>
        <a href="/">
            <h1>¡Hola!</h1>
        </a>
    </header>

    <?php
    include_once __DIR__ . '/templates/alertas.php';
    
    if ($enviado == 1) { ?>
        <div class='alerta'>
            <p>Enviado Correctamente</p>
        </div>
    <?php } ?>

    <?php if (!$admin) { ?>
        <div class="banner">
            <div class="contenido-banner">
                <p>Juan Quijano</p>
                <p>Junior Web Developer</p>
            </div>
        </div>
    <?php } ?>
    <main>
        <?php echo $contenido; ?>
    </main>

    <footer>
        <p>Made Using HTML 5, CSS 3, SASS, JS, PHP, SQL</p>
        <p>
            Copyright
            <?php echo date('Y'); ?>
            - Juan Quijano
        </p>
        <nav>
            <a href="https://github.com/JuanMQuijano?tab=repositories"><img src="/build/img/GitHub-Mark-Light-32px.webp" alt="Logo GitHub" /></a>
        </nav>
    </footer>
    <script src="/build/js/app.js"></script>
</body>

</html>
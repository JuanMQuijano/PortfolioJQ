<section class="resumen" id="resumen">
    <h1>RESUMEN</h1>

    <div>
        <img src="/build/img/IMG_4110.webp" alt="Mi imagen" />
        <p>
            <span>¡Hola!</span> Mi nombre es Juan Manuel Quijano, tengo 21 años.
            <br>
            Soy estudiante de Ingeniería Informática en la Institución Universitaria Colegio Mayor del Cauca
            <a target="_blank" href="https://unimayor.edu.co/web/">(IUCMDC)</a>.
            <br />
            Me apasiona el desarrollo de aplicaciones en especial el desarrollo
            de aplicaciones web.
            <br>
            <br>
            En el año 2021 participé en el diplomado de Misión TIC en la Universidad de Antioquia con énfasis en desarrollo web impulsado por el gobierno nacional,
            si quieres ponerte en contacto conmigo te invito a que llenes el formulario que encontrarás en la parte inferior de esta página web.
            <br>
            <span>¡Hasta pronto!</span>
        </p>
    </div>
</section>

<hr class="hr" />

<section class="tecnologias" id="tecnologias">
    <h1>TECNOLOGÍAS</h1>

    <p>Estás son algunas tecnologias que trabajo</p>

    <label for="">HTML 5</label>
    <progress value="95" max="100"></progress>

    <label for="">CSS 3</label>
    <progress value="90" max="100"></progress>

    <label for="">SASS</label>
    <progress value="90" max="100"></progress>

    <label for="">PHP</label>
    <progress value="80" max="100"></progress>

    <label for="">JAVASCRIPT</label>
    <progress value="80" max="100"></progress>

    <label for="">JAVA</label>
    <progress value="90" max="100"></progress>

    <label for="">SQL</label>
    <progress value="90" max="100"></progress>
</section>

<hr class="hr" />

<section class="proyectos" id="proyectos">
    <h1>PROYECTOS</h1>

    <div>
        <div class="contenedor-proyecto">
            <img src="/build/img/GitHub-Mark-Light-32px.webp" alt="Imagen Proyecto" />
            <p>
                Aplicativo web que permite la comercialización de inmuebles,
                cuenta con vista de usuario y administrador, donde se podran
                crear, actualizar o eliminar propiedades a antojo del usuario
                administrador; Tecnologias involucradas en el desarrollo: HTML,
                CSS, JAVASCRIPT, PHP Y MYSQL
            </p>
        </div>

        <div class="contenedor-proyecto">
            <img src="/build/img/GitHub-Mark-Light-32px.webp" alt="Imagen Proyecto" />
            <p>
                Aplicativo web que permite la comercialización de inmuebles,
                cuenta con vista de usuario y administrador, donde se podran
                crear, actualizar o eliminar propiedades a antojo del usuario
                administrador; Tecnologias involucradas en el desarrollo: HTML,
                CSS, JAVASCRIPT, PHP Y MYSQL
            </p>
        </div>

        <div class="contenedor-proyecto">
            <img src="/build/img/GitHub-Mark-Light-32px.webp" alt="Imagen Proyecto" />
            <p>
                Aplicativo web que permite la comercialización de inmuebles,
                cuenta con vista de usuario y administrador, donde se podran
                crear, actualizar o eliminar propiedades a antojo del usuario
                administrador; Tecnologias involucradas en el desarrollo: HTML,
                CSS, JAVASCRIPT, PHP Y MYSQL
            </p>
        </div>
    </div>
</section>

<hr class="hr" />

<section class="contacto" id="contacto">
    <h1>¡PLATIQUEMOS!</h1>

    <form method="POST">
        <label for="Nombre">Nombre</label>
        <input type="text" placeholder="Tu Nombre" id="Nombre" name="nombre" value="<?php echo $userMessage->nombre; ?>" />

        <label for="Apellido">Apellido</label>
        <input type="text" placeholder="Tu Apellido" id="Apellido" name="apellido" value="<?php echo $userMessage->apellido; ?>" />

        <label for="Contacto">¿Comó deseas ser contactado?</label>

        <div>
            <label for="Email">E-mail</label>
            <input type="radio" name="contacto" id="Email" value="Email" />

            <label for="Telefono">Teléfono</label>
            <input type="radio" name="contacto" id="Telefono" value="Telefono" />
        </div>

        <div class="contactoOp" id="contactoOp"></div>

        <input class="sub" type="submit" value="Envíar" />
    </form>
</section>
<section class="proyectos" id="proyectos">
    <a href="/admin/proyectos/crear">
        <h1>Agregar Nuevo Proyecto</h1>
    </a>
    <h1>PROYECTOS</h1>

    <div>
        <?php foreach ($projects as $project) { ?>
            <div class="contenedor-proyecto">
                <img src="/build/img/<?php echo $project->imagen; ?>" alt="Imagen Proyecto" />
                <p><span><?php echo $project->nombre; ?></span></p>
                <p><?php echo $project->descripcion; ?></p>
            </div>
        <?php } ?>
    </div>
</section>
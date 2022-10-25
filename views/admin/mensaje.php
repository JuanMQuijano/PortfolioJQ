<section class="contacto">
    <h1 class="nombre-pagina">Mensaje de <?php echo $userMessage->nombre . " " . $userMessage->apellido; ?></h1>
    <form method="POST" class="formulario">
        <label for="Nombre">Nombre</label>
        <input type="text" placeholder="Tu Nombre" id="Nombre" name="nombre" value="<?php echo $userMessage->nombre; ?>" />

        <label for="Apellido">Apellido</label>
        <input type="text" placeholder="Tu Apellido" id="Apellido" name="apellido" value="<?php echo $userMessage->apellido; ?>" />

        <label for="Contacto">Contacto</label>

        <?php if ($userMessage->contacto === 'Telefono') { ?>
            <label for="telefono">Número de Teléfono</label>
            <input type="tel" id="telefono" placeholder="Tu Teléfono" name="telefono" value="<?php echo $userMessage->telefono; ?>" />

            <br>
            <br>

            <label>Elija la fecha y la hora para la llamada</label>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" min="${fechaFin}" name="fecha" value="<?php echo $userMessage->fecha; ?>" />
            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="hora" value="<?php echo $userMessage->hora; ?>" />

            <a href="tel:+57<?php echo $userMessage->telefono; ?>">Contactar</a>
        <?php } else { ?>
            <label for="email">E-mail</label>
            <input type="email" id="email" placeholder="Tu E-mail" name="email" value="<?php echo $userMessage->email; ?>" />

            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje"><?php echo $userMessage->mensaje; ?></textarea>

            <a href="mailto:<?php echo $userMessage->email; ?>">Contactar</a>
        <?php } ?>

    </form>
</section>
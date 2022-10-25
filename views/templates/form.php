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

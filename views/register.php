<?php include_once __DIR__ . '/templates/alertas.php'; ?>

<section class="admin">
    <h1>Register</h1>

    <form method="POST">
        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" placeholder="Tu Correo" value="<?php echo $user->correo; ?>">
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" id="contraseña" placeholder="Tu Contraseña">

        <input type="submit" value="Register">
    </form>
</section>
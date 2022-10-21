<section class="admin">
    <h1>Mensajes</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Contacto</th>
            <th>E-mail</th>
            <th>Teléfono</th>
            <th>Fecha</th>
        </tr>

        <?php
        foreach ($userMessages as $userMessage) {
        ?>
            <tr>
                <td><a href=""><?php echo $userMessage->id; ?></a></td>
                <td><?php echo $userMessage->nombre . " " . $userMessage->apellido; ?></td>
                <td><?php echo $userMessage->contacto; ?></td>
                <td><?php echo $userMessage->email; ?></td>
                <td><?php echo $userMessage->telefono; ?></td>
                <td><?php echo $userMessage->fecha; ?></td>
            </tr>
        <?php } ?>
    </table>

</section>
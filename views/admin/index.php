<section class="admin">
    <h1>Mensajes</h1>

    <table>
        <tr>
            <th>Nombre Completo</th>
            <th>Contacto</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

        <?php
        foreach ($userMessages as $userMessage) {
        ?>
            <tr>
                <td><?php echo $userMessage->nombre . " " . $userMessage->apellido; ?></td>
                <td><?php echo $userMessage->contacto; ?></td>
                <td><?php echo $userMessage->fecha; ?></td>
                <td>
                    <a href="/admin/mensaje?id=<?php echo $userMessage->id; ?>" class="boton">Ver</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</section>
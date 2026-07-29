<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mensaje = htmlspecialchars($_POST["mensaje"]);

    $destinatario = "thomasbtafur@gmail.com";
    $asunto = "Nueva sugerencia desde el buzón";

    $contenido = "Has recibido una nueva sugerencia:\n\n";
    $contenido .= $mensaje;

    $headers = "From: thomasbtafur@gmail.com ";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "<h3>Mensaje enviado correctamente ✅</h3>";
    } else {
        echo "<h3>Error al enviar el mensaje ❌</h3>";
    }
}

?>
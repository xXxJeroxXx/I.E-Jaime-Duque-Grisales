<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty(trim($_POST["mensaje"]))) {
        echo "<h3>Por favor, escribe un mensaje antes de enviar ❌</h3>";
        exit; 
    }

    $mensaje = htmlspecialchars($_POST["mensaje"]);
    $destinatario = "thomasbtafur@gmail.com";
    $asunto = "Nueva sugerencia desde el buzón";

    $contenido = "Has recibido una nueva sugerencia:\n\n";
    $contenido .= $mensaje;

    // 2. Usar un correo de tu propio dominio para evitar el SPAM
    // Cambia "tudominio.com" por el dominio real de tu página web
    $remitente = "no-reply@tudominio.com"; 
    

    $headers = "From: " . $remitente . "\r\n";
    $headers .= "Reply-To: " . $remitente . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "<h3>Mensaje enviado correctamente ✅</h3>";
    } else {
        echo "<h3>Error al enviar el mensaje ❌</h3>";
    }
}

?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty($_POST['solicitante']) || empty($_POST['estudiante']) || empty($_POST['correo'])) {
        echo "<h2>Por favor, complete todos los campos obligatorios. ❌</h2>";
        exit;
    }

    // Recibir y sanitizar datos (usando trim para quitar espacios en blanco accidentales)
    $solicitante = htmlspecialchars(trim($_POST['solicitante']));
    $estudiante  = htmlspecialchars(trim($_POST['estudiante']));
    $grado       = htmlspecialchars(trim($_POST['grado']));
    $correo      = htmlspecialchars(trim($_POST['correo'])); 
    $reclamar    = htmlspecialchars(trim($_POST['reclamar'])); 

    $destinatario = "ievillamaria@sedcaldas.gov.co";


    $asunto = "Nueva solicitud de Certificado - " . $estudiante;

    
    $mensaje = "Se ha recibido una nueva solicitud de certificado de estudio:\n\n";
    $mensaje .= "Nombre de quien solicita: $solicitante\n";
    $mensaje .= "Nombre del estudiante: $estudiante\n";
    $mensaje .= "Grado que cursa: $grado\n";
    $mensaje .= "Correo para enviar el certificado: $correo\n";
    $mensaje .= "Información de reclamo: $reclamar\n";

    
    // Cambia "no-reply@tudominio.com" por el dominio de tu página
    $remitente = "no-reply@tudominio.com"; 
    
    $cabeceras  = "From: Campus virtual IEJDG <" . $remitente . ">\r\n";
    $cabeceras .= "Reply-To: " . $correo . "\r\n"; 
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "<h2>Solicitud enviada correctamente. ✅</h2>";
        echo "<p>El certificado será enviado al correo proporcionado cuando esté listo.</p>";
    } else {
        echo "<h2>Error al enviar la solicitud. ❌</h2>";
        echo "<p>Intente nuevamente más tarde.</p>";
    }

} else {
    echo "Acceso no permitido.";
}

?>
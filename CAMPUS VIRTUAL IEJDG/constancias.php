<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos del formulario
    $solicitante = htmlspecialchars($_POST['solicitante']);
    $estudiante  = htmlspecialchars($_POST['estudiante']);
    $grado       = htmlspecialchars($_POST['grado']);
    $correo      = htmlspecialchars($_POST['correo']);
    $Reclamar    = htmlspecialchars($_POST['Reclamar']);

    // Correo del encargado de crear el certificado
    $destinatario = "ievillamaria@sedcaldas.gov.co";

    // Asunto del correo
    $asunto = "Nueva solicitud de Certificado de Estudio";

    // Cuerpo del mensaje
    $mensaje = "
    Se ha recibido una nueva solicitud de certificado de estudio:

    Nombre de quien solicita: $solicitante
    Nombre del estudiante: $estudiante
    Grado que cursa: $grado
    Correo para enviar el certificado: $correo
    ";

    // Cabeceras
    $cabeceras = "From: Campus virtual IEJDG";

    // Enviar correo
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "<h2>Solicitud enviada correctamente.</h2>";
        echo "<p>El certificado será enviado al correo proporcionado cuando esté listo.</p>";
    } else {
        echo "<h2>Error al enviar la solicitud.</h2>";
        echo "<p>Intente nuevamente más tarde.</p>";
    }

} else {
    echo "Acceso no permitido.";
}

?>
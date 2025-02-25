<?php
if(isset($_POST['enviar'])){
    // Guardamos en variables los datos enviados
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $mensaje_usuario = trim($_POST['mensaje']);

    // Validaciones básicas
    if(empty($nombre)){
        echo "Debes ingresar tu nombre";
        exit;
    } elseif(empty($email)){
        echo "Debes ingresar tu email";
        exit;
    } elseif(empty($mensaje_usuario)){
        echo "Debes ingresar tu mensaje";
        exit;
    }

    $para = "kleyna@gmail.com";
    $asunto = "Contacto desde el sitio web de Kabeli";

    // Construcción del mensaje en HTML
    $cuerpo_mensaje = "
        <html>
        <head><title>Contacto desde el sitio web</title></head>
        <body>
            <table border='0' cellspacing='3' cellpadding='2'>
                <tr>
                    <td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
                    <td width='70%' align='left'>$nombre</td>
                </tr>
                <tr>
                    <td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
                    <td align='left'>$email</td>
                </tr>
                <tr>
                    <td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
                    <td width='70%' align='left'>$telefono</td>
                </tr>
                <tr>
                    <td align='left' bgcolor='#f0efef'><strong>Mensaje:</strong></td>
                    <td align='left'>$mensaje_usuario</td>
                </tr>
            </table>
        </body>
        </html>";

    // Configuración de los encabezados del correo
    $headers = "From: Sitio Web <no-reply@tudominio.com>\r\n"; 
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Envío del correo
    if(mail($para, $asunto, $cuerpo_mensaje, $headers)){
        echo '<p style="margin-top:40px;font-size: 32px; color: #ffffff; font-family: sans-serif; font-weight: 100;">
        Gracias por ponerte en contacto, tu mensaje nos alegra el día. Muy pronto recibirás nuestra respuesta.
        <br><span style="font-size: 24px;">Estamos aquí para ayudarte cuando lo necesites.</span></p>';
        echo '<br /><a style="padding: 6px 12px; font-size: 20px; border: 1px solid #79818B; background: #202E3E; color: #ffffff; text-decoration: none;font-family: sans-serif;" href="formulario_contacto.html">Volver</a>';
    } else {
        echo '<p style="margin-top:40px;font-size: 32px; color: #ffffff; font-family: sans-serif; font-weight: 100;">
        ¡Vaya! Parece que tu mensaje se perdió en el espacio. Por favor, inténtalo de nuevo.
        <br><br>
        <span style="font-size: 24px;">Recuerda que también estamos a tu disposición por otros medios de contacto: Whatsapp, e-mail o agenda una reunión con Calendly.</span></p>';
    }
}
?>

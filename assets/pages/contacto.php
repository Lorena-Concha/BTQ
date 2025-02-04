<?php
/*Formulario de contacto HTML5, PHP Y Bootstraps
Creado por: www.render2web.com
Version: 1.1*/

//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['enviar'])){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Debes ingresar tu nombre";
	}
	else if($email == ''){
		echo "Debes ingresar tu email";
	}
	else if($mensaje == ''){
		echo "Debes ingresar tu mensaje";
	}
	else {
	$para = "kleyna@gmail.com";//Email al que se enviará
	$asunto = "Contacto desde el sitio web de Kabeli";//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
			<td width='80%' align='left'>$nombre</td>
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
			<td align='left' bgcolor='#f0efef'><strong>Comentario:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
    $headers = "From: $nombre <$email>\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
		echo '<p style="margin-top:40px;font-size: 32px; color: #ffffff; font-family: sans-serif; font-weight: 100;">Gracias por ponerte en contacto, tu mensaje nos alegra el día. 
		Muy pronto recibirás nuestra respuesta.<br> 
		<span style="font-size: 24px;">Estamos aquí para ayudarte cuando lo necesites.</span></p>';
		echo "<br />";
		echo '<a style="padding: 6px 12px; font-size: 20px; border: 1px solid #79818B; background: #202E3E; color: #ffffff; text-decoration: none;font-family: sans-serif; " href="formulario_contacto.html">Volver</a>';
	}
	else{
		echo '<p style="margin-top:40px;font-size: 32px; color: #ffffff; font-family: sans-serif; font-weight: 100;">¡Vaya! Parece que tu mensaje se perdió en el espacio.<br>
		Por favor, inténtalo de nuevo.<br><br>
		
		<span style="font-size: 24px;">Recuerda que también estamos a tu disposición por otros medios de contacto:<br> 
		Escríbenos por Whatsapp o por e-mail. <br>
		Llámanos o agenda una reunión con Calendly.<br><br>
		
		¡Gracias por confiar en nosotros! <span></p>';
	}
}	
}	
?>
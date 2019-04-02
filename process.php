<?php
require 'PHPMailerAutoload.php';
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "<span class=\"error\">Error al validar el E-mail</span>";
	exit();
}
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->SMTPDebug = 3;
$mail->setFrom('noreply@dirnovo.com', 'Orquesta Kevin y los Agentes');
$mail->Sender='novotecn@gator3249.hostgator.com';
$mail->addAddress('kevinylosagentes@yahoo.com'); // Esta línea, corresponde al mail del cliente
$mail->addBCC('formularios@clicnovo.com');
$mail->addReplyTo($email, $nombre);
$mail->Subject = "Formulario: " . $asunto;
$mail->isHTML(true);
$mail->Body = $mensaje;

if (!$mail->send()) {
    echo "<span class=\"error\">Mailer Error: " . $mail->ErrorInfo . "</span>";
} else {
    echo "<span class=\"mailok\">Mensaje enviado!</span>";
}
?>
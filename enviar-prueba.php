<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'safewallet1@gmail.com';                     // SMTP username
    $mail->Password   = 'walletsafe1234';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to


    //Recipients
    $mail->setFrom('safewallet1@gmail.com', $nombre);
    $mail->addAddress('safewallet1@gmail.com');     // Add a recipiente

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New message';
    $mail->Body    = $body;

    $mail->send();
    echo '<script>
        alert("El mensaje se envío correctamente");
        window.history.go(-1);
        </script>';

} catch (Exception $e) {
    echo "An error has ocurred: {$mail->ErrorInfo}";
}
<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $nombre;
    public $email;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }
    public function enviarConfirmacion()
    {
        // Crear el objeto de email, configuracion de casilla
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd085369ca3249d';
        $mail->Password = '29907ebc88b5c6';

        // Cabecera del email
        $mail->setFrom('cuentas@appsalon.com'); // Aqui iria el dominio del host que estaria pagando
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Cuerpo del email en HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://127.0.0.1:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta </a></p>";
        $contenido .= "<p>Si vos no solicitaste esta cuenta, ignora este mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }
    public function enviarInstrucciones(){
        // Crear el objeto de email, configuracion de casilla
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd085369ca3249d';
        $mail->Password = '29907ebc88b5c6';

        // Cabecera del email
        $mail->setFrom('cuentas@appsalon.com'); // Aqui iria el dominio del host que estaria pagando
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Restablecer contraseña';

        // Cuerpo del email en HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Has solicitado restablecer la contraseña, solo debes confirmar presionando en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://127.0.0.1:3000/recuperar?token=" . $this->token . "'>Restablecer Contraseña</a></p>";
        $contenido .= "<p>Si vos no solicitaste este cambio, ignora el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviar_correo($name, $email, $cod_aleat){

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       //Con el valor 0 desactivamos el debugger
        $mail->isSMTP();                                            //Usamos protocolo SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                //Indicamos el servidor SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jesuslopezcenteno@outlook.es';         //SMTP username
        $mail->Password   = 'pvmstdcqqcnbpqhe';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('jesuslopezcenteno@outlook.es', 'Eq. Logistico Amazen');
        $mail->addAddress($email, $name);     //Add a recipient

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Correo de verificación Amazen";
        $mail->Body    = "Para que podamos confirmar su identidad, porfavor introduzca el siguiente codigo: <b>$cod_aleat</b>";

        $mail->send();
        echo 'El mensaje ha sido enviado correctamente';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
    }
}

function confirmacion ($nombre, $apellidos, $email, $passwd){
    $cod_aleat = "1111";

    //enviar_correo($nombre,$email, $cod_aleat);
    
    echo "<form action='registro2.php' method='POST'>\n";
    echo "<p>Hemos enviado un correo de confirmación a la dirección de correo: <b>$email</b></p>\n";
    echo "<p>Porfavor, introduce el codigo proporcionado para validar el registro.</p>\n";
    echo "<input type='text' name='cod-validacion' />\n";
    echo "<input  type='submit' class='btn-validar' value='Validar' name='ok' />\n";
    echo "<input type='hidden' value=$cod_aleat name='cod_aleat' />\n";
    echo "<input type='hidden' value=$nombre name='nombre' />\n";
    echo "<input type='hidden' value=$apellidos name='apellidos' />\n";
    echo "<input type='hidden' value=$email name='email' />\n";
    echo "<input type='hidden' value=$passwd name='passwd' />\n";
    echo "</form>\n";
    echo "<br>";

}

?>
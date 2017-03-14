<?php

//form contacto
add_action('wp_ajax_nopriv_contacto_producto', 'enviar_mail_contacto_producto');
add_action('wp_ajax_contacto_producto', 'enviar_mail_contacto_producto');

function enviar_mail_contacto_producto() {

    /*
     * AJAX CONTACTO
     * 
     * AUTOR: Nicolas Monjelat
     * VERSION 1.0
     * 
     * 
     */


    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);

    $producto = filter_input(INPUT_POST, 'producto', FILTER_SANITIZE_STRING);
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);

    //Descarto por CSRF
    if (!check_ajax_referer('contacto-nonce', 'contacto', false)) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'csrf' => TRUE));
        die();
    }


//Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($nombre) || is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }

//REGLAS DE SPAM
    if (substr_count($mensaje, '$') > 2 || substr_count($mensaje, '.com') > 3 || substr_count($mensaje, '.xxx') > 1) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'spam-loco' => TRUE));
        die();
    }


// COMMON FOR ALL CLIENTS

    include_once 'class.phpmailer.php';
    $cuerpo_email = "<h3>Nueva Consulta desde producto Cardioserel</h3>        
                    <p>Producto: <b>{$producto}</b> </p>  
                    <p>Nombre: <b>{$nombre}</b> </p>  
                    <p>Email: <b>{$email}</b></p>                    
                    <p>Mensaje: <b>{$mensaje}</b></p>";


    $mail = new PHPMailer;

    $mail->IsSMTP();                           // tell the class to use SMTP

    $mail->SMTPAuth = true;                  // enable SMTP authentication  
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;                    // set the SMTP server port
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->Username = "formulario@worq.com.ar";     // SMTP server username
    $mail->Password = "f0rmulario_de_worq_con_q";            // SMTP server password
// Enable encryption, 'ssl' also accepted

    $mail->From = 'formulario@worq.com.ar';
    $mail->FromName = 'Formulario de Contacto Web';
    $mail->addAddress('nicolas@worq.com.ar', 'Nico');  // Add a recipient
    $mail->addReplyTo($email, $nombre);

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Consulta Web Producto Cardioserel';
    $mail->Body = $cuerpo_email;


    if (!$mail->send()) {
        echo json_encode(array('enviado' => FALSE, 'error-mailer' => $mail->ErrorInfo));
        exit;
    }
    echo json_encode(array('enviado' => TRUE));
    die();
}

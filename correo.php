<?php
    if(!empty($_POST['nombreContacto'])&& !empty($_POST['mensajeContacto']) && !empty($_POST['asuntoContacto']) && !empty($_POST['emailContacto'])){
        $nombre = $_POST['nombreContacto'];
        $asunto = $_POST['asuntoContacto'];
        $email = $_POST['emailContacto'];
        $mensaje = $_POST['mensajeContacto'];
        $header = "From: ".$email."\r\n";
        $header.= "Reply-to: noreply2@example.com"."\r\n";
        $header.="X-Mailer: PHP/". phpversion();

        //Correo a enviar
        $destinatario = "soporte@gamestoreuabcs.online";
        $cuerpo= "Mensaje enviado por ".$nombre."\r\n"."Correo electronico: ".$email."\r\n".$mensaje."\r\n";
        $mail = mail($destinatario,$asunto,$cuerpo,$header);

        header("Location: contacto.php?success=si");

    }else{
        header("Location: contacto.php?empty=si");
    }
?>
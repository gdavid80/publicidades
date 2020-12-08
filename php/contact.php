<?php
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['mensaje']) && isset($_POST['email']) && isset($_POST['telefono'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mensajeenviado = $_POST['mensaje'];
    $correo_origen = $_POST['email'];
    $telefono = $_POST['telefono'];
    $correo_destino = 'administracion@jahro.com.ar'; // aqui voy a enviar los correos
    $cabecera = 'From: webmaster@jahro.com.ar' . "\r\n" .
    'Reply-To: webmaster@jahro.com.ar' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $mensaje = "De: ".$nombre." ".$apellido."\r\n";
    $mensaje.= "Email: ".$correo_origen."\r\n";
    $mensaje.= "Telefono: ".$telefono."\r\n";
    $mensaje.= "Mensaje: ".$mensajeenviado."\r\n";
    $mensaje = wordwrap($mensaje, 70, "\r\n");
    
    try {
        $resultado = mail($correo_destino, 'Contacto desde la web', $mensaje, $cabecera);
    } catch (Exception $e) {
        die($e->getMessage());
    }
    if($resultado){
        header('Location: ../index.html?mail=1');
		die();
    }
}
header('Location: ../index.html?mail=0');
?>
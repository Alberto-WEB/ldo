<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code( );
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "linea.oro.sh@gmail.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Contacto del Sistema Web Linea de Oro";
$body = "Has recibido un nuevo mensaje del contacto en el sitio web ldo.mx.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nCorreo: $email\n\nTelefono: $phone\n\nComentario:\n$message";
//$header = "$email\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>




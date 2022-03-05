<?php


// Check for header injections
function has_header_injection($str) {
	return preg_match("/[\r\n]/", $str);
}

//$myemail = 'carlosramos26@gmail.com';

$myemail = 'info@jagpuertorico.com';

if (isset($_POST['name'])) {
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$message = strip_tags($_POST['message']);

	// Check to see if $name or $email have header injections
	if (has_header_injection($name) || has_header_injection($email)) {
		//$response_array['status'] = 'error';
		echo "Formato de nombre o e-mail no es valida.  Solo utilice caracteres alfanumericos.";
		die(); //If true, kill the script
	}

	if (!$name || !$email || !$message ) {
		//$response_array['status'] = 'error';
		echo "Favor completar la forma en todas sus partes.\nNombre, email y mensaje son requeridos.";
		exit;
	}

	$to = $myemail;
	$email_subject = "PanelesSolaresPR Auditoria de Energia";
	$email_body = "Haz recibido una consulta de Auditoria de Energia ".
	" Estos son los detalles:\n Nombre: $name \n ".
	"Email: $email\n Mensaje: \n $message";
	// $headers = "From: $myemail\n";
	// $headers .= "Reply-To: $email";
	mail($to,$email_subject,$email_body);

	echo "Su mensaje fue enviado!\nNos comunicaremos con usted muy pronto.";

}

?>
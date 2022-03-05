<?php

	if ($_POST["submit"]) {

		$result='<div class="alert alert-success">Form submitted</div>';

	
		if (!$_POST['name']) {

			$error = "<br />Por favor entre su nombre";

		}

		if (!$_POST['email']) {

			$error .= "<br />Por favor entre su e-mail";				// .=  is a shortcut for $error = $error."bla bla bla"

		}

		if (!$_POST['comment']) {

			$error .= "<br />Por favor escriba su mensaje";

		}

		if ($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {   //verifies if an email address was entered and then validates is

	   		 $error .= "<br />Por favor escriba una direcci&oacute;n de email valida";

		} 

		if ($error) {

			$result = '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Hay error(es) en su forma:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> '.$error.'</div>';

		} else {


			if (mail("info@panelessolarespr.com", "Paneles Solares PR solicitud de Mas Informacion!", "Nombre: ".$_POST['name']."

					Email: ".$_POST['email']." 

					Mensaje: ".$_POST['comment'])) {

				$result = '<div class="alert alert-success alert-dismissible" role="alert""><strong>&iexcl;Gracias! Lo contactaremos pronto.</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button></div>';

			} else {

				$result = '<div class="alert alert-danger alert-dismissible" role="alert""><strong>Lo sentimos hubo un error enviando su forma.  Por favor trate m&aacute;s tarde.</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button></div>';

			}

		}
	}


?>
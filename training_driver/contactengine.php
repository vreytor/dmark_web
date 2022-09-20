<?php

$EmailFrom	 = "driver_training@dmarksys.com";
$EmailTo	 = "entrenandoalconductor@dmarksys.com";
$Subject	 = "Mensaje del visitante web";
$Name		 = Trim( stripslashes( $_POST[ 'Name' ] ) );
$Email		 = Trim( stripslashes( $_POST[ 'Email' ] ) );
$Message	 = Trim( stripslashes( $_POST[ 'Message' ] ) );

// validation
$validationOK = true;
if ( !$validationOK ) {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
	exit;
}

// prepare email body text
$Body = "";
$Body .= "Nombre: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Mensaje: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail( $EmailTo, $Subject, $Body, "From: <$EmailFrom>" );

// redirect to success page 
if ( $success ) {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
} else {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
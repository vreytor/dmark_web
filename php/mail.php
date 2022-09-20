<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="inscripciones.entrenamiento@dmarksys.com"; //"yourmail@yoursite.com";

  //from email adress
  $emailFrom ="inscripciones.entrenamiento@dmarksys.com"; //"contact@yoursite.com";

  //email subject
  $emailSubject = "Correo Web";

  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  if($name == "")
   $data['success'] = false;
 
 if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
   $data['success'] = false;


 if($message == "")
   $data['success'] = false;

 if($data['success'] == true){

  $message = "Nombre: $name<br>
  Email: $email<br>
  Asunto: $subject<br>
  Mensaje: $message";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = 'success';
  echo json_encode($data);
}
}
<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'maximesourbier@maxsou.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "maxsou.fr contact: $name";
$headers = "De: maximesourbier@maxsou.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers  = "From: $name , $email_address\n";
// on indique qu'on a affaire à un email au format html avec l'entête ci-dessous
$headers .= "Content-Type: text/html; charset=\"utf-8\"";

$message_html  = "Vous avez reçu un mail via votre formulaire de contact.<br><br>"."Plus en détails: <br> Nom: $name <br>Email: $email_address <br>Message: $message";
mail($to, $email_subject, $message_html, $headers);
return true;			
?>
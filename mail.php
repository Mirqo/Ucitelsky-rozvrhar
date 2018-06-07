<?php
// Contact subject
$subject ="Skuska";
// Details
$message="Tu je jednoducha sprava na vyskusanie toho phpcka.";

// Mail of sender
$mail_from="miroslavmrozek7@gmail.com";
// From
$header="from: miroslavmrozek7@gmail.com";

// Enter your email address
$to ='miroslavmrozek7@gmail.com';

$send_contact=mail($to,$subject,$message,$header);

// Check, if message sent to your email
// display message "We've recived your information"
if($send_contact){
	echo "We've recived your contact information";
}else {
	echo "ERROR";
}?> 

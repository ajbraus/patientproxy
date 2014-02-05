<?php
require_once ( 'swift/lib/swift_required.php' );
//Create the Transport
$transport = Swift_SmtpTransport::newInstance('mail.patientproxy.com', 25)
  ->setUsername('info@patientproxy.com')
  ->setPassword('pproxy1')
  ;
$mailer = Swift_Mailer::newInstance($transport);

$emailmessage = strip_tags( $_POST['emailmessage'] );
$to = explode ( ',', $_POST['to_emailaddress'] );



//Create the message
$message = Swift_Message::newInstance()

  //Give the message a subject
->setSubject('Health Proxy')

  //Set the From address with an associative array
->setFrom(array('info@patientproxy.com' => 'Patient Proxy'))

  //Set the To addresses with an associative array
->setTo($to)

  //Give it a body
->setBody($emailmessage)

  //And optionally an alternative body
->addPart('<h1>Check it out!</h1><p>This thing generates a pdf and emails it, without saving anything on the server. <b>YES!!!</b></p>', 'text/html');

require_once ( 'generatorworks.php' );

  //Optionally add any attachments
$attachment = Swift_Attachment::newInstance( $finaloutput, 'application/pdf' )->setFilename('proxy.pdf');

$message->attach($attachment);

//Send the message
$result = $mailer->send($message);


if ( $result ) {
	echo '<p>Thanks for sharing!</p>';
	}
else {
	echo '<p>Our apologies, but an error has occurred.</p>';
	}

?>


<?php
require_once ( 'swift/lib/swift_required.php' );
//Create the Transport
$transport = Swift_SmtpTransport::newInstance('mail.patientproxy.com', 25)
  ->setUsername('info@patientproxy.com')
  ->setPassword('pproxy1')
  ;
$mailer = Swift_Mailer::newInstance($transport);





//Create the message
$message = Swift_Message::newInstance()

  //Give the message a subject
->setSubject('Testing Email')

  //Set the From address with an associative array
->setFrom(array('info@patientproxy.com' => 'Patient Proxy'))

  //Set the To addresses with an associative array
->setTo(array( 'ajbraus@gmail.com' => 'Adam Braus', 'emily.sommer@gmail.com' => 'Emily Sommer' ))

  //Give it a body
->setBody('Check it out! This thing generates a pdf and emails it, without saving anything on the server. YES!!!')

  //And optionally an alternative body
->addPart('<h1>Check it out!</h1><p>This thing generates a pdf and emails it, without saving anything on the server. <b>YES!!!</b></p>', 'text/html');

require_once ( 'generator.php' );

  //Optionally add any attachments
$attachment = Swift_Attachment::newInstance( $harvey, 'application/pdf' )->setFilename('proxy.pdf');

$message->attach($attachment);

//Send the message
$result = $mailer->send($message);
echo ( $result );

?>
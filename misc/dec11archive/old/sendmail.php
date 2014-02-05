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
->setTo(array( 'emily.sommer@gmail.com' => 'Emily Sommer' ))

  //Give it a body
->setBody('Here is the message itself')

  //And optionally an alternative body
->addPart('<q>Here is the message itself</q>', 'text/html');

  //Optionally add any attachments
$attachment = Swift_Attachment::newInstance('patientproxy.com/pdftester/pdfgen.php');

$message->attach($attachment);

//Send the message
$result = $mailer->send($message);
echo ( $result );

?>
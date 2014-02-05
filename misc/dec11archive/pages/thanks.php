<?php
/*if ( isset ( $cleared ) ) {
	echo 'CLEARED: ' . $cleared . '<br />';
	if ( $cleared == 'yes' ) {
		echo 'ROW: ';
		print_r ( $row );
		echo '<br />';
		echo 'USED: ' . $used . '<br />';
		echo 'PK: ' . $pk . '<br />';
		}
	}*/
$output_s = '';
if ( !isset ( $_POST['emailformsubmitted'] ) ) {
	$path = $_SERVER['PHP_SELF'] . '?links=thanks';
	echo <<<EOT
		<form action="$path" method="POST">
		<input type="hidden" name="current" value="$currentText" />
		<div id="stripeform">
			<p>Email a PDF of your Health Proxy and Living Will to yourself and your Health Proxy:</p>
			<div class="form-row">
				<label>To:</label>
				<input type="text" name="to_emailaddress" />
				<label>Message:</label>
				<textarea name="emailmessage" class="message"></textarea>
			</div>
		</div>
		<input type="hidden" name="emailformsubmitted" />
		<button type="submit" class="nextbutton" name="direction" value="neither">SEND</button>
		</form>
EOT;
	}
else {
	require_once ( 'swift/lib/swift_required.php' );
	//Create the Transport
	$transport = Swift_SmtpTransport::newInstance('mail.patientproxy.com', 25)
	  ->setUsername('info@patientproxy.com')
	  ->setPassword('pproxy1')
	  ;
	$mailer = Swift_Mailer::newInstance($transport);
	
	$emailmessage = (string) trim ( strip_tags ( $_POST['emailmessage'] ) );
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
	->setBody($emailmessage);
	
	  //And optionally an alternative body
	//->addPart('<h1>Check it out!</h1><p>This thing generates a pdf and emails it, without saving anything on the server. <b>YES!!!</b></p>', 'text/html');
	
	$output_s = true;
	require_once ( 'generator.php' );
	
	  //Optionally add any attachments
	$attachment = Swift_Attachment::newInstance( $finaloutput, 'application/pdf' )->setFilename('healthproxy.pdf');
	
	$message->attach($attachment);
	
	//Send the message
		$result = $mailer->send($message);
	
	
	if ( $result ) {
		echo '<p>Thanks for sharing!</p>';
		}
	else {
		echo '<p>Our apologies, but an error has occurred.</p>';
		}
	}
$output_s = null;
echo <<<EOT
	<a href="https://patientproxy.com/generator.php" target="blank">View PDF</a><br />Right-click on this link to save the document as a PDF on your computer.<br />

<div class="pdfdisplay">
	<object data="generator.php" type="application/pdf" width="100%">
		<p>It appears you don't have a PDF plugin for this browser.No biggie... you can <a href="generator.php">click here to download the PDF file.</a></p>  
	</object>
	</div>
EOT;
?>
<?php 
session_start();

//session_destroy ();

require_once ( 'config.php' );
require_once ( 'datahandler.php' );
require_once ( 'classes/basicelements.php' );
require_once ( 'generalstateset.php' );
require_once ( 'wisconsin.php' );
require_once ( 'pagehandler.php' );
require_once ( 'htmlgenerator.php' );

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if ( isset ( $pageTitle ) ) {
		$pageTitle = $pageTitle;
		}
	else {
		$pageTitle = '';
		}
  	echo '<title>Patient Proxy - ' . $pageTitle . '</title>';
?>

<link type="text/css" rel="stylesheet" href="style/blankstyle.css" />
<link type="text/css" rel="stylesheet" href="style/style.css" />
<script type="text/javascript" src="javascript/jquery.js"></script>    
<script type="text/javascript" src="javascript/jquery.url.js"></script>    
<script type="text/javascript" src="javascript/functions.js"></script>
<script type="text/javascript" src="javascript/custom-form-elements.js"></script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e90a6b437f6c7d8"></script>
</head>

<body>
<div id="headercolor"></div>
<div id="wrapper">
	
	<div id="header">
	
		<div id="logo">
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=start"><img src="images/logo.png" title="Patient Proxy Logo" alt="Patient Proxy Logo" /></a>
			<h1 class="accessible">Patient Proxy</h1>
			<h3 class="accessible">Designate your health proxy.</h3>
		</div> <!-- close div #logo -->
		
		<div id="littlelinks">
			<ul id="topnav">
				<li class="first">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=how" title="Learn more about how to make your health proxy and why it is so important.">How it works</a>
				</li>
				<li>|</li>
				<li>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=privacy" title="View our strict privacy policy.">Privacy</a>
				</li>				
				<li>|</li>
				<li class="last">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=feedback" title="Let us know what you think!">Feedback</a>
				</li>
			</ul>
		</div> <!-- close div #littlelinks -->
		
	</div> <!-- close div #header -->
	<div id="mainbody">

	<?php 
	require_once ( 'body.php' ); 
	?>
		
	</div> <!-- close div #mainbody -->
	
	<div id="footer">
		
		<div id="bottomlinks">
			<ul id="bottomnav">
				<li class="first">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=about" title="Learn more about how to make your health proxy and why it is so important.">About</a>
				</li>
				<li>|</li>
				<li>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=privacy" title="View our strict privacy policy.">Privacy</a>
				</li>
				<li>|</li>
				<li>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=disclaimer" title="View our strict privacy policy.">Legal Disclaimer</a>
				</li>				
				<li>|</li>
				<li class="last">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=contact" title="Let us know what you think!">Contact Us</a>
				</li>
			</ul> <!-- close ul #bottomnav -->
		</div> <!-- close div #bottomlinks -->
	
	</div> <!-- close div #footer -->

</div> <!-- close div #wrapper -->
</body>
</html>
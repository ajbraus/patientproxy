<?php 
	session_start();
	require_once ( 'config.php' );
	
	// call autoload to get only classes we need
	function __autoload ( $className ) {
		$className = str_replace ( "..", "", $className );
		require_once ( "classes/$className.php" );
	}

	
	
	require_once ( 'questionbuilder.php' );
	//require_once ( 'handler.php' );
	require_once ( 'customfunctions.php' );
	
	$pageTitle = '';
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
  echo '<title>Patient Proxy - ' . $pageTitle . '</title>';
?>

<link type="text/css" rel="stylesheet" href="style/blankstyle.css" />
<link type="text/css" rel="stylesheet" href="style/style.css" />
<script type="text/javascript" src="javascript/jquery.js"></script>    
<!--<script type="text/javascript" src="javascript/jquery.url.js"></script>    
<script type="text/javascript" src="javascript/functions.js"></script>-->
<script type="text/javascript" src="javascript/custom-form-elements.js"></script>
</head>

<body>
<div id="headercolor"></div>
<div id="wrapper">
	
	<div id="header">
	
		<div id="logo">
			<img src="images/logo.png" title="Patient Proxy Logo" alt="Patient Proxy Logo" />
			<h1 class="accessible">Patient Proxy</h1>
			<h3 class="accessible">Designate your health proxy.</h3>
		</div> <!-- close div #logo -->
		
		<div id="littlelinks">
			<ul id="topnav">
				<li class="first" id="pplink"><a href="#" title="Read the frequently asked questions.">FAQ</a></li>
				<li>|</li>
				<li><a href="#" title="View our strict privacy policy.">Privacy</a></li>				
				<li>|</li>
				<li class="last"><a href="#" title="">Other</a></li>
			</ul>
		</div> <!-- close div #littlelinks -->
		
	</div> <!-- close div #header -->
	<div id="mainbody">
	
	
	<?php require_once ( 'handler.php' ); ?>
	
	
		
	</div> <!-- close div #mainbody -->
	<div id="footer">
	</div> <!-- close div #footer -->

</div> <!-- close div #wrapper -->
</body>
</html>
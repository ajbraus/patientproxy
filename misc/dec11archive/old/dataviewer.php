<?php
session_start();
if ( isset ( $_SESSION['savedData'] ) )
	$savedData = $_SESSION['savedData'];
if ( isset ( $_SESSION['fieldIDList'] ) ) {
	$fieldIDList = $_SESSION['fieldIDList'];
	}
echo '<pre>';
echo 'SAVED DATA:<br />';
print_r ( $savedData );
echo '<br />FIELD ID LIST:<br />';
print_r ( $fieldIDList );
echo '</pre>';
?>
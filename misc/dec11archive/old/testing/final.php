<?php
	//set page name and get header
	$page_title = 'Final';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
	echo 'you are done.';
	foreach ($_SESSION as $key=>$val)
    echo $val . '<br />';
	require_once('footer.php');
?>
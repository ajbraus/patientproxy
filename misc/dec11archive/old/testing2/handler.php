<?php

if ( !empty ( $_POST ) ) {
	$answerVars = extract ( $_POST );
	$_SESSION = $_POST;
}

if ( !empty ( $_GET ) ) {
	$answerVars = extract ( $_GET );
	$_SESSION = $_GET;
}

	
if ( empty ( $_POST ) && empty ( $_GET ) ) {
	$pageName = $homePage;
}
else if ( isset ( $_GET['usstate'] ) ) {
	$questionSet = $generalState;
	$pageName = $questionSet[0];
	buildContent ( $pageName ); 
}
else {
	$text_page = $_POST['nextpage'];
	$result = textToObject ( $text_page, $questionSet );
	$pageName = $result;
}



					
echo '<pre>';
var_dump ( $_POST );
var_dump ( $pageName );
echo '</pre>';
pageNav ( $pageName, $questionSet, $mapPage );





?>
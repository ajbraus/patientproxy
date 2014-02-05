<?php

$objectName = new QuestionElement ( array (
	'idName' => '', 
	'labelText' => '', 
	'elementType' => '', 
	'fieldType' => '', 
	'subElements' => array(), 
	'helpText' => '',
	'isInputField' => 0,
	'fieldLength' => 'full',
	'pageTitle' => 'About You'
	)
);
	
/**
* EXAMPLE:
*	$patientInfo = new QuestionElement ( array (
*		'idName' => 'patientinfo', 
*			[ shortname for the object 
*			= same as object variable name but all lowercase ]
*		'labelText' => 'Enter your personal information.', 
*			[ any text that labels the element ]
*		'elementType' => 'page', 
*			[ options: ( page, formset, checkboxset, radioset,
*			initialset, inputelement ) ]
*		'fieldType' => '', 
*			[ options: ( form, radio, text, check, textarea, 
*			radio_select ) ]
*		'subElements' => array( $personData ), 
*			[ list of all $objects contained within 
*			this object ]
*		'helpText' => 'Here is some more info.', 
*			[ mostly applicable only to question blocks 
*			= the text that ought to display in the help box ]
*		'isInputField' => 0,
*			[ boolean. 1 = yes ]
*		'fieldLength' => 'full',
*			[ options: ( full, half, # of chars ) ]
*		'pageTitle' => 'About You'
*			[ title of page, if element is page block ]
*		)
*	);
**/
	
	
	
?>
<?php

// DEFAULT HOME & MAP PAGES
$homePage = new QuestionElement ( array (
			'idName' => 'homepage' )
);
$mapPage = new QuestionElement ( array (
			'idName' => 'mappage' )
);

// Patient Info
$fullName = new QuestionElement ( array (
	'idName' => 'fullname', 
	'labelText' => 'Full Name', 
	'elementType' => 'inputelement', 
	'fieldType' => 'text', 
	'subElements' => array(), 
	'helpText' => '',
	'isInputField' => 1,
	'fieldLength' => 'full'
	)
);
$streetAddress = new QuestionElement ( array (
	'idName' => 'streetaddress', 
	'labelText' => 'Street Address', 
	'elementType' => 'inputelement', 
	'fieldType' => 'text', 
	'subElements' => array(), 
	'helpText' => '',
	'isInputField' => 1,
	'fieldLength' => 'full'
	)
);
$city = new QuestionElement ( array (
	'idName' => 'city', 
	'labelText' => 'City', 
	'elementType' => 'inputelement', 
	'fieldType' => 'text', 
	'subElements' => array(), 
	'helpText' => '',
	'isInputField' => 1,
	'fieldLength' => 'half'
	)
);
$state = new QuestionElement ( array (
	'idName' => 'state', 
	'labelText' => 'State', 
	'elementType' => 'inputelement', 
	'fieldType' => 'text', 
	'subElements' => array(), 
	'helpText' => '',
	'isInputField' => 1,
	'fieldLength' => 2
	)
);
$zip = new QuestionElement ( array (
	'idName' => 'zip', 
	'labelText' => 'Zip', 
	'elementType' => 'inputelement', 
	'fieldType' => 'text', 
	'subElements' => array(), 
	'helpText' => '',
	'isInputField' => 1,
	'fieldLength' => 5
	)
);
$personData = new QuestionElement ( array (
	'idName' => 'persondata', 
	'labelText' => '', 
	'elementType' => 'formset', 
	'fieldType' => '', 
	'subElements' => array( $fullName, $streetAddress, $city, $state, $zip ), 
	'helpText' => '',
	'isInputField' => 0,
	'fieldLength' => ''
	)
);
$patientInfo = new QuestionElement ( array (
	'idName' => 'patientinfo', 
	'labelText' => 'Your Personal Information', 
	'elementType' => 'page', 
	'fieldType' => '', 
	'subElements' => array( $personData ), 
	'helpText' => 'Sample help text.',
	'isInputField' => 0,
	'fieldLength' => '',
	'pageTitle' => 'About You'
	)
);

// Health Proxy
$healthProxy = new QuestionElement ( array (
	'idName' => 'healthproxy', 
	'labelText' => 'Designate someone as your Health Proxy', 
	'elementType' => 'page', 
	'fieldType' => '', 
	'subElements' => array( $personData ), 
	'helpText' => 'Sample help text.',
	'isInputField' => 0,
	'fieldLength' => '',
	'pageTitle' => 'About Your Health Proxy'
	) 
);

// Alternate Health Proxy
$alternateHP = new QuestionElement ( array () );

// Proxy Expiration
$proxyExpiration = new QuestionElement ( array () );

// Authorize Health Records
$authHealthRecs = new QuestionElement ( array () );

// Living Will Applies
$livingWillApply = new QuestionElement ( array () );

// Life Sustaining Treatment
$lifeSustainTrmt = new QuestionElement ( array () );

// Artificial Nutrition and Hydration
$artNutrHydr = new QuestionElement ( array () );

// Pain and Suffering
$painSuffer = new QuestionElement ( array () );

// Additional Information
$ownWords = new QuestionElement ( array () );

// Living Will Expiration
$lwExpiration = new QuestionElement ( array () );

// Organ Donation
$organDonation = new QuestionElement ( array () );

// QUESTION SETS:
$generalState = array (
	$patientInfo,
	$healthProxy,
	$alternateHP,
	$proxyExpiration,
	$authHealthRecs,
	$livingWillApply,
	$lifeSustainTrmt,
	$artNutrHydr,
	$painSuffer,
	$ownWords,
	$lwExpiration,
	$organDonation
	);

?>
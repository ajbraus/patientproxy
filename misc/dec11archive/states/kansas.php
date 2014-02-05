<?php
$kansas = array (
	'patientInfo', //AJBdone
	'healthProxy', //AJBdone
	'alternateHP', //AJBdone
	'instructions', //AJBdone
	'limitations', //AJBdone
	'furtherDirections', //AJBdone
	'organDonation',//AJBdone
	);

// ########################### PATIENT INFO PAGE

// ############## PATIENT DATA FIELDSET
$fullName = new TextElement ( array (
	'idName' => 'fullName', 
	'labelText' => 'Full Name', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => 'full',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$birthDate = new TextElement ( array (
	'idName' => 'birthDate', 
	'labelText' => 'Birthday', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'date',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$usState = new TextElement ( array (
	'idName' => 'usState', 
	'labelText' => 'State', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '2',
	'cols' => '',
	'rows' => '')
	);
$patientData = new QuestionFieldSet ( array (
	'idName' => 'patientData', 
	'labelText' => '', 
	'childElements' => array ( $fullName, $birthDate, $usState, ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ______________ END PATIENT DATA FIELDSET

$patientInfo = new QuestionPage ( array (
	'idName' => 'patientInfo', 
	'labelText' => 'Your Personal Information.', 
	'childElements' => array ( $patientData ), 
	'pageTitleText' => 'Your Info', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);
// ____________________________ END PATIENT INFO PAGE

// ########################### HEALTH PROXY PAGE

// ############# PERSON DATA FIELDSET
$streetAddress = new TextElement ( array (
	'idName' => 'streetAddress', 
	'labelText' => 'Street Address', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$city = new TextElement ( array (
	'idName' => 'city', 
	'labelText' => 'City', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);
$zip = new TextElement ( array (
	'idName' => 'zip', 
	'labelText' => 'Zip', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '5',
	'cols' => '',
	'rows' => '')
	);
$phone = new TextElement ( array (
	'idName' => 'phone', 
	'labelText' => 'Phone', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$cellPhone = new TextElement ( array (
	'idName' => 'cellPhone', 
	'labelText' => 'Cell Phone', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$email = new TextElement ( array (
	'idName' => 'email', 
	'labelText' => 'Email', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$personData = new QuestionFieldSet ( array (
	'idName' => 'personData', 
	'labelText' => '', 
	'childElements' => array ( $fullName, $streetAddress, $city, $usState, $zip, $phone, $cellPhone, $email ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ____________ END PERSON DATA FIELDSET

$healthProxy = new QuestionPage ( array (
	'idName' => 'healthProxy', 
	'labelText' => 'Designate a Health Proxy.', 
	'childElements' => array ( $personData ), 
	'pageTitleText' => 'Health Proxy Info', 
	'helpText' => '')
	);
// ____________________________ END HEALTH PROXY PAGE


// ########################### ALTERNATE HP PAGE
$alternateHP = new QuestionPage ( array (
	'idName' => 'alternateHP', 
	'labelText' => 'Designate an Alternate Health Proxy.', 
	'childElements' => array ( $personData ), 
	'pageTitleText' => 'Alternate Health Proxy Info', 
	'helpText' => '')
	);
// ____________________________ END ALTERNATE HP PAGE

// ############################ INSRUCTIONS PAGE
$freeTextElement = new TextElement ( array (
	'idName' => 'freeTextElement', 
	'labelText' => '', 
	'childElements' => array (), 
	'inputType' => 'textarea',
	'required' => 'no',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '20',
	'rows' => '5')
	);

$freeTextElementSet = new QuestionFieldSet ( array (
	'idName' => 'freeTextElementSet', 
	'labelText' => '', 
	'childElements' => array ( $freeTextElement ), 
	'childrenType' => 'form',
	'required' => '')
	);

$instructionsSet = new QuestionFieldSet ( array (
	'idName' => 'instructionsSet', 
	'labelText' => 'In exercising the grant of authority set forth above my agent for health care decisions shall: (Here may be inserted any special instructions or statement of the principal’s desires to be followed by the agent in exercising the authority granted)', 
	'childElements' => array ( $freeTextElementSet ), 
	'childrenType' => 'form',
	'required' => 'no')
	);
	
$instructions = new QuestionPage ( array (
	'idName' => 'instructions', 
	'labelText' => '', 
	'childElements' => array ( $instructionsSet ), 
	'pageTitleText' => 'Desires and Instructions', 
	'helpText' => '')
	);
// ____________________________ INSTRUCTIONS PAGE

// ######################## LIMITATIONS AND PROHIBITIONS PAGE

$prohibitionsSet = new QuestionFieldSet ( array (
	'idName' => 'prohibitionsSet', 
	'labelText' => 'In exercising the grant of authority set forth above my agent for health care decisions shall: (Here may be inserted any special instructions or statement of the principal’s desires to be followed by the agent in exercising the authority granted)', 
	'childElements' => array ( $freeTextElementSet ), 
	'childrenType' => 'form',
	'required' => 'no')
	);

$limitationsSet = new QuestionFieldSet ( array (
	'idName' => 'limitationsSet', 
	'labelText' => 'In exercising the grant of authority set forth above my agent for health care decisions shall: (Here may be inserted any special instructions or statement of the principal’s desires to be followed by the agent in exercising the authority granted)', 
	'childElements' => array ( $freeTextElementSet ), 
	'childrenType' => 'form',
	'required' => 'no')
	);
	
$limitations = new QuestionPage ( array (
	'idName' => 'limitations', 
	'labelText' => '', 
	'childElements' => array ( $prohibitionsSet, $limitationsSet ), 
	'pageTitleText' => 'Limitations of Authority', 
	'helpText' => '')
	);

// ____________________________ LIMITATIONS AND PROHIBITIONS PAGE

$furtherDirectionsSet = new QuestionFieldSet ( array (
	'idName' => 'furtherDirectionsSet', 
	'labelText' => 'I further direct that:', 
	'childElements' => array ( $freeTextElementSet ), 
	'childrenType' => 'form',
	'required' => 'no')
	);	

$absence = new TextObject ( array (
	'idName' => 'absence',
	'textBody' => 'In the absence of my ability to give directions regarding the use of such life- sustaining procedures, it is my intention that this declaration shall be honored by my agent (if any), family, and physician(s) as the final expression of my legal right to refuse medical or surgical treatment and accept the consequences from such refusal.')
	);
	
$furtherDirections = new QuestionPage ( array (
	'idName' => 'furtherDirections', 
	'labelText' => 'If at any time I should have an incurable injury, disease, or illness certified to be a terminal condition by two physicians who have personally examined me, one of whom shall be my attending physician, and the physicians have determined that my death will occur whether or not life-sustaining procedures are utilized, and where the application of life-sustaining procedures would serve only to artificially prolong the dying process, I direct that such procedures be withheld or withdrawn, and that I be permitted to die naturally with only the administration of medication or the performance of any medical procedure deemed necessary to provide me with comfort care.', 
	'childElements' => array ( $furtherDirectionsSet, $absence ), 
	'pageTitleText' => 'Limitations of Authority', 
	'helpText' => '')
	);
	
// ################################### ORGAN DONATION PAGE

// ################ ORGAN TYPE FIELDSET
$anyNeeded = new SelectionElement ( array (
	'idName' => 'anyNeeded', 
	'labelText' => 'Any needed organs or parts.', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'anyNeeded',
	'defaultState' => '',
	'outputText' => '')
	);
	
$fullNameSet = new QuestionFieldSet ( array (
	'idName' => 'fullNameSet', 
	'labelText' => '', 
	'childElements' => array ( $fullName ), 
	'childrenType' => 'form',
	'required' => 'no')
	);
		
$theFollowing= new SelectionElement ( array (
	'idName' => 'theFollowing', 
	'labelText' => 'The following part or organs listed below:', 
	'childElements' => array ( $fullNameSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'theFollowing',
	'defaultState' => '',
	'outputText' => '')
	);	
	
$organsSet = new QuestionFieldSet ( array (
	'idName' => 'organsSet', 
	'labelText' => '', 
	'childElements' => array ( $anyNeeded, $theFollowing ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________________ ORGAN TYPE FIELDSET	

$anyPurpose = new SelectionElement ( array (
	'idName' => 'anyPurpose', 
	'labelText' => 'Any legally authorized purpose', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'anyPurpose',
	'defaultState' => '',
	'outputText' => '')
	);
	
$therapeutic = new SelectionElement ( array (
	'idName' => 'therapeutic', 
	'labelText' => 'Transplant or therapeutic purposes only.', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'therapeutic',
	'defaultState' => '',
	'outputText' => '')
	);	
	
$purposeSet = new QuestionFieldSet ( array (
	'idName' => 'purpose', 
	'labelText' => 'For (initial one):', 
	'childElements' => array ( $anyPurpose, $theraputic ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

// #################### DONATION CONSENT FIELDSET
$refuseToDonate = new SelectionElement ( array (
	'idName' => 'refuseToDonate', 
	'labelText' => 'I do not want to make an organ or tissue donation and I do not want my attorney for health care, proxy, or other agent or family to do so.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'refuseToDonate',
	'defaultState' => '',
	'outputText' => '')
	);
	
$writtenSigned = new SelectionElement ( array (
	'idName' => 'writtenSigned', 
	'labelText' => 'I have already signed a written agreement or donor card regarding organ and tissue donation with the following individual or institution:', 
	'childElements' => array ( $fullName ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'writtenSigned',
	'defaultState' => '',
	'outputText' => '')
	);	
	
$wishToDonate = new SelectionElement ( array (
	'idName' => 'wishToDonate', 
	'labelText' => 'Pursuant to Kansas law, I hereby give, effective on my death:', 
	'childElements' => array ( $organSet, $purposeSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'wishToDonate',
	'defaultState' => '',
	'outputText' => '')
	);

$wishRefuseToDonateSet = new QuestionFieldSet ( array (
	'idName' => 'wishRefuseToDonateSet', 
	'labelText' => '', 
	'childElements' => array ( $refuseToDonate, $writtenSigned, $wishToDonate ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________________ DONATION CONSENT FIELDSET
	
	
$organDonation = new QuestionPage ( array ( 
	'idName' => 'organDonation', 
	'labelText' => 'Choose the line next to the statement below that best reflects your wishes.', 
	'childElements' => array ( $wishRefuseToDonateSet ), 
	'pageTitleText' => 'Organ and Tissue Donation', 
	'helpText' => 'You do not have to initial any of the statements. If you do not initial any of the statements, your agent, guardian, or your family, may have the authority to make a gift of all or part of your body under Kansas law.')
	);
	
?>
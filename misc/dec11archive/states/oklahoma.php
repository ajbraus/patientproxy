<?php
$oklahoma = array (
	'terminalCondition', 
	'persistentlyUnconscious', 
	'endStageCondition', 
	'generalInstructions',
	'patientInfo', 
	'healthProxy', 
	'alternateHP', 
	'furtherDirections', 
	'organDonation',
	'generalProvisions' 
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
	'helpText' => '')
	);
// ____________________________ END PATIENT INFO PAGE

// ################# LIFE SUSTAINING TREATMENT SET 
$lSYes = new SelectionElement ( array (
	'idName' => 'lSYes', 
	'labelText' => 'I direct that my life not be extended by life-sustaining treatment, except that if I am unable to take food by water by mouth, I wish to receive artificially administered nutrition and hydration.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lSYes',
	'defaultState' => '',
	'outputText' => '')
	);	

$lSNo= new SelectionElement ( array (
	'idName' => 'lSNo', 
	'labelText' => 'I direct that my life not be extended by life-sustaining treatment, including artificially administered nutrition and hydration.', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lSNo',
	'defaultState' => '',
	'outputText' => '')
	);

$lSMD = new SelectionElement ( array (
	'idName' => 'lSMD', 
	'labelText' => 'I direct that I be given life-sustaining treatment and, if I am unable to take food and water by mouth, I wish to receive artificially administered nutrition and hydration.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lSMD',
	'defaultState' => '',
	'outputText' => '')
	);	

	
$lSSet = new QuestionFieldSet ( array (
	'idName' => 'lSSet', 
	'labelText' => '', 
	'childElements' => array ( $lSYes, $lSNo, $lSMD ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// __________________ LIFE SUSTAINING TREATMENT SET 

$terminalCondition = new QuestionPage ( array (
	'idName' => 'terminalCondition', 
	'labelText' => 'If I have a terminal condition, that is, an incurable and irreversible condition that even with the administration of life-sustaining treatment will, in the opinion of the attending physician and another physician, result in death within six (6) months:', 
	'childElements' => array ( $lSSet ), 
	'pageTitleText' => 'Terminal Condition', 
	'helpText' => '')
	);

$persistentlyUnconscious = new QuestionPage ( array (
	'idName' => 'persistentlyUnconscious', 
	'labelText' => 'If I am persistently unconscious, that is, I have an irreversible condition, as determined by the attending physician and another physician, in which thought and awareness of self and environment are absent:', 
	'childElements' => array ( $lSSet ), 
	'pageTitleText' => 'Terminal Condition', 
	'helpText' => '')
	);

$endStageCondition = new QuestionPage ( array (
	'idName' => 'endStageCondition', 
	'labelText' => 'If I have an end-stage condition, that is, a condition caused by injury, disease, or illness, which results in severe and permanent deterioration indicated by incompetency and complete physical dependency for which treatment of the irreversible condition would be medically ineffective:', 
	'childElements' => array ( $lSSet ), 
	'pageTitleText' => 'End-Stage Condition', 
	'helpText' => '')
	);

// ##################### FREE TEXT SET
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
// _____________________ FREE TEXT SET

$generalInstructions = new QuestionPage ( array (
	'idName' => 'generalInstructions', 
	'labelText' => 'Other. Here you may:
	(a) describe other conditions in which you would want life- sustaining treatment or artificially administered nutrition and hydration provided, withheld, or withdrawn;
	(b) give more specific instructions about your wishes concerning life-sustaining treatment or artificially administered nutrition and hydration if you have a terminal condition, are persistently unconscious, or have an end-stage condition; or
	(c) do both of these.', 
	'childElements' => array ( $freeTextElementSet), 
	'pageTitleText' => 'Other Instructions', 
	'helpText' => '')
	);
	
// ################################# HEALTH PROXY & ALTERNATE PAGES

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
	'helpText' => 'NOTE: You may not appoint your doctor, an employee of your doctor, or an
	owner, operator or employee of your health care facility, unless that person is
	related to you by blood, marriage or adoption or that person was appointed
	before your admission into the health care facility.')
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

// __________________________________ HEALTH PROXY & ALTERNATE PAGES
	
$furtherDirectionsSet = new TextObject ( array (
	'idName' => 'notInitialedFT',
	'textBody' => 'When making health-care decisions for me, my health care proxy should think about what action would be consistent with past conversations we have had, my treatment preferences as expressed in this document, my religious and other beliefs and values, and how I have handled medical and other important issues in the past. If what I would decide is still unclear, then my health care proxy should make decisions for me that my health care proxy believes are in my best interest, considering the benefits, burdens, and risks of my current circumstances and treatment options.
	
	I further direct that:')
	);
	
$furtherDirections = new QuestionPage ( array (
	'idName' => 'furtherDirections', 
	'labelText' => '', 
	'childElements' => array ( $freeTextElementSet), 
	'pageTitleText' => 'Further Directions', 
	'helpText' => '')
	);

// ############################### ORGAN DONATION PAGE

$transplantation = new SelectionElement ( array (
	'idName' => 'transplantation', 
	'labelText' => 'Transplantation', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'transplantation',
	'defaultState' => '',
	'outputText' => '')
	);

$therapy= new SelectionElement ( array (
	'idName' => 'therapy', 
	'labelText' => 'Therapy', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'therapy',
	'defaultState' => '',
	'outputText' => '')
	);

$medicalScience= new SelectionElement ( array (
	'idName' => 'medicalScience', 
	'labelText' => 'Advancement of medical sciences, research, or education', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'medicalScience',
	'defaultState' => '',
	'outputText' => '')
	);
	
$dentalScience= new SelectionElement ( array (
	'idName' => 'dentalScience', 
	'labelText' => 'Advancement of dental sciences, research, or education', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'dentalScience',
	'defaultState' => '',
	'outputText' => '')
	);
	
$organs = new QuestionFieldSet ( array (
	'idName' => 'personData', 
	'labelText' => 'Pursuant to the provisions of the Oklahoma Uniform Anatomical Gift Act, I direct that at the time of my death my entire body or designated body organs or body parts be donated for purposes of:', 
	'childElements' => array ( $transplantation, $therapy, $medicalScience, $dentalScience ), 
	'childrenType' => 'checkbox',
	'required' => '')
	);

$entireBody= new SelectionElement ( array (
	'idName' => 'entireBody', 
	'labelText' => 'My entire body; or', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'entireBody',
	'defaultState' => '',
	'outputText' => '')
	);

$followingOrgans= new SelectionElement ( array (
	'idName' => 'followingOrgans', 
	'labelText' => 'The following organs or body parts', 
	'childElements' => array ( $freeTextElement ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'followingOrgans',
	'defaultState' => '',
	'outputText' => '')
	);

$donate = new QuestionFieldSet ( array (
	'idName' => 'donate', 
	'labelText' => 'Death means either irreversible cessation of circulatory and respiratory functions or irreversible cessation of all functions of the entire brain, including the brain stem. I specifically donate:', 
	'childElements' => array ( $entireBody, $followingOrgans ), 
	'childrenType' => 'radio',
	'required' => '')
	);
	
$organDonation = new QuestionPage ( array (
	'idName' => 'furtherDirections', 
	'labelText' => '', 
	'childElements' => array ( $donate ), 
	'pageTitleText' => 'Anatomical Gifts (Organ Donation)', 
	'helpText' => '')
	);
	

?>

	
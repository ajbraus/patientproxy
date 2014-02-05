<?php
$kentucky = array (
	'patientInfo', //AJBdone
	'healthProxy', //AJBdone
	'alternateHP', //AJBdone
	'otherInstructions', //AJBdone
	'livingWill', //AJBdone
	'prolongLife', //AJBdone
	'nutrition', //AJBdone
	'organDonation',//AJBdone
	'otherDirections'//AJBdone
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

// ################# FREE TEXT ELEMENT SET

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
	'rows' => '6')
	);

$freeTextElementSet = new QuestionFieldSet ( array (
	'idName' => 'freeTextElementSet', 
	'labelText' => '', 
	'childElements' => array ( $freeTextElement ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ______________ FREE TEXT ELEMENT SET

$otherInstructions = new QuestionPage ( array (
	'idName' => 'otherInstructions', 
	'labelText' => 'I give the following instructions as further guidance to my surrogate [Health Proxy]', 
	'childElements' => array ( $freeTextElementSet ), 
	'pageTitleText' => 'Other Instructions', 
	'helpText' => '')
	);

// ############################## LIVING WILL PAGE

$LivingWillSet = new TextObject ( array (
	'idName' => 'LivingWillSet',
	'textBody' => 'In the absence of my ability to give directions regarding the use of life- prolonging treatment and artificially-provided nutrition and hydration, it is my intention that this directive shall be honored by my attending physician, my family, and any surrogate designated pursuant to this directive as the final expression of my legal right to refuse medical or surgical treatment and I accept the consequences of the refusal.
	If I have been diagnosed as pregnant and that diagnosis is known to my attending physician, directions regarding life-prolonging treatments and artificially-provided nutrition and hydration in this directive shall have no force or effect during the course of my pregnancy.
	I understand the full meaning and significance of this directive and I am emotionally and mentally competent to make this directive.')
	);

$livingWill = new QuestionPage ( array (
	'idName' => 'LivingWill', 
	'labelText' => '', 
	'childElements' => array ( $personData ), 
	'pageTitleText' => 'Living Will', 
	'helpText' => '')
	);

// ________________________________ LIVING WILL PAGE

// ############################# LIFE PROLONGING TREATMENT PAGE
$lpTreatement = new SelectionElement ( array (
	'idName' => 'lpTreatement', 
	'labelText' => 'I direct that life-prolonging treatment be withheld or withdrawn, and that I be permitted to die naturally with only the administration of medication or the performance of any medical treatment deemed necessary to alleviate pain.', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'lpTreatement',
	'defaultState' => '',
	'outputText' => '')
	);

$lpTreatmentNo = new SelectionElement ( array (
	'idName' => 'lpTreatmentNo', 
	'labelText' => 'I DO NOT authorize that life-prolonging treatment be withheld or withdrawn.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'lpTreatmentNo',
	'defaultState' => '',
	'outputText' => '')
	);

$prolongLifeSet = new QuestionFieldSet ( array (
	'idName' => 'prolongLifeSet', 
	'labelText' => '', 
	'childElements' => array ( $lpTreatement, $lpTreatmentNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________________ DONATION CONSENT FIELDSET
	
$prolongLife = new QuestionPage ( array ( 
	'idName' => 'prolongLife', 
	'labelText' => '', 
	'childElements' => array ( $prolongLifeSet ), 
	'pageTitleText' => 'Life-Prolonging Treatment', 
	'helpText' => 'If I do not designate a surrogate [Heath Proxy], the following are my directions to my attending physician. If I have designated a surrogate [Health Proxy], my surrogate shall comply with my wishes as indicated below:')
	);
// _____________________________ LIFE PROLONGING TREATMENT PAGE


// ############################# ARTIFICIALLY-PROVIDED NUTRITION AND HYDRATION PAGE
$authorize = new SelectionElement ( array (
	'idName' => 'authorize', 
	'labelText' => 'I authorize the withholding or withdrawal of artificially provided food, water, or other artificially provided nourishment or fluids.', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'authorize',
	'defaultState' => '',
	'outputText' => '')
	);

$doNotAuthorize = new SelectionElement ( array (
	'idName' => 'doNotAuthorize', 
	'labelText' => 'I DO NOT authorize the withholding or withdrawal of artificially provided food, water, or other artificially provided nourishment or fluids.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'doNotAuthorize',
	'defaultState' => '',
	'outputText' => '')
	);

$authSurrogate = new SelectionElement ( array (
	'idName' => 'authSurrogate', 
	'labelText' => 'I authorize my surrogate, designated above, to withhold or withdraw artificially provided nourishment or fluids, or other treatment if the surrogate determines that withholding or withdrawing is in my best interest; but I do not mandate that withholding or withdrawing.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'authSurrogate',
	'defaultState' => '',
	'outputText' => '')
	);

$nutritionSet = new QuestionFieldSet ( array (
	'idName' => 'nutritionSet', 
	'labelText' => '', 
	'childElements' => array ( $authorize, $doNotAuthorize, $authSurrogate ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________________ DONATION CONSENT FIELDSET
	
$nutrition = new QuestionPage ( array ( 
	'idName' => 'nutrition', 
	'labelText' => '', 
	'childElements' => array ( $nutritionSet ), 
	'pageTitleText' => 'Nutrition and Hydration', 
	'helpText' => '')
	);
// _____________________________ ARTIFICIALLY-PROVIDED NUTRITION AND HYDRATION PAGE
	

// ############################ ORGAN DONATION PAGE

$wishToDonate = new SelectionElement ( array (
	'idName' => 'wishToDonate', 
	'labelText' => 'I authorize the giving of all or any part of my body upon death for any purpose specified in KRS 311.185.', 
	'childElements' => array ( ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'wishToDonate',
	'defaultState' => '',
	'outputText' => '')
	);

$refuseToDonate = new SelectionElement ( array (
	'idName' => 'refuseToDonate', 
	'labelText' => 'I DO NOT authorize the giving of all or any part of my body upon my death.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'refuseToDonate',
	'defaultState' => '',
	'outputText' => '')
	);

$wishRefuseToDonateSet = new QuestionFieldSet ( array (
	'idName' => 'wishRefuseToDonateSet', 
	'labelText' => '', 
	'childElements' => array ( $wishToDonate, $refuseToDonate ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________________ DONATION CONSENT FIELDSET
	
$organDonation = new QuestionPage ( array ( 
	'idName' => 'organDonation', 
	'labelText' => '', 
	'childElements' => array ( $wishRefuseToDonateSet ), 
	'pageTitleText' => 'Organ and Tissue Donation', 
	'helpText' => '')
	);
// ______________________________ ORGAN DONATION PAGE

$otherDirections = new QuestionPage ( array (
	'idName' => 'otherDirections', 
	'labelText' => 'Other directions:', 
	'childElements' => array ( $freeTextElementSet ), 
	'pageTitleText' => 'Other Directions', 
	'helpText' => '')
	);
	
?>
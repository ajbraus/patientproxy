<?php

$wisconsin = array (
	'patientInfo', //AJBdone
	'healthProxy', //AJBdone
	'nursingHome', //AJBdone
	'feedingTube',
	'pregnantWomen',
	'statementDesires', //AJBdone
	'physicalMental', //AJBdone
	'terminalCondition',
	'pvsLifeTube',
	'copyLocation',
	'organDonation'
	);
	
// ########################### PATIENT INFO PAGE

// ############ PATIENT DATA FIELDSET

$fullName = new TextElement ( array (
	'idName' => 'fullName', 
	'labelText' => 'Full Name', 
	'childElements' => array(), 
	'inputType' => 'text',
	'required' => 'yes',
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
	'required' => 'yes',
	'validationType' => 'date',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
	
$streetAddress = new TextElement ( array (
	'idName' => 'streetAddress', 
	'labelText' => 'Street Address', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => 'yes',
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
	'required' => 'yes',
	'validationType' => 'none',
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
	'required' => 'yes',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '2',
	'cols' => '',
	'rows' => '')
	);
$zip = new TextElement ( array (
	'idName' => 'zip', 
	'labelText' => 'Zip', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => 'yes',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '5',
	'cols' => '',
	'rows' => '')
	);
$patientData = new QuestionFieldSet ( array (
	'idName' => 'patientData', 
	'labelText' => '', 
	'childElements' => array ( $fullName, $birthDate, $streetAddress, $city, $usState, $zip ), 
	'childrenType' => 'form',
	'required' => '')
	);

// _____________ END PATIENT DATA FIELDSET

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

$personData = new QuestionFieldSet ( array (
	'idName' => 'personData', 
	'labelText' => '', 
	'childElements' => array ( $fullName, $streetAddress, $city, $usState, $zip ), 
	'childrenType' => 'form',
	'required' => '')
	);

// ____________ END PERSON DATA FIELDSET

$healthProxy = new QuestionPage ( array (
	'idName' => 'healthProxy', 
	'labelText' => 'Designate a Health Proxy.', 
	'childElements' => array ( $personData ), 
	'pageTitleText' => 'Health Proxy Info', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);
	
// ____________________________ END HEALTH PROXY PAGE


// ########################### ALTERNATE HP PAGE

$alternateHP = new QuestionPage ( array (
	'idName' => 'alternateHP', 
	'labelText' => 'Designate an Alternate Health Proxy.', 
	'childElements' => array ( $personData ), 
	'pageTitleText' => 'Alternate Health Proxy Info', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);
	
// ____________________________ END ALTERNATE HP PAGE


// ###########################  NURSING HOMES PAGE

// ############ BEGIN NURSING HOME & COMMUNITY RESIDENCE FIELDSETS 


$radioNursingYes = new SelectionElement ( array (
	'idName' => 'radioNursingYes', 
	'labelText' => 'Yes', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'Yes',
	'defaultState' => '',
	'outputText' => 'My health care agent may admit me to a nursing home for a purpose other than recuperative care or respite care.')
	);
	
$radioNursingNo = new SelectionElement ( array (
	'idName' => 'radioNursingNo', 
	'labelText' => 'No', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'No',
	'defaultState' => '',
	'outputText' => 'My health care agent may not admit me to a nursing home for a purpose other than recuperative care or respite care.')
	);

$nursingHome = new QuestionFieldSet ( array (
	'idName' => 'nursingHome', 
	'labelText' => 'A nursing home', 
	'childElements' => array ( $radioNursingYes, $radioNursingNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

$radioCommunityYes = new SelectionElement ( array (
	'idName' => 'radioCommunityYes', 
	'labelText' => 'Yes', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'Yes',
	'defaultState' => '',
	'outputText' => 'My health care agent may admit me to a community-based residential facility for a purpose other than recuperative care or respite care.')
	);
	
$radioCommunityNo = new SelectionElement ( array (
	'idName' => 'radioCommunityNo', 
	'labelText' => 'No', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'No',
	'defaultState' => '',
	'outputText' => 'My health care agent may not admit me to a community-based residential facility for a purpose other than recuperative care or respite care.')
	);

$communityResidence = new QuestionFieldSet ( array (
	'idName' => 'communityResidence', 
	'labelText' => 'A community-based residential facility:', 
	'childElements' => array ( $radioCommunityYes, $radioCommunityNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

// ______________ END NURSING HOME & COMMUNITY RESIDENCE FIELDSETS

$nursingHome = new QuestionPage ( array (
	'idName' => 'nursingHome', 
	'labelText' => 'My health care agent may admit me to a nursing home or community- based residential facility for short -term stays for recuperative care or respite care. If I have initialed “Yes” in the following, my health care agent may admit me for a purpose other than recuperative care or respite care, but if I have initialed “No” to the following, my health care agent may not so admit me:', 
	'childElements' => array ( $nursingHome, $communityResidence ), 
	'pageTitleText' => 'Nursing Home & Community Residence', 
	'helpText' => '')
	);

// ______________________________ END NURSING HOME PAGE


// ############################# BEGIN FEEDING TUBE PAGE




// _______________________________ END FEEDING TUBE PAGE


// ############################## BEGIN PREGNANT WOMAN PAGE



// _______________________________ END PREGNANT WOMAN PAGE


// ############################### BEGIN STATEMENT OF DESIRES PAGE


$desiresLimitations = new TextElement ( array (
	'idName' => 'desiresLimitations', 
	'labelText' => 'In exercising authority under this document, my health care agent shall act consistently with my following stated desires, if any, and is subject to any special provisions or limitations that I specify. The following are specific desires, provisions or limitations that I wish to state:', 
	'childElements' => array (), 
	'inputType' => 'textarea',
	'required' => 'no',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '20',
	'rows' => '6')
	);
	
$statementDesires = new QuestionPage ( array (
	'idName' => 'statementDesires', 
	'labelText' => 'In exercising authority under this document, my health care agent shall act consistently with my following stated desires, if any, and is subject to any special provisions or limitations that I specify. The following are specific desires, provisions or limitations that I wish to state:', 
	'childElements' => array ( $desiresLimitations ), 
	'pageTitleText' => 'Question One Title', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);

// _______________________________ END STATEMENT OF DESIRES PAGE


// ############################### BEGIN PHYSICAL AND MENTAL HEALTH PAGE

$requestReview = new SelectionElement ( array (
	'idName' => 'radioQuestionOne', 
	'labelText' => 'Request, review and receive any information, oral or written, regarding my physical or mental health, including medical and hospital records.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'optionOne',
	'defaultState' => '',
	'outputText' => 'My health care agent has	the authority to request, review and receive any information, oral or written, regarding my physical or mental health, including medical and hospital records.')
	);

$executeDocs = new SelectionElement ( array (
	'idName' => 'executeDocs', 
	'labelText' => 'Execute on my behalf any documents that may be required in order to obtain this information', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'optionTwo',
	'defaultState' => '',
	'outputText' => 'My health care agent has	the authority to execute on my behalf any documents that may be required in order to obtain information, oral or written, regarding my physical or mental health, including medical and hospital records.')
	);

$consentDisclosure = new SelectionElement ( array (
	'idName' => 'consentDisclosure', 
	'labelText' => 'Consent to the disclosure of this information.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'optionThree',
	'defaultState' => 'checked',
	'outputText' => 'My health care agent has	the authority to consent to the disclosure of information, oral or written, regarding my physical or mental health, including medical and hospital records.')
	);
	
$physicalMental = new QuestionPage ( array (
	'idName' => 'physicalMentalDisclosure', 
	'labelText' => 'Subject to any limitations in this document, my health care agent has
	the authority to do all of the following:', 
	'childElements' => array ( $requestReview, $executeDocs, $consentDisclosure ), 
	'pageTitleText' => 'Disclosure of Medical Information', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);

// _______________________________ END PHYSICAL AND MENTAL HEALTH PAGE




$testQuestionSet = array ( 'questionPageOne', 'questionPageTwo' );

$textBoxQuestionOne = new TextElement ( array (
	'idName' => 'textBoxQuestionOne', 
	'labelText' => 'First Field', 
	'childElements' => array(), 
	'inputType' => 'text',
	'required' => 'yes',
	'validationType' => 'none',
	'width' => 'full',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);

$textAreaQuestionTwo = new TextElement ( array (
	'idName' => 'textAreaQuestionTwo', 
	'labelText' => 'Second Field', 
	'childElements' => array (), 
	'inputType' => 'textarea',
	'required' => 'no',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '20',
	'rows' => '3')
	);

$radioQuestionOne = new SelectionElement ( array (
	'idName' => 'radioQuestionOne', 
	'labelText' => 'Pick Me.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'optionOne',
	'defaultState' => '',
	'outputText' => '')
	);

$radioQuestionTwo = new SelectionElement ( array (
	'idName' => 'radioQuestionTwo', 
	'labelText' => 'Or Me.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'optionTwo',
	'defaultState' => '',
	'outputText' => '')
	);

$radioQuestionThree = new SelectionElement ( array (
	'idName' => 'radioQuestionThree', 
	'labelText' => 'No Thanks.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'optionThree',
	'defaultState' => 'checked',
	'outputText' => '')
	);

$fieldSetThree = new QuestionFieldSet ( array (
	'idName' => 'fieldSetThree', 
	'labelText' => 'Please select from these options.', 
	'childElements' => array ( $radioQuestionOne, $radioQuestionTwo, $radioQuestionThree ), 
	'childrenType' => 'radio',
	'required' => '')
	);

$checkboxQuestionOne = new SelectionElement ( array (
	'idName' => 'checkboxQuestionOne', 
	'labelText' => 'This Selection looks good.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => 'no',
	'validationType' => 'none',
	'choiceValue' => 'optionOne',
	'defaultState' => '',
	'outputText' => '')
	);

$checkboxQuestionTwo = new SelectionElement ( array (
	'idName' => 'checkboxQuestionTwo', 
	'labelText' => 'This Selection looks better.', 
	'childElements' => array ( $fieldSetThree ) , 
	'inputType' => 'checkbox',
	'required' => 'no',
	'validationType' => 'none',
	'choiceValue' => 'optionTwo',
	'defaultState' => 'checked',
	'outputText' => '')
	);

$checkboxQuestionThree = new SelectionElement ( array (
	'idName' => 'checkboxQuestionThree', 
	'labelText' => 'This Selection looks terrible.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => 'no',
	'validationType' => 'none',
	'choiceValue' => 'optionThree',
	'defaultState' => '',
	'outputText' => '')
	);

$radioYes = new SelectionElement ( array (
	'idName' => 'radioYes', 
	'labelText' => 'Yes', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'yes',
	'defaultState' => '',
	'outputText' => '')
	);
	
$radioNo = new SelectionElement ( array (
	'idName' => 'radioNo', 
	'labelText' => 'No', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'no',
	'defaultState' => '',
	'outputText' => '')
	);

$fieldSetOne = new QuestionFieldSet ( array (
	'idName' => 'fieldSetOne', 
	'labelText' => '', 
	'childElements' => array ( $textBoxQuestionOne, $textAreaQuestionTwo ), 
	'childrenType' => 'form',
	'required' => '')
	);
	
$fieldSetTwo = new QuestionFieldSet ( array (
	'idName' => 'fieldSetTwo', 
	'labelText' => 'Please choose.', 
	'childElements' => array ( $checkboxQuestionOne, $checkboxQuestionTwo, 

$checkboxQuestionThree ), 
	'childrenType' => 'checkbox',
	'required' => '')
	);
	
$fieldSetFour = new QuestionFieldSet ( array (
	'idName' => 'fieldSetFour', 
	'labelText' => 'You can choose yes or no, but you have to choose.', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'yes')
	);
	
$questionPageOne = new QuestionPage ( array (
	'idName' => 'questionPageOne', 
	'labelText' => 'State the general question here.', 
	'childElements' => array ( $fieldSetOne ), 
	'pageTitleText' => 'Question One Title', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);
	
$questionPageTwo = new QuestionPage ( array (
	'idName' => 'questionPageTwo', 
	'labelText' => 'State the next general question here.', 
	'childElements' => array ( $fieldSetTwo, $fieldSetFour ), 
	'pageTitleText' => 'Question Two Title', 
	'helpText' => 'More info. Displayed on an as-needed basis.')
	);
	
?>
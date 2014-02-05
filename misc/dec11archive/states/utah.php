<?php

$utah = array (
	'patientInfo', //AJBdone
	'healthProxy', //AJBdone
	'agentAuthority', //AJBdone
	'guardianship', //AJBdone
	'researchDonation', //AJBdone
	'livingWill', //AJBdone
	'organDonation',//AJBdone
	'additionalInstructions' //AJBdone
	);
	
// ########################### PATIENT INFO PAGE

// ############ PATIENT DATA FIELDSET
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
	'labelText' => 'Daytime Phone', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '13',
	'cols' => '',
	'rows' => '')
	);

$cellPhone = new TextElement ( array (
	'idName' => 'cellPhone', 
	'labelText' => 'Evening Phone', 
	'childElements' => array (), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '13',
	'cols' => '',
	'rows' => '')
	);
$patientData = new QuestionFieldSet ( array (
	'idName' => 'patientData', 
	'labelText' => '', 
	'childElements' => array ( $fullName, $streetAddress, $city, $usState, $zip, $birthDate, $phone, $cellPhone ), 
	'childrenType' => 'form',
	'required' => '')
	);
// _____________ END PATIENT DATA FIELDSET

$patientInfo = new QuestionPage ( array (
	'idName' => 'patientInfo', 
	'labelText' => 'Your Personal Information.', 
	'childElements' => array ( $patientData ), 
	'pageTitleText' => 'Your Information', 
	'helpText' => '')
	);

// ____________________________ END PATIENT INFO PAGE


// ########################### HEALTH PROXY PAGE

// ################## NO AGENT FEILDSET
$noAgent = new SelectionElement ( array (
	'idName' => 'noAgent', 
	'labelText' => 'I do not want to choose an agent.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'noAgent',
	'defaultState' => '',
	'outputText' => '')
	);
	
$noAgentSet = new QuestionFieldSet ( array (
	'idName' => 'personData', 
	'labelText' => 'If you do not want to name a health agent: initial the box below, and click "Continue" below to go on. Do not name an agent below. No one can force you to name an agent.', 
	'childElements' => array ( $noAgent ), 
	'childrenType' => 'checkbox',
	'required' => '')
	);
// ____________________ NO AGENT FIELDSET

// ############# PERSON DATA FIELDSET
$personData = new QuestionFieldSet ( array (
	'idName' => 'personData', 
	'labelText' => 'My Agent', 
	'childElements' => array ( $fullName, $streetAddress, $city, $usState, $zip, $phone, $cellPhone ), 
	'childrenType' => 'form',
	'required' => '')
	);
	
$alternatePersonData = new QuestionFieldSet ( array (
	'idName' => 'alternatePersonData', 
	'labelText' => 'This person will serve as your agent if your agent, named above, is unable or unwilling to serve.', 
	'childElements' => array ( $fullName, $streetAddress, $city, $usState, $zip, $phone, $cellPhone ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ____________ END PERSON DATA FIELDSET

$healthProxy = new QuestionPage ( array (
	'idName' => 'healthProxy', 
	'labelText' => 'Designate a Health Proxy. (optional)', 
	'childElements' => array ( $noAgentSet, $personData, $alternatePersonData ), 
	'pageTitleText' => 'Health Proxy and Alternate', 
	'helpText' => '')
	);

// ____________________________ END HEALTH PROXY PAGE


// ###########################  AGENT'S AUHTORITY PAGE

// ################## MEDICAL RECORDS AND ADMISSION FIELDSETS
$radioYes = new SelectionElement ( array (
	'idName' => 'radioYes', 
	'labelText' => 'Yes', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'radioYes',
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
	'choiceValue' => 'radioNo',
	'defaultState' => '',
	'outputText' => '')
	);

$medicalRecordsSet = new QuestionFieldSet ( array (
	'idName' => 'medicalRecords', 
	'labelText' => 'Get copies of my medical records at any time, even when I can speak for myself.', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

$admissionSet = new QuestionFieldSet ( array (
	'idName' => 'admissionSet', 
	'labelText' => 'Admit me to a licensed health care facility, such as a hospital, nursing home, assisted living, or other congregate facility for long-term placement other than convalescent or recuperative care, unless I agree to be admitted at that time.', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// __________________ MEDICAL RECORDS AND ADMISSION FIELDSETS

// ################## EXPAND POWERS FIELDSET
$expandPowers = new TextElement ( array (
	'idName' => 'expandPowers', 
	'labelText' => '', 
	'childElements' => array (), 
	'inputType' => 'textarea',
	'required' => 'no',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '20',
	'rows' => '3')
	);

$expandPowersSet = new QuestionFieldSet ( array (
	'idName' => 'expandPowersSet', 
	'labelText' => 'I wish to limit or expand the powers of my health care agent as follows:', 
	'childElements' => array ( $expandPowers), 
	'childrenType' => 'form',
	'required' => 'no')
	);	
// _________________ EXPAND POWERS FEILDSET

$agentAuthority = new QuestionPage ( array (
	'idName' => 'agentAuthority', 
	'labelText' => 'My agent has the powers below ONLY IF I initial the "Yes" option that follows the statement. I authorize my agent to:', 
	'childElements' => array ( $medicalRecorsSet, $admissionSet, $expandPowersSet ), 
	'pageTitleText' => 'Other Authority', 
	'helpText' => '')
	);

// ___________________________ AGENT'S AUTHORITY PAGE


// ########################### GUARDIANSHIP PAGE

// ############ GUARDIANSHIP FIELDSETS 
$guardianshipSet = new QuestionFieldSet ( array (
	'idName' => 'guardianship', 
	'labelText' => '', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
	
	TEXT ELEMENT: I being of sound mind and not under duress, fruad, or other undue influence, do herby nominate my agent, or if my agent is unable or unwilling to serve, I hereby nominate my alternate agent, to serve as my guardian in the event that, after the date of this instrument, I become incapacitated.
// _______________ GUARDIANSHIP FIELDSETS

$guardianship = new QuestionPage ( array (
	'idName' => 'guardianship', 
	'labelText' => 'Even though appointing an agent should help you avoid a guardianship, a guardianship might still be necessary, choose the "Yes" option if you want the court to appoint your agent or, if your agent is unable or unwilling to serve, your alternative agent, to serve as your guardian, if a guardianship is ever necessary.', 
	'childElements' => array ( $guardianshipSet), 
	'pageTitleText' => 'Guardianship', 
	'helpText' => '')
	);
	
// ______________________________ GUARDIANSHIP PAGE

// ############################## MEDICAL RESEARCH AND ORGAN DONATION FIELDSETS AND PAGE

$medicalResearch = new QuestionFieldSet ( array (
	'idName' => 'medicalResearch', 
	'labelText' => 'I authorize my agent to consent to my participation in medical research or clinical trails, even if I may not benefit from the results.', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

$organDonation = new QuestionFieldSet ( array (
	'idName' => 'organDonation', 
	'labelText' => 'If I have not otherwise agreed to organ donation, my agent may consent to the donation of my organs for the purpose of organ transplantation.', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

$researchDonation = new QuestionPage ( array (
	'idName' => 'researchDonation', 
	'labelText' => '', 
	'childElements' => array ( $nursingHome, $communityResidence ), 
	'pageTitleText' => 'Research and Organ Donation', 
	'helpText' => '')
	);

// ______________________________ MEDICAL RESEARCH AND ORGAN DONATION FIELDSETS AND PAGE


// ############################# HEALTH CARE WISHES (LIVING WILL)

// ################ LIMITATIONS TO CARE FIELDSETS

$progressiveIllness = new SelectionElement ( array (
	'idName' => 'progressiveIllness', 
	'labelText' => 'I have a progressive illness that will cause my death', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'progressiveIllness',
	'defaultState' => 'checked',
	'outputText' => '')
	);

$closeToDeath = new SelectionElement ( array (
	'idName' => 'closeToDeath', 
	'labelText' => 'I am close to death and am unlikely to recover.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'closeToDeath',
	'defaultState' => 'checked',
	'outputText' => '')
	);

$cannotCommunicate = new SelectionElement ( array (
	'idName' => 'cannotCommunicate', 
	'labelText' => 'I cannot communicate and it is unlikely that my condition will improve.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'cannotCommunicate',
	'defaultState' => 'checked',
	'outputText' => '')
	);

$recognition = new SelectionElement ( array (
	'idName' => 'recognition', 
	'labelText' => 'I do not recognize my friends or family and it is unlikely that my condition will improve.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'recognition',
	'defaultState' => 'checked',
	'outputText' => '')
	);

$vegetativeState = new SelectionElement ( array (
	'idName' => 'vegetativeState', 
	'labelText' => 'I am in a persistent vegetative state.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'vegetativeState',
	'defaultState' => 'checked',
	'outputText' => '')
	);
	
$oneConditioinSet = new QuestionFieldSet ( array (
	'idName' => 'oneConditionSet', 
	'labelText' => '', 
	'childElements' => array ( $progressiveIllness, $closeToDeath, $cannotCommunicate, $recognition, $vegetativeState ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);

$noLimit = new SelectionElement ( array (
	'idName' => 'noLimit', 
	'labelText' => '(a) I put no limit on the ability of my health care provider or agent to withhold or withdraw life-sustaining care.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'noLimit',
	'defaultState' => '',
	'outputText' => '')
	);

$oneCondition = new SelectionElement ( array (
	'idName' => 'oneCondition', 
	'labelText' => 'My health care provider should withhold or withdraw life-sustaining care if at least one of the following initialed conditions is met:', 
	'childElements' => array ( $oneConditionSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'oneCondition',
	'defaultState' => '',
	'outputText' => '')
	);

$limitationsSet = new QuestionFieldSet ( array (
	'idName' => 'limitationsSet', 
	'labelText' => 'If you choose this option, you must also choose (a) or (b), below.', 
	'childElements' => array ( ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

// ________________ LIMITATIONS TO CARE FIELDSET


// ################ LIVING WILL FIELDSET
$agentDecision = new SelectionElement ( array (
	'idName' => 'agentDecision', 
	'labelText' => 'I choose to let my agent decide. 
	I have chose my agent carefully. I have talked with my agent about my health care wishes. I trust my agent to make the health care decisions for me that I would make under the circumstances.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'agentDecision',
	'defaultState' => '',
	'outputText' => '')
	);

$prolongLife = new SelectionElement ( array (
	'idName' => 'prolongLife', 
	'labelText' => 'I choose to prolong life. Regardless of my condition or prognosis, I want my health care team to try to prolong my life as long as possible within the limits of generally accepted health care standards.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'prolongLife',
	'defaultState' => '',
	'outputText' => '')
	);
	
$notProlongLife = new SelectionElement ( array (
	'idName' => 'notProlongLife', 
	'labelText' => 'I choose not to receive care for the purpose of prolonging life. Including food and fluids by tube, antibiotics, CPR, or dialysis being used to prolong my life. I always want comfort care and routine medical care that will keep me as comfortable and functional as possible, even if that care may prolong life.', 
	'childElements' => array ( $limitationsSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'notProlongLife',
	'defaultState' => '',
	'outputText' => '')
	);
	
$noPreference = new SelectionElement ( array (
	'idName' => 'noPreference', 
	'labelText' => 'I do NOT wish to express preference about end-of-life health care wishes in this Directive.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'none',
	'choiceValue' => 'noPreference',
	'defaultState' => '',
	'outputText' => '')
	);
	
$livingWillSet = new QuestionFieldSet ( array (
	'idName' => 'livingWillSet', 
	'labelText' => '', 
	'childElements' => array ( $agentDecision, $prolongLife, $notProlongLife, $noPreference ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ___________________ LIVING WILL FIELDSET

// ################### OVERRIDE FIELDSET
$overrideSet = new QuestionFieldSet ( array (
	'idName' => 'overrideSet', 
	'labelText' => 'My agent may make decisions about health care that are different from the above expressly stated wishes.', 
	'childElements' => array ( $radioYes, $radioNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// __________________ OVERRIDE FIELDSET

$livingWill = new QuestionPage ( array (
	'idName' => 'livingWill', 
	'labelText' => 'I want my health care providers to follow the instructions I give them when I am being treated, even if my instructions conflict with these or other advance directives. My health care providers should always provide health care to keep me as comfortable and functional as possible.', 
	'childElements' => array ( $livingWillSet, $overrideSet ), 
	'pageTitleText' => 'Health Wishes (Living Will)', 
	'helpText' => '')
	);


// _______________________________ HEALTH CARE WISHES (LIVING WILL)


// ############################### BEGIN ORGAN DONATION PAGE

// ################ BEGIN ORGAN DONATION FIELDSETS
$specifyOrgans = new TextElement ( array (
	'idName' => 'specifyOrgans', 
	'labelText' => '', 
	'childElements' => array (), 
	'inputType' => 'textarea',
	'required' => 'no',
	'validationType' => 'none',
	'width' => '',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	

$anyOrgan = new SelectionElement ( array (
	'idName' => 'anyOrgan', 
	'labelText' => 'any organs/tissues', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'anyOrgan',
	'defaultState' => '',
	'outputText' => '')
	);

$onlyTheFollowing = new SelectionElement ( array (
	'idName' => 'wishToDonate', 
	'labelText' => 'only the following organs or tissues:', 
	'childElements' => array ( $specifyOrgans ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'wishToDonate',
	'defaultState' => '',
	'outputText' => '')
	);

$givingSet = new QuestionFieldSet ( array (
	'idName' => 'givingSet', 
	'labelText' => '', 
	'childElements' => array ( $anyOrgan, $onlyTheFollowing ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
	
$refuseToDonate = new SelectionElement ( array (
	'idName' => 'refuseToDonate', 
	'labelText' => 'I do not want to be an organ donor.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'refuseToDonate',
	'defaultState' => '',
	'outputText' => '')
	);
	
$wishToDonate = new SelectionElement ( array (
	'idName' => 'wishToDonate', 
	'labelText' => 'I want to be an organ donor. In the event of my death I request that my agent inform my family/next of kin of my desires to be an organ and tissue donor if possible. My wishes are indicated below:', 
	'childElements' => array ( $givingSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => '',
	'choiceValue' => 'wishToDonate',
	'defaultState' => '',
	'outputText' => '')
	);	
	
	
$organDonationSet = new QuestionFieldSet ( array (
	'idName' => 'organDonationSet', 
	'labelText' => '', 
	'childElements' => array ( $refuseToDonate, $wishToDonate ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// _________________ ORGAN DONATION FIELDSET 

$organDonation = new QuestionPage ( array (
	'idName' => 'organDonation', 
	'labelText' => 'Organ Donation', 
	'childElements' => array ( $organDonationSet ), 
	'pageTitleText' => 'Organ Donation', 
	'helpText' => '')
	);
	
// _______________________________ END ORGAN DONATION PAGE


// ############################### ADDITIONAL INSTRUCTIONS PAGE

// ################ INSTRUCTIONS FEILDSET
$instructions = new TextElement ( array (
	'idName' => 'instructions', 
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

$additionalInstructionsSet = new QuestionFieldSet ( array (
	'idName' => 'additionalInstructionsSet', 
	'labelText' => '', 
	'childElements' => array ( $instructions), 
	'childrenType' => 'form',
	'required' => 'no')
	);	
// _________________ INSTRUCTIONS FEILDSET

$additionalInstructions= new QuestionPage ( array (
	'idName' => 'additionalInstructions', 
	'labelText' => 'Additional instructions about your health care wishes:', 
	'childElements' => array ( $addtionalInstructionsSet ), 
	'pageTitleText' => 'Additional Instructions', 
	'helpText' => '')
	);
	
// _________________________________ ADDITIONAL INSTRUCTIONS PAGE

// END


?>

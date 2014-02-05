<?php
$oregon = array (
	'patientInfo', //AJBdone
	'healthProxy', //AJBdone
	'alternateHP', //AJBdone
	'limitations', // AJBdone
	'notesPage', //AJBdone
	'closeToDeath', //AJBdone
	'permanentlyUnconscious', //AJBdone
	'advancedProgIllness', //AJBdone
	'extraordSuffering', //AJBdone
	'generalInstructions',//AJBdone
	'otherDocuments', //AJBdone
	'organDonation' //AJBdone
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
	'rows' => '5')
	);

$freeTextElementSet = new QuestionFieldSet ( array (
	'idName' => 'freeTextElementSet', 
	'labelText' => '', 
	'childElements' => array ( $freeTextElement ), 
	'childrenType' => 'form',
	'required' => '')
	);

$limitSet = new QuestionFieldSet ( array (
	'idName' => 'limitSet', 
	'labelText' => 'Special Conditions or Instructions:', 
	'childElements' => array ( $freeTextElementSet ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ______________ FREE TEXT ELEMENT SET

//################ HONOR LIVNIG WILL SET
$honorLivingWill = new SelectionElement ( array (
	'idName' => 'honorLivingWill', 
	'labelText' => 'I have executed a Health Care Instruction or Directive to Physicians. My representative is to honor it.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'honorLivingWill',
	'defaultState' => '',
	'outputText' => '')
	);	
$honorLivingWillSet = new QuestionFieldSet ( array (
	'idName' => 'honorLivingWillSet', 
	'labelText' => '', 
	'childElements' => array ( $honorLivingWill ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// _________________ HONOR LIVING WILL SET

// ################# LIFE SUPPORT SET
$lifeSupport = new SelectionElement ( array (
	'idName' => 'lifeSupport', 
	'labelText' => 'My representative MAY decide about life support for me. (If you don\'t initial this space, then your representative MAY NOT decide about life support. )', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'honorLivingWill',
	'defaultState' => '',
	'outputText' => '')
	);	
$lifeSupportSet = new QuestionFieldSet ( array (
	'idName' => 'lifeSupportSet', 
	'labelText' => 'LIFE SUPPORT', 
	'childElements' => array ( $lifeSupport ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// _____________________ LIFE SUPPORT SET

// ##################### TUBE FEEDING SET
$tubeFeeding = new SelectionElement ( array (
	'idName' => 'tubeFeeding', 
	'labelText' => 'My representative MAY decide about tube feeding for me. (If you don\'t initial this space, then your representative MAY NOT decide about tube feeding. )', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'tubeFeeding',
	'defaultState' => '',
	'outputText' => '')
	);	
$tubeFeedingSet = new QuestionFieldSet ( array (
	'idName' => 'tubeFeedingSet', 
	'labelText' => 'TUBE FEEDING', 
	'childElements' => array ( $tubeFeeding ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// _____________________ TUBE FEEDINGS SET	

$limitations = new QuestionPage ( array (
	'idName' => 'limitations', 
	'labelText' => 'LIMITS:', 
	'childElements' => array ( $limitSet, $honorLivingWillSet, $lifeSupportSet, $tubeFeedingSet ), 
	'pageTitleText' => 'Limits and Instructions', 
	'helpText' => '“Life support” refers to any medical means for maintaining life, including
	procedures, devices and medications. If you refuse life support, you will still
	get routine measures to keep you clean and comfortable.
	
	"Tube Feeding" refers to one sort of life support whereby food and water are supplied artificially by medical device, known as tube feeding.')
	);
	
// ____________________________ LIMITATIONS PAGE

// ############################ NOTES PAGE

$notes = new TextObject ( array (
	'idName' => 'notes',
	'textBody' => 'NOTE: In filling out these instructions, keep the following in mind:
		The term “as my physician recommends” means that you want your physician to try life support and then discontinue it if it is not helping your	health condition or symptoms.
		"Tube Feeding" refers to one sort of life support whereby food and water are supplied artificially by medical device, known as tube feeding. 
		“Life support” refers to any medical means for maintaining life, including procedures, devices and medications. If you refuse life support, you will still get routine measures to keep you clean and comfortable.
		If you refuse tube feeding, you should understand that malnutrition, dehydration and death will probably result.
		You will get care for your comfort and cleanliness, no matter what choices you make.
		You may either give specific instructions by filling out Items 1 to 4 below, or you may use the general instruction provided by Item 5.')
	);

$notesPage = new QuestionPage ( array (
	'idName' => 'notesPage', 
	'labelText' => 'Heath Care Instructions', 
	'childElements' => array ( $notes ), 
	'pageTitleText' => 'Notes and Definitions', 
	'helpText' => '')
	);

// ____________________________ NOTES PAGE

// ################# FEEDING TUBE SET
$tFYes = new SelectionElement ( array (
	'idName' => 'tFYes', 
	'labelText' => 'I want to receive tube feeding.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'tFYes',
	'defaultState' => '',
	'outputText' => '')
	);	
$tFMD = new SelectionElement ( array (
	'idName' => 'tFMD', 
	'labelText' => 'I want tube feeding only as my physician recommends.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'tFMD',
	'defaultState' => '',
	'outputText' => '')
	);	
$tFNo= new SelectionElement ( array (
	'idName' => 'tFNo', 
	'labelText' => 'I DO NOT WANT tube feeding.', 
	'childElements' => array ( $lsWithholdSet, $trialIntubSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'tFNo',
	'defaultState' => '',
	'outputText' => '')
	);
	
$tFSet = new QuestionFieldSet ( array (
	'idName' => 'tFSet', 
	'labelText' => '', 
	'childElements' => array ( $tFYes, $tFMD, $tFNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// _________________ FEEDING TUBE SET

// ################# LIFE SUPPORT SET 
$lSYes = new SelectionElement ( array (
	'idName' => 'lSYes', 
	'labelText' => 'I want any other life support that may apply.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lSYes',
	'defaultState' => '',
	'outputText' => '')
	);	
$lSMD = new SelectionElement ( array (
	'idName' => 'lSMD', 
	'labelText' => 'I want life support only as my physician recommends.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lSMD',
	'defaultState' => '',
	'outputText' => '')
	);	
$lSNo= new SelectionElement ( array (
	'idName' => 'lSNo', 
	'labelText' => 'I want NO life support.', 
	'childElements' => array ( $lsWithholdSet, $trialIntubSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lSNo',
	'defaultState' => '',
	'outputText' => '')
	);
	
$lSSet = new QuestionFieldSet ( array (
	'idName' => 'lSSet', 
	'labelText' => '', 
	'childElements' => array ( $lSYes, $lSMD, $lSNo ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

// _________________ LIFE SUPPORT SET

$closeToDeath = new QuestionPage ( array (
	'idName' => 'closeToDeath', 
	'labelText' => 'If I am close to death and life support would only postpone the moment of my death:', 
	'childElements' => array ( $tFSet, $lSSet ), 
	'pageTitleText' => 'Close to Death', 
	'helpText' => '')
	);


$permanentlyUnconscious = new QuestionPage ( array (
	'idName' => 'permanentlyUnconscious', 
	'labelText' => 'If I am unconscious and it is very unlikely that I will ever become conscious again:', 
	'childElements' => array ( $tFSet, $lSSet ), 
	'pageTitleText' => 'Permanently Unconscious', 
	'helpText' => '')
	);
	
$advancedProgIllness = new QuestionPage ( array (
	'idName' => 'advancedProgIllness', 
	'labelText' => 'If I have a progressive illness that will be fatal and the illness is in an advanced stage, and I am consistently and permanently unable to communicate, swallow food and water safely, care for myself and recognize	my family and other people, and it is very unlikely that my condition will	substantially improve:', 
	'childElements' => array ( $tFSet, $lSSet ), 
	'pageTitleText' => 'Advanced Progressive Illness', 
	'helpText' => '')
	);

$extraordinarySuffering = new QuestionPage ( array (
	'idName' => 'extraordinarySuffering', 
	'labelText' => 'If life support would not help my medical condition and would make me suffer permanent and severe pain:', 
	'childElements' => array ( $tFSet, $lSSet ), 
	'pageTitleText' => 'Extraordinary Suffering', 
	'helpText' => '')
	);

// ############################ GENERAL INSTRUCTIONS

$dieNaturally = new SelectionElement ( array (
	'idName' => 'dieNaturally', 
	'labelText' => 'I do not want my life to be prolonged by life support. I also do not want tube feeding as life support. I want my doctors to allow me to die naturally if my doctor and another knowledgeable doctor confirm I am in any of the foregoing medical conditions.)', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'dieNaturally',
	'defaultState' => '',
	'outputText' => '')
	);	
$dieNaturallySet = new QuestionFieldSet ( array (
	'idName' => 'dieNaturallySet', 
	'labelText' => 'Natural Death', 
	'childElements' => array ( $dieNaturally), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);

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

$generalInstructionsSet = new TextElement ( array (
	'idName' => 'generalInstructionsSet',
	'labelText' => '',
	'childElements' => array ( $freeTextElementSet ),
	'childrenType' => 'form',
	'required' => '')
	);

$generalInstructions = new QuestionPage ( array (
	'idName' => 'generalInstructions', 
	'labelText' => 'Additional Conditions or Instruction', 
	'childElements' => array ( $dieNaturallySet, $generalInstructionsSet ), 
	'pageTitleText' => 'General Instruction', 
	'helpText' => '')
	);

// ########################### OTHER DOCUMENTS PAGE

$previouslySigned = new SelectionElement ( array (
	'idName' => 'previouslySigned', 
	'labelText' => 'I have previously signed a health care power of attorney. I want it to remain in effect.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'previouslySigned',
	'defaultState' => '',
	'outputText' => '')
	);	
$revokeIt = new SelectionElement ( array (
	'idName' => 'revokeIt', 
	'labelText' => 'I have a health care power of attorney, and I REVOKE IT.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'revokeIt',
	'defaultState' => '',
	'outputText' => '')
	);	
$noPrevious= new SelectionElement ( array (
	'idName' => 'noPrevious', 
	'labelText' => 'I DO NOT have a health care power of attorney.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'noPrevious',
	'defaultState' => '',
	'outputText' => '')
	);
	
$otherDocumentsSet = new QuestionFieldSet ( array (
	'idName' => 'otherDocumentsSet', 
	'labelText' => 'Please choose one', 
	'childElements' => array ( $previouslySigned, $revokeIt, $noPrevious ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);

$otherDocuments = new QuestionPage ( array (
	'idName' => 'otherDocuments', 
	'labelText' => '', 
	'childElements' => array ( $otherDocumentsSet ), 
	'pageTitleText' => 'Other Documents', 
	'helpText' => 'A "health care power of attorney" is any document you may have signed to appoint a representative to make health care decisions for you.')
	);

// _____________________________ OTHER DOCUMENTS PAGE


// ############################ ORGAN DONATION PAGE


// ################ ORGAN TYPE FIELDSET
$anyNeeded = new SelectionElement ( array (
	'idName' => 'anyNeeded', 
	'labelText' => 'Any needed organs or tissues', 
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
	'childElements' => array ( $anyneeded, $theFollowing ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________________ ORGAN TYPE FIELDSET	

// #################### ORGAN PURPOSE SET
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
// ____________________ ORGAN PURPOSE SET

// #################### DONATION CONSENT FIELDSET

$refuseToDonate = new SelectionElement ( array (
	'idName' => 'refuseToDonate', 
	'labelText' => 'I do not want to make an organ or tissue donation and I do not want my health care representative or other agent or family to do so.', 
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
	'labelText' => 'Pursuant to Oregon law, I hereby give, effective on my death:', 
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
	'labelText' => 'Choose from below the statement that best reflects your wishes. ', 
	'childElements' => array ( $wishRefuseToDonateSet ), 
	'pageTitleText' => 'Organ and Tissue Donation', 
	'helpText' => 'You do not have to initial any of the statements. If you do not initial any of the statements, your attorney for health care, proxy, or other agent, or your family, may have the authority to make a gift of all or part of your body under Texas law.')
	);

// _____________________________ ORGAN DONATION PAGE


?>
<?php



$generalState = array (
	'patientInfo',
	'healthProxy',
	'alternateHP',
	'proxyExpiration',
	'authHealthRecs',
	'livingWillApply',
	'lifeSustainTrmt',
	'artNutrHydr',
	'painSuffer',
	'ownWords',
	'lwExpiration',
	'otherInstructions',
	'organDonation'
	);



// ########################### PATIENT INFO PAGE

// ############## PATIENT DATA FIELDSET
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
$patientData = new QuestionFieldSet ( array (
	'idName' => 'patientData', 
	'labelText' => '', 
	'childElements' => array ( $fullName, $birthDate ), 
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



// ########################### PROXY EXPIRATION PAGE

// ############# EXPIRATION DATE FIELDSET
$expDate = new TextElement ( array (
	'idName' => 'expDate', 
	'labelText' => 'Expiration Date', 
	'childElements' => array(), 
	'inputType' => 'text',
	'required' => '',
	'validationType' => 'none',
	'width' => 'full',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);
$expDateSet = new QuestionFieldSet ( array (
	'idName' => 'expDateSet', 
	'labelText' => '', 
	'childElements' => array ( $expDate ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ____________ END EXPIRATION DATE FIELDSET

// ############# EXPIRATION CIRCUM FIELDSET
$expCircum = new TextElement ( array (
	'idName' => 'expCircum', 
	'labelText' => 'Expiration Circumstances', 
	'childElements' => array(), 
	'inputType' => 'textarea',
	'required' => '',
	'validationType' => 'none',
	'width' => 'full',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$expCircumSet = new QuestionFieldSet ( array (
	'idName' => 'expCircumSet', 
	'labelText' => '', 
	'childElements' => array ( $expCircum ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ____________ END EXPIRATION CIRCUM FIELDSET

$expBothSet = new QuestionFieldSet ( array (
	'idName' => 'expBothSet', 
	'labelText' => '', 
	'childElements' => array ( $expDate, $expCircum ), 
	'childrenType' => 'form',
	'required' => '')
	);

// ############# PROXY EXPIRATION FIELDSET
$pExpIndef = new SelectionElement ( array (
	'idName' => 'pExpIndef', 
	'labelText' => 'I would like this health care proxy to remain in effect indefinitely, unless I revoke it.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'pExpIndef',
	'defaultState' => '',
	'outputText' => '')
	);	
$pExpDate = new SelectionElement ( array (
	'idName' => 'pExpDate', 
	'labelText' => 'I would like to set an expiration date.', 
	'childElements' => array ( $expDateSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'pExpDate',
	'defaultState' => '',
	'outputText' => '')
	);
$pExpCircum = new SelectionElement ( array (
	'idName' => 'pExpCircum', 
	'labelText' => 'I would like to set circumstances under which this health care proxy will expire.', 
	'childElements' => array ( $expCircumSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'pExpCircum',
	'defaultState' => '',
	'outputText' => '')
	);
$pExpBoth = new SelectionElement ( array (
	'idName' => 'pExpBoth', 
	'labelText' => 'I would like to set an expiration date and circumstances under which this health care proxy will expire.', 
	'childElements' => array ( $expBothSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'pExpBoth',
	'defaultState' => '',
	'outputText' => '')
	);	
$proxyExpirationSet = new QuestionFieldSet ( array (
	'idName' => 'proxyExpirationSet', 
	'labelText' => '', 
	'childElements' => array ( $pExpIndef, $pExpDate, $pExpCircum, $pExpBoth ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________ END EXPIRATION CIRCUM FIELDSET

$proxyExpiration = new QuestionPage ( array (
	'idName' => 'proxyExpiration', 
	'labelText' => 'Expiration of your Proxy.', 
	'childElements' => array ( $proxyExpirationSet ), 
	'pageTitleText' => 'Proxy Expiration', 
	'helpText' => 'Your Health Care Proxy will remain valid indefinitely unless you set an expiration date or condition for its expiration. If you designate your spouse is your proxy, if you divorce them they cease to be your proxy.')
	);
// ____________________________ END PROXY EXPIRATION PAGE



// ########################### AUTH HEALTH RECS PAGE

// ############# AUTH HEALTH RECS FIELDSET
$authRecs = new SelectionElement ( array (
	'idName' => 'authRecs', 
	'labelText' => 'I authorize my Proxy to get copies of my health records.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'authRecs',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$authRecsSet = new QuestionFieldSet ( array (
	'idName' => 'authRecsSet', 
	'labelText' => '', 
	'childElements' => array ( $authRecs ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END AUTH HEALTH RECS FIELDSET

$authHealthRecs = new QuestionPage ( array (
	'idName' => 'authHealthRecs', 
	'labelText' => 'Authorize access to your health records.', 
	'childElements' => array ( $authRecsSet ), 
	'pageTitleText' => 'Authorize Health Records', 
	'helpText' => '')
	);
// ____________________________ END AUTH HEALTH RECS PAGE



// ########################### LIVING WILL APPLY PAGE

// ############# FREE TEXT FIELDSET
$freeText = new TextElement ( array (
	'idName' => 'freeText', 
	'labelText' => '', 
	'childElements' => array(), 
	'inputType' => 'textarea',
	'required' => '',
	'validationType' => 'none',
	'width' => 'full',
	'sizeLimit' => '',
	'cols' => '',
	'rows' => '')
	);	
$freeTextSet = new QuestionFieldSet ( array (
	'idName' => 'freeTextSet', 
	'labelText' => '', 
	'childElements' => array ( $freeText ), 
	'childrenType' => 'form',
	'required' => '')
	);
// ____________ END FREE TEXT FIELDSET

// ############# LIVING WILL APPLY FIELDSET
$lwPostponeDeath = new SelectionElement ( array (
	'idName' => 'lwPostponeDeath', 
	'labelText' => 'If I my doctors reason I am close to death and life support would only postpone the moment of my death.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwPostponeDeath',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$lwComaVeg = new SelectionElement ( array (
	'idName' => 'lwComaVeg', 
	'labelText' => 'If I am in a deep coma, persistent vegetative state, or have suffered other severe neurologic injury which my doctors reason is irreversible.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwComaVeg',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$lwNoCommunicate = new SelectionElement ( array (
	'idName' => 'lwNoCommunicate', 
	'labelText' => 'If I am irreversibly demented to the point that I can no longer recognize my friends and family nor can I convey my wishes about medical care.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwNoCommunicate',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$lwTerminal = new SelectionElement ( array (
	'idName' => 'lwTerminal', 
	'labelText' => 'If my doctors reason I have a serious and irreversible condition or illness that I am unlikely to recover from, and I am no longer able to communicate my wishes.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwTerminal',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$lwOther = new SelectionElement ( array (
	'idName' => 'lwOther', 
	'labelText' => 'I would like to specify other conditions in addition to or instead of the above choices.', 
	'childElements' => array ( $freeTextSet ) , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwOther',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$lwApplySet = new QuestionFieldSet ( array (
	'idName' => 'lwApplySet', 
	'labelText' => '', 
	'childElements' => array ( $lwPostponeDeath, $lwComaVeg, $lwNoCommunicate, $lwTerminal, $lwOther ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END LIVING WILL APPLY FIELDSET

$livingWillApply = new QuestionPage ( array (
	'idName' => 'livingWillApply', 
	'labelText' => 'Situations in which your Living Will applies.', 
	'childElements' => array ( $lwApplySet ), 
	'pageTitleText' => 'Living Will Application', 
	'helpText' => '')
	);
// ____________________________ END LIVING WILL APPLY PAGE



// ########################### LIFE SUSTAIN TREATMENT PAGE

// ############# TRIAL INTUB FIELDSET
$trialIntub = new SelectionElement ( array (
	'idName' => 'trialIntub', 
	'labelText' => 'Allow a trial period of intubation (mechanical respiration), but if there is no improvement in my condition, I ask that it be removed.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'trialIntub',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$trialIntubSet = new QuestionFieldSet ( array (
	'idName' => 'trialIntubSet', 
	'labelText' => '', 
	'childElements' => array ( $trialIntub ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END TRIAL INTUB FIELDSET

// ############# LS WITHHOLD FIELDSET
$lsNoCPR = new SelectionElement ( array (
	'idName' => 'lsNoCPR', 
	'labelText' => 'No cardiopulmonary resuscitation (CPR)', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoCPR',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsNoDialysis = new SelectionElement ( array (
	'idName' => 'lsNoDialysis', 
	'labelText' => 'No dialysis', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoDialysis',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsNoSurgery = new SelectionElement ( array (
	'idName' => 'lsNoSurgery', 
	'labelText' => 'No major curative surgery', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoSurgery',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsNoIntub = new SelectionElement ( array (
	'idName' => 'lsNoIntub', 
	'labelText' => 'No intubation (mechanical respiration)', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoIntub',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsNoDrugs = new SelectionElement ( array (
	'idName' => 'lsNoDrugs', 
	'labelText' => 'No other drugs (besides for comfort)', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoDrugs',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsNoElecFib = new SelectionElement ( array (
	'idName' => 'lsNoElecFib', 
	'labelText' => 'No electric fibrillation', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoElecFib',
	'defaultState' => '',
	'outputText' => '')
	);
$lsNoOther = new SelectionElement ( array (
	'idName' => 'lsNoOther', 
	'labelText' => 'Other', 
	'childElements' => array ( $freeTextSet ) , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsNoOther',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsWithholdSet = new QuestionFieldSet ( array (
	'idName' => 'lsWithholdSet', 
	'labelText' => 'Check all that <span class="underline">you do not want administered</span>.', 
	'childElements' => array ( $lsNoCPR, $lsNoDialysis, $lsNoSurgery, $lsNoIntub, $lsNoDrugs, $lsNoElecFib, $lsNoOther ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END LS WITHHOLD FIELDSET

// ############# LIFE SUSTAIN FIELDSET
$lsAll = new SelectionElement ( array (
	'idName' => 'lsAll', 
	'labelText' => 'I would like all available treatment, including life-support treatment, administered in accordance with the highest standards of medical care.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsAll',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsOnlyImprove = new SelectionElement ( array (
	'idName' => 'lsOnlyImprove', 
	'labelText' => 'I would like all available treatment, including life-support treatment, however if the treatment is not improving my condition I request that it be stopped.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsOnlyImprove',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsWithhold = new SelectionElement ( array (
	'idName' => 'lsWithhold', 
	'labelText' => 'I ask to withhold only certain specific life-support therapies.', 
	'childElements' => array ( $lsWithholdSet, $trialIntubSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsWithhold',
	'defaultState' => '',
	'outputText' => '')
	);	
$lsComfort = new SelectionElement ( array (
	'idName' => 'lsComfort', 
	'labelText' => 'I ask to withhold (or if already started, to stop) all forms of therapy, including life-support treatment, that are not intended solely for my comfort.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsComfort',
	'defaultState' => '',
	'outputText' => '')
	);	
$lifeSusSet = new QuestionFieldSet ( array (
	'idName' => 'lwApplySet', 
	'labelText' => '', 
	'childElements' => array ( $lsAll, $lsOnlyImprove, $lsWithhold, $lsComfort ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________ END LIFE SUSTAIN FIELDSET

// ############# LS REEVAL FIELDSET
$lsReEval = new SelectionElement ( array (
	'idName' => 'lsReEval', 
	'labelText' => 'I request that my doctors regularly reevaluate my plan for life sustaining treatment to be sure it is meeting my needs and in accordance with my wishes.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lsReEval',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$lsReEvalSet = new QuestionFieldSet ( array (
	'idName' => 'lsReEvalSet', 
	'labelText' => '<span class="bold>(check the box below if you agree with the statement)</span>', 
	'childElements' => array ( $lsReEval ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END LS REEVAL FIELDSET

$lifeSustainTrmt = new QuestionPage ( array (
	'idName' => 'lifeSustainTrmt', 
	'labelText' => 'Life Sustaining Treatment.', 
	'childElements' => array ( $lifeSusSet, $lsReEvalSet ), 
	'pageTitleText' => 'Life Sustaining Treatment', 
	'helpText' => '')
	);
// ____________________________ END LIFE SUSTAIN TREATMENT PAGE



// ####################### ARTIFICIAL NUTRITION HYDRATION PAGE

// ############# ANH AVOID FIELDSET
$anhNoNoseMouth = new SelectionElement ( array (
	'idName' => 'anhNoNoseMouth', 
	'labelText' => 'I do not want placement of a feeding tube through the nose or mouth to the stomach, even if this is deemed to be the best choice for me by my doctors.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhNoNoseMouth',
	'defaultState' => '',
	'outputText' => '')
	);	
$anhNoSurgInsert = new SelectionElement ( array (
	'idName' => 'anhNoSurgInsert', 
	'labelText' => 'I do not want surgical insertion of a feeding tube directly into the stomach, even if this is deemed to be the best choice for me by my doctors.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhNoSurgInsert',
	'defaultState' => '',
	'outputText' => '')
	);
$anhNoIV = new SelectionElement ( array (
	'idName' => 'anhNoIV', 
	'labelText' => 'I do not want intravenous administration of nutrition and hydration, even if there are no other options.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhNoIV',
	'defaultState' => '',
	'outputText' => '')
	);	
$anhAvoidSet = new QuestionFieldSet ( array (
	'idName' => 'anhAvoidSet', 
	'labelText' => 'Check all that <span class="underline">you do not want administered</span>.', 
	'childElements' => array ( $anhNoNoseMouth, $anhNoSurgInsert, $anhNoIV ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END ANH AVOID FIELDSET

// ############# ANH FIELDSET
$anhMostEffect = new SelectionElement ( array (
	'idName' => 'anhMostEffect', 
	'labelText' => 'I want to receive nutrition and hydration by the most effective means.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhMostEffect',
	'defaultState' => '',
	'outputText' => '')
	);	
$anhAvoid = new SelectionElement ( array (
	'idName' => 'anhAvoid', 
	'labelText' => 'I feel strongly that I do not want certain means of artificial nutrition used <span class="bold">(click for options)</span>.', 
	'childElements' => array ( $anhAvoidSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhAvoid',
	'defaultState' => '',
	'outputText' => '')
	);	
$anhNone = new SelectionElement ( array (
	'idName' => 'anhNone', 
	'labelText' => 'I do not want to be fed or hydrated by any artificial means.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhNone',
	'defaultState' => '',
	'outputText' => '')
	);	
$anhSpecify = new SelectionElement ( array (
	'idName' => 'anhSpecify', 
	'labelText' => 'I would like to specify in my own words my wishes about artificial nutrition and hydration.', 
	'childElements' => array ( $freeTextSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhSpecify',
	'defaultState' => '',
	'outputText' => '')
	);	
$artNutHydSet = new QuestionFieldSet ( array (
	'idName' => 'artNutHydSet', 
	'labelText' => '', 
	'childElements' => array ( $anhMostEffect, $anhAvoid, $anhNone, $anhSpecify ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________ END ANH FIELDSET

// ############# ANH REEVAL FIELDSET
$anhReEval = new SelectionElement ( array (
	'idName' => 'anhReEval', 
	'labelText' => 'I request that my doctors regularly reevaluate my plan for nutrition to be sure it is meeting my needs and in accordance with my wishes.', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'anhReEval',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$anhReEvalSet = new QuestionFieldSet ( array (
	'idName' => 'anhReEvalSet', 
	'labelText' => '<span class="bold>(check the box below if you agree with the statement)</span>', 
	'childElements' => array ( $anhReEval ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END ANH REEVAL FIELDSET

$artNutrHydr = new QuestionPage ( array (
	'idName' => 'artNutrHydr', 
	'labelText' => 'Artificial Nutrition and Hydration Options', 
	'childElements' => array ( $artNutHydSet, $anhReEvalSet ), 
	'pageTitleText' => 'Artificial Nutrition and Hydration', 
	'helpText' => '')
	);
// ____________________ END ARITIFICIAL NUTRITION HYDRATION PAGE



// ########################### PAIN & SUFFERING PAGE

// ############# PAIN SUFFER FIELDSET
$psMaxConscious = new SelectionElement ( array (
	'idName' => 'psMaxConscious', 
	'labelText' => 'I ask that every attempt be made to maximize consciousness.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'psMaxConscious',
	'defaultState' => '',
	'outputText' => '')
	);	
$psContact = new SelectionElement ( array (
	'idName' => 'psContact', 
	'labelText' => 'I ask that you manage my pain in a way to maximize contact with my family and friends even if it means for me greater physical suffering.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'psContact',
	'defaultState' => '',
	'outputText' => '')
	);	
$psMinSuffer = new SelectionElement ( array (
	'idName' => 'psMinSuffer', 
	'labelText' => 'I would like every attempt to be made to minimize my suffering, even if it may hasten my death.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'psMinSuffer',
	'defaultState' => '',
	'outputText' => '')
	);	
$psOwnWords = new SelectionElement ( array (
	'idName' => 'psOwnWords', 
	'labelText' => 'I would like to specify in my own words my wishes about pain relief.', 
	'childElements' => array ( $freeTextSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'psOwnWords',
	'defaultState' => '',
	'outputText' => '')
	);	
$painSufferSet = new QuestionFieldSet ( array (
	'idName' => 'painSufferSet', 
	'labelText' => '', 
	'childElements' => array ( $psMaxConscious, $psContact, $psMinSuffer, $psOwnWords ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________ END PAIN SUFFER FIELDSET

$painSuffer = new QuestionPage ( array (
	'idName' => 'painSuffer', 
	'labelText' => 'Relief of Pain and Suffering Options.', 
	'childElements' => array ( $painSufferSet ), 
	'pageTitleText' => 'Relief of Pain and Suffering', 
	'helpText' => '')
	);
// ____________________________ END PAIN & SUFFERING PAGE



// ########################### ADDITIONAL REQUESTS PAGE	
$ownWords = new QuestionPage ( array (
	'idName' => 'ownWords', 
	'labelText' => 'I would like to add my own words about any other wishes I may have that I would like to convey to my family and care providers.', 
	'childElements' => array ( $freeTextSet ), 
	'pageTitleText' => 'Additional Requests', 
	'helpText' => '')
	);
// ____________________________ END ADDITIONAL REQUESTS PAGE



// ########################### LIVING WILL EXPIRATION PAGE

// ############# LW EXPIRATION FIELDSET
$lwExpIndef = new SelectionElement ( array (
	'idName' => 'lwExpIndef', 
	'labelText' => 'I would like this living will to remain in effect indefinitely, unless I revoke it.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwExpIndef',
	'defaultState' => '',
	'outputText' => '')
	);	
$lwExpDate = new SelectionElement ( array (
	'idName' => 'lwExpDate', 
	'labelText' => 'I would like to set an expiration date.', 
	'childElements' => array ( $expDateSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwExpDate',
	'defaultState' => '',
	'outputText' => '')
	);
$lwExpCircum = new SelectionElement ( array (
	'idName' => 'lwExpCircum', 
	'labelText' => 'I would like to set circumstances under which this living will will expire.', 
	'childElements' => array ( $expCircumSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwExpCircum',
	'defaultState' => '',
	'outputText' => '')
	);
$lwExpBoth = new SelectionElement ( array (
	'idName' => 'lwExpBoth', 
	'labelText' => 'I would like to set an expiration date and circumstances under which this living will will expire.', 
	'childElements' => array ( $expBothSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'lwExpBoth',
	'defaultState' => '',
	'outputText' => '')
	);	
$lwExpirationSet = new QuestionFieldSet ( array (
	'idName' => 'proxyExpirationDetails', 
	'labelText' => '', 
	'childElements' => array ( $pExpIndef, $pExpDate, $pExpCircum, $pExpBoth ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________ END EXPIRATION CIRCUM FIELDSET

$lwExpiration = new QuestionPage ( array (
	'idName' => 'lwExpiration', 
	'labelText' => 'Expiration of Living Will instructions', 
	'childElements' => array ( $lwExpirationSet ), 
	'pageTitleText' => 'Expiration of Living Will', 
	'helpText' => '')
	);
// ____________________________ END LIVING WILL EXPIRATION PAGE



// ########################### OTHER INSTRUCTIONS PAGE
$otherInstructions = new QuestionPage ( array (
	'idName' => 'otherInstructions', 
	'labelText' => 'Specify any other instructions', 
	'childElements' => array ( $freeTextSet ), 
	'pageTitleText' => 'Other Instructions', 
	'helpText' => '')
	);
// ____________________________ END OTHER INSTRUCTIONS PAGE



// ########################### ORGAN DONATION PAGE

// ############# ORG DON FIELDSET
$orgDonNone = new SelectionElement ( array (
	'idName' => 'orgDonNone', 
	'labelText' => '(a) I do not give any of my organs, tissues, or parts and do not want my agent, guardian, or family to make a donation on my behalf.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'orgDonNone',
	'defaultState' => '',
	'outputText' => '')
	);	
$orgDonAny = new SelectionElement ( array (
	'idName' => 'orgDonAny', 
	'labelText' => '(b) I give any needed organs, tissues, or parts.', 
	'childElements' => array () , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'orgDonAny',
	'defaultState' => '',
	'outputText' => '')
	);	
$orgDonSpecify = new SelectionElement ( array (
	'idName' => 'orgDonSpecify', 
	'labelText' => 'OR<br />(c) I give the following organs, tissues, or parts only:', 
	'childElements' => array ( $freeTextSet ) , 
	'inputType' => 'radio',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'orgDonSpecify',
	'defaultState' => '',
	'outputText' => '')
	);	
$orgDonSet = new QuestionFieldSet ( array (
	'idName' => 'orgDonSet', 
	'labelText' => 'Upon my death:', 
	'childElements' => array ( $orgDonNone, $orgDonAny, $orgDonSpecify ), 
	'childrenType' => 'radio',
	'required' => 'no')
	);
// ____________ END ORG DON FIELDSET

// ############# OD PURPOSE FIELDSET
$odTransplant = new SelectionElement ( array (
	'idName' => 'odTransplant', 
	'labelText' => 'Transplant', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'odTransplant',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$odTherapy = new SelectionElement ( array (
	'idName' => 'odTherapy', 
	'labelText' => 'Therapy', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'odTherapy',
	'defaultState' => 'checked',
	'outputText' => '')
	);
$odResearch = new SelectionElement ( array (
	'idName' => 'odResearch', 
	'labelText' => 'Research', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'odResearch',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$odEducation = new SelectionElement ( array (
	'idName' => 'odEducation', 
	'labelText' => 'Education', 
	'childElements' => array () , 
	'inputType' => 'checkbox',
	'required' => '',
	'validationType' => 'nameVal',
	'choiceValue' => 'odEducation',
	'defaultState' => 'checked',
	'outputText' => '')
	);	
$odPurposeSet = new QuestionFieldSet ( array (
	'idName' => 'odPurposeSet', 
	'labelText' => 'My gift, if I have made one, is for the following purposes: (uncheck any of the following that you do not want)', 
	'childElements' => array ( $odTransplant, $odTherapy, $odResearch, $odEducation ), 
	'childrenType' => 'checkbox',
	'required' => 'no')
	);
// ____________ END OD PURPOSE FIELDSET

$organDonation = new QuestionPage ( array (
	'idName' => 'organDonation', 
	'labelText' => 'OPTIONAL ORGAN DONATION', 
	'childElements' => array ( $orgDonSet, $odPurposeSet ), 
	'pageTitleText' => 'Organ Donation', 
	'helpText' => '')
	);
// ____________________________ END ORGAN DONATION PAGE



?>
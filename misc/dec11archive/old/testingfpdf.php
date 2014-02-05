<?php
// FOR TESTING
session_start();
require_once ( 'fpdf/pdfadd.php' );
ini_set( "display_errors", true );

/*
Standard Letter size paper = 210mm across. Center Line = 105mm.
Doc margins are set to 20mm each so print area = 170mm.

$pdf->Write ( #_line_height , 'string of text' );

$pdf->SetFont ( 'Font Name', 'B/U/I', #_font_size );

$pdf->SetFontSize ( # );

$pdf->MultiCell ( #_width=0, #_line_height, 'string of text', #_border=0, 'L/C/R/J_align=J' );

$pdf->Cell ( #_width=0, #_line_height, 'string of text', #_border=0, #_ln_location=>1, 'L/C/R/J_align=L' );

$pdf->Ln ( #_line_height );
*/



// ############## SET UP PDF & GET SESSION VARS
$pdf = new PDF();
if ( isset ( $_SESSION['savedData'] ) ) {
	$savedData = $_SESSION['savedData'];
	}
else {
	$savedData = array();
	}
$pdf->SetTopMargin ( 20 );
$pdf->AddPage();
$pdf->SetMargins ( 20, 20, 20 );
$pdf->SetFont( 'Arial', '', 10 );

// ################# INITIALIZE ALL VARS, FILL THE EXISTING ONES:
$loadData = array();
$loadData = array (
	// Patient Info
	'fullName' => 'patientInfo_patientData_fullName_fieldID',
	'birthDate' => 'patientInfo_patientData_birthDate_fieldID',
	'usState' => 'patientInfo_patientData_usState_fieldID',
	// Proxy Expiration - RADIO
	'proxyExpSet' => 'proxyExpiration_proxyExpirationSet_fieldID_SET',
	'proxy_ExpDate' => 'proxyExpiration_proxyExpirationSet_pExpDate_fieldID_expDateSet_expDate_fieldID',
	'proxy_ExpCircum' => 'proxyExpiration_proxyExpirationSet_pExpCircum_fieldID_expCircumSet_expCircum_fieldID',
	'proxy_ExpDateBoth' => 'proxyExpiration_proxyExpirationSet_pExpBoth_fieldID_expBothSet_expDate_fieldID',
	'proxy_ExpCircumBoth' => 'proxyExpiration_proxyExpirationSet_pExpBoth_fieldID_expBothSet_expCircum_fieldID',
	// Authorize Health Records - CHECKBOX
	'authRecsSet' => 'authHealthRecs_authRecsSet_fieldID_SET',
	// Health Proxy Info
	'proxyName' => 'healthProxy_personData_fullName_fieldID',
	'hpStreet' => 'healthProxy_personData_streetAddress_fieldID',
	'hpCity' => 'healthProxy_personData_city_fieldID',
	'hpState' => 'healthProxy_personData_usState_fieldID',
	'hpZip' => 'healthProxy_personData_zip_fieldID',
	'hpPhone' => 'healthProxy_personData_phone_fieldID',
	'hpCell' => 'healthProxy_personData_cellPhone_fieldID',
	'hpEmail' => 'healthProxy_personData_email_fieldID',
	// Alternate Health Proxy Info
	'altHPName' => 'alternateHP_personData_fullName_fieldID',
	'altHPStreet' => 'alternateHP_personData_streetAddress_fieldID',
	'altHPCity' => 'alternateHP_personData_city_fieldID',
	'altHPState' => 'alternateHP_personData_usState_fieldID',
	'altHPZip' => 'alternateHP_personData_zip_fieldID',
	'altHPPhone' => 'alternateHP_personData_phone_fieldID',
	'altHPCell' => 'alternateHP_personData_cellPhone_fieldID',
	'altHPEmail' => 'alternateHP_personData_email_fieldID',
	// Application of Living Will - CHECKBOX
	'lwApplySet' => 'livingWillApply_lwApplySet_fieldID_SET',
	'lwFreeText' => 'livingWillApply_lwApplySet_lwOther_fieldID_freeTextSet_freeText_fieldID',
	// Expiration of Living Will - RADIO
	'lwExpSet' => 'lwExpiration_lwExpirationSet_fieldID_SET',
	'livwill_ExpDate' => 'lwExpiration_lwExpirationSet_lwExpDate_fieldID_expDateSet_expDate_fieldID',
	'livwill_ExpCircum' => 'lwExpiration_lwExpirationSet_lwExpCircum_fieldID_expCircumSet_expCircum_fieldID',
	'livwill_ExpDateBoth' => 'lwExpiration_lwExpirationSet_lwExpBoth_fieldID_expBothSet_expDate_fieldID',
	'livwill_ExpCircumBoth' => 'lwExpiration_lwExpirationSet_lwExpBoth_fieldID_expBothSet_expCircum_fieldID',
	// Life Sustaining Treatment
	'lifeSusSet' => 'lifeSustainTrmt_lifeSusSet_fieldID_SET',
	'lsWithholdSet' => 'lifeSustainTrmt_lifeSusSet_lsWithhold_fieldID_lsWithholdSet_fieldID_SET',
	'lsNoOtherText' => 'lifeSustainTrmt_lifeSusSet_lsWithhold_fieldID_lsWithholdSet_lsNoOther_fieldID_freeTextSet_freeText_fieldID',
	'lsTrialIntubSet' => 'lifeSustainTrmt_lifeSusSet_lsWithhold_fieldID_trialIntubSet_fieldID_SET',
	'lsReEvalSet' => 'lifeSustainTrmt_lsReEvalSet_fieldID_SET',
	// Artificial Nutrition & Hydration
	'artNutHydSet' => 'artNutrHydr_artNutHydSet_fieldID_SET',
	'anhAvoidSet' => 'artNutrHydr_artNutHydSet_anhAvoid_fieldID_anhAvoidSet_fieldID_SET',
	'anhReEvalSet' => 'artNutrHydr_anhReEvalSet_fieldID_SET',
	'anhFreeText' => 'artNutrHydr_artNutHydSet_anhSpecify_fieldID_freeTextSet_freeText_fieldID',
	// Pain & Suffering
	'painSufferSet' => 'painSuffer_painSufferSet_fieldID_SET',
	'psFreeText' => 'painSuffer_painSufferSet_psOwnWords_fieldID_freeTextSet_freeText_fieldID',
	// Own Words
	'ownFreeText' => 'ownWords_freeTextSet_freeText_fieldID',
	// Other Instructions
	'otherFreeText' => 'otherInstructions_freeTextSet_freeText_fieldID',
	// Organ Donation
	'orgDonSet' => 'organDonation_orgDonSet_fieldID_SET',
	'odFreeText' => 'organDonation_orgDonSet_orgDonSpecify_fieldID_freeTextSet_freeText_fieldID',
	'odPurposeSet' => 'organDonation_odPurposeSet_fieldID_SET'
	);
foreach ( $loadData as $varName => $keyName ) {
	if ( array_key_exists ( $keyName, $savedData ) ) {
		if ( !is_array ( $savedData[$keyName] ) ) {
			${$varName} = $savedData[$keyName];
			}
		else {
			${$varName} = array ();
			foreach ( $savedData[$keyName] as $key => $val ) {
				${$varName}[] = $val;
				}
			}
		}
	else {
		${$varName} = '';
		}
	}



// ############################## HEADER

// FULLNAME
$pdf->SetFont ( 'Arial', 'B', 12 );
$pdf->Cell ( 0, 5, "$fullName", 0, 1, 'R' );
$pdf->SetFont( 'Arial', '', 10 );

// BIRTHDATE
if ( !empty ( $birthDate ) ) {
	$pdf->SetFont ( 'Arial', 'I', 10 );
	$pdf->SetTextColor ( 150, 150, 150 );
	$pdf->Cell ( 0, 5, "(DOB: $birthDate)", 0, 1, 'R' );
	$pdf->SetFont( 'Arial', '', 10 );
	}

// DATE
$date = getdate();
$month = $date['month'];
$day = $date['mday'];
$year = $date['year'];
$pdf->SetTextColor ( 150, 150, 150 );
$pdf->Cell ( 0, 5, "$month $day, $year", 0, 1, 'R');
// ==================================== END HEADER

// ############################## BODY - HEALTH PROXY
$pdf->SetTextColor ( 0, 0, 0 );
$pdf->SetFont ( 'Arial', 'B', '16' );
$pdf->Cell ( 0, 5, 'Health Proxy', 0, 1, 'L' );
$pdf->Ln ( 5 );
$pdf->SetFont ( 'Arial', '', 10 );
$pdf->Write ( 5, 'This document shall take effect in the event that I become unable to make or communicate my health care decisions. ' );

// ############# PROXY EXPIRATION
if ( !empty ( $proxyExpSet ) ) {
	switch ( $proxyExpSet[0] ) {
		case 'pExpIndef':
			$pdf->Write ( 5, 'This proxy shall remain in effect indefinitely. ');
			break;
		case 'pExpDate':
			$pdf->Write ( 5, 'This proxy shall remain in effect until ' );
			if ( !empty ( $proxy_ExpDate ) ) {
				$pdf->Write ( 5, "$proxy_ExpDate." );
				}
			else {
				$pdf->Write ( 5, '_________________.' );
				}
			break;
		case 'pExpCircum':
			$pdf->Write ( 5, 'This proxy shall remain in effect until the following circumstances cause it to expire: ' );
			if ( !empty ( $proxy_ExpCircum ) ) {
				$pdf->Write ( 5, "$proxy_ExpCircum" );
				}
			else {
				Write ( 5, '________________________________________________________________________________________________________________________________________________' );
				}
			break;
		case 'pExpBoth':
			$pdf->Write ( 5, 'This proxy shall remain in effect until either ' );
			if ( !empty ( $proxy_ExpDateBoth ) ) {
				$pdf->Write ( 5, "$proxy_ExpDateBoth " );
				}
			else {
				$pdf->Write ( 5, '_________________ ' );
				}
			$pdf->Write ( 5, 'or ' );
			if ( !empty ( $proxy_ExpCircumBoth ) ) {
				$pdf->Write ( 5, "$proxy_ExpCircumBoth" );
				}
			else {
				Write ( 5, '________________________________________________________________________________________________________________________________________________' );
				}
			$pdf->Write ( 5, ', whichever comes first.' );
			break;
		}
	$pdf->Ln ( 8 );
	}
// ============= END PROXY EXPIRATION

// ############# ACCESS TO HEALTH RECORDS
$pdf->Write ( 5, 'My health proxy has the authority to make any and all health care decisions for me' );
if ( !empty ( $authRecsSet ) ) {
	$pdf->Write ( 5, ' and has full access to my medical records' );
	}
$pdf->Write ( 5, '. ' );
$pdf->Ln ( 8 );
// ============= END ACCESS TO HEALTH RECORDS

// ############# APPOINT PROXY & ALTERNATE
$whatSet = '';
// if both first proxy and alt proxy are set
if ( !empty ( $proxyName ) && !empty ( $altHPName ) ) {
	$whatSet = 'both';
	$pdf->Write ( 5, "I, $fullName, hereby appoint the following person as my health proxy. In the event that this person is unable, unwilling, or reasonably unavailable to act as my agent, I hereby appoint my alternate. " );
	}
// else if at least one is set
else if ( !empty ( $proxyName ) && empty ( $altHPName ) ) {
	$whatSet = 'just proxy';
	$pdf->Write ( 5, "I, $fullName, hereby appoint the following person as my health proxy. " );
	}
else if ( empty ( $proxyName ) && !empty ( $altHPName ) ) {
	$whatSet = 'just alt';
	$pdf->Write ( 5, "I, $fullName, hereby appoint the following person as my health proxy. " );
	}
$pdf->Ln ( 8 );
// print accordingly
switch ( $whatSet ) {
	case ( 'both' ):
		// heading
		$pdf->SetFont ( 'Arial', 'B', 12 );
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, 'Health Proxy' );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, 'Alternate Proxy' );
		$pdf->Ln ( 6 );
		$pdf->SetFont ( 'Arial', '', 10 );
		// names
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$proxyName" );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, "$altHPName" );
		$pdf->Ln();
		// streets
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpStreet" );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, "$altHPStreet" );
		$pdf->Ln();
		// cities, states zips
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpCity, $hpState $hpZip" );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, "$altHPCity, $altHPState $altHPZip" );
		$pdf->Ln();
		// phones
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpPhone" );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, "$altHPPhone" );
		$pdf->Ln();
		// cells
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpCell" );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, "$altHPCell" );
		$pdf->Ln();
		// emails
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpEmail" );
		$pdf->Cell ( 10, 5 );
		$pdf->Cell ( 50, 5, "$altHPEmail" );
		$pdf->Ln();
		break;
	case 'just proxy':
		// heading
		$pdf->SetFont ( 'Arial', 'B', 12 );
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, 'Health Proxy' );
		$pdf->Ln ( 6 );
		$pdf->SetFont ( 'Arial', '', 10 );
		// name
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$proxyName" );
		$pdf->Ln();
		// street
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpStreet" );
		$pdf->Ln();
		// city, state zip
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpCity, $hpState $hpZip" );
		$pdf->Ln();
		// phone
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpPhone" );
		$pdf->Ln();
		// cell
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpCell" );
		$pdf->Ln();
		// email
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$hpEmail" );
		$pdf->Ln();
		break;
	case 'just alt':
		// heading
		$pdf->SetFont ( 'Arial', 'B', 12 );
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, 'Health Proxy' );
		$pdf->Ln ( 6 );
		$pdf->SetFont ( 'Arial', '', 10 );
		// name
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$altHPName" );
		$pdf->Ln();
		// street
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$altHPStreet" );
		$pdf->Ln();
		// city, state zip
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$altHPCity, $altHPState $altHPZip" );
		$pdf->Ln();
		// phone
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$altHPPhone" );
		$pdf->Ln();
		// cell
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$altHPCell" );
		$pdf->Ln();
		// email
		$pdf->Cell ( 30, 5 );
		$pdf->Cell ( 50, 5, "$altHPEmail" );
		$pdf->Ln();
		break;
	}
$pdf->Ln ( 8 );
// ============= END APPOINT PROXY & ALTERNATE
// ============================== END BODY - HEALTH PROXY



// ################################## BODY - LIVING WILL
$pdf->SetFont ( 'Arial', 'B', '16' );
$pdf->Cell ( 0, 5, 'Living Will', 0, 1, 'L' );
$pdf->Ln ( 5 );
$pdf->SetFont ( 'Arial', '', 10 );

// ############# APPLICATION OF LIVING WILL
$pdf->Write ( 5, "I, $fullName, being of sound mind, make this statement as a directive to be followed in any of the following circumstances:" );
$pdf->Ln( 7 );
if ( !empty ( $lwApplySet ) ) {
	if ( in_array ( 'lwPostponeDeath', $lwApplySet ) ) {
		$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
		$pdf->MultiCell ( 150, 5, 'If my doctors reason I am close to death and life support would only postpone the moment of my death.', 0, 'L' );
		$pdf->Ln ( 2);
		}
	if ( in_array ( 'lwComaVeg', $lwApplySet ) ) {
		$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
		$pdf->MultiCell ( 150, 5, 'If I am in a deep coma, persistent vegetative state, or have suffered other severe neurologic injury which my doctors reason is irreversible.', 0, 'L' );
		$pdf->Ln ( 2);
		}
	if ( in_array ( 'lwNoCommunicate', $lwApplySet ) ) {
		$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
		$pdf->MultiCell ( 150, 5, 'If I am irreversibly demented to the point that I can no longer recognize my friends and family nor can I convey my wishes about medical care.', 0, 'L' );
		$pdf->Ln ( 2);
		}
	if ( in_array ( 'lwTerminal', $lwApplySet ) ) {
		$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
		$pdf->MultiCell ( 150, 5, 'If my doctors reason I have a serious and irreversible condition or illness that I am unlikely to recover from, and I am no longer able to communicate my wishes.', 0, 'L' );
		$pdf->Ln ( 2);
		}
	if ( in_array ( 'lwOther', $lwApplySet ) ) {
		$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
		if ( !empty ( $lwFreeText ) ) {
			$pdf->MultiCell ( 150, 5, "$lwFreeText", 0, 'L' );
			}
		else {
			$pdf->MultiCell ( 150, 5, '________________________________________________________________', 0, 'L' );
			}
		$pdf->Ln ( 2);
		}
	}
// ============= END APPLICATION OF LIVING WILL

// ############# LIVING WILL EXPIRATION
if ( !empty ( $lwExpSet ) ) {
	switch ( $lwExpSet[0] ) {
		case 'lwExpIndef':
			$pdf->Write ( 5, 'This living will shall remain in effect indefinitely, unless I revoke it. ');
			break;
		case 'lwExpDate':
			$pdf->Write ( 5, 'This living will shall remain in effect until ' );
			if ( !empty ( $livwill_ExpDate ) ) {
				$pdf->Write ( 5, "$livwill_ExpDate." );
				}
			else {
				$pdf->Write ( 5, '_________________.' );
				}
			break;
		case 'lwExpCircum':
			$pdf->Write ( 5, 'This living will shall remain in effect until the following circumstances cause it to expire: ' );
			if ( !empty ( $livwill_ExpCircum ) ) {
				$pdf->Write ( 5, "$livwill_ExpCircum" );
				}
			else {
				$pdf->Write ( 5, '________________________________________________________________________________________________________________________________________________' );
				}
			break;
		case 'lwExpBoth':
			$pdf->Write ( 5, 'This living will shall remain in effect until either ' );
			if ( !empty ( $livwill_ExpDateBoth ) ) {
				$pdf->Write ( 5, "$livwill_ExpDateBoth " );
				}
			else {
				$pdf->Write ( 5, '_________________ ' );
				}
			$pdf->Write ( 5, 'or ' );
			if ( !empty ( $livwill_ExpCircumBoth ) ) {
				$pdf->Write ( 5, "$livwill_ExpCircumBoth" );
				}
			else {
				Write ( 5, '________________________________________________________________________________________________________________________________________________' );
				}
			$pdf->Write ( 5, ', whichever comes first.' );
			break;
		}
	$pdf->Ln ( 8 );
	}
// ============= END LIVING WILL EXPIRATION

$pdf->Ln ( 4 );
$pdf->Write ( 5, 'In the circumstances specified above, I direct my doctors to act in accordance with the following wishes:' );
$pdf->Ln ( 12 );

// ############# LIFE SUSTAINING TREATMENT
if ( !empty ( $lifeSusSet ) || !empty ( $lsReEvalSet ) ) {
	$pdf->SetFont ( 'Arial', 'B', 10 );
	$pdf->Write ( 5, 'In regard to life sustaining treatment:' );
	$pdf->SetFont ( 'Arial', '', 10 );
	$pdf->Ln ( 8 );
	}
if ( !empty ( $lifeSusSet ) ) {
	if ( in_array ( 'lsAll', $lifeSusSet ) ) {
		$pdf->Write ( 5, 'I would like all available treatment, including life-support treatment, administered in accordance with the highest standards of medical care.' );
		}
	if ( in_array ( 'lsOnlyImprove', $lifeSusSet ) ) {
		$pdf->Write ( 5, 'I would like all available treatment, including life-support treatment, however if the treatment is not improving my condition I request that it be stopped.' );
		}
	if ( in_array ( 'lsWithhold', $lifeSusSet ) ) {
		$pdf->Write ( 5, 'I ask to withhold only certain specific life-support therapies.' );
		if ( !empty ( $lsWithholdSet ) ) {
			$pdf->Write ( 5, ' I would like to receive all available treatment except the following:' );
			$pdf->Ln ( 8 );
			if ( in_array ( 'lsNoCPR', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'No Cardiopulmonary Resuscitation (CPR)', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'lsNoDialysis', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'No Dialysis', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'lsNoSurgery', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'No major curative surgery', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'lsNoIntub', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'No Intubation (mechanical respiration)', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'lsNoDrugs', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'No other drugs (besides for comfort)', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'lsNoElecFib', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'No Electric Fibrillation', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'lsNoOther', $lsWithholdSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				if ( !empty ( $lsNoOtherText ) ) {
					$pdf->MultiCell ( 150, 5, "$lsNoOtherText", 0, 'L' );
					}
				else {
					$pdf->MultiCell ( 150, 5, '_____________________________________________________________________________', 0, 'L' );
					}
				$pdf->Ln ( 2 );
				}
			}
		if ( !empty ( $lsTrialIntubSet ) ) {
			$pdf->Write ( 5, 'Allow a trial period of intubation (mechanical respiration), but if there is no improvement in my condition, I ask that it be removed.' );
			$pdf->Ln ();
			}
		}
	if ( in_array ( 'lsComfort', $lifeSusSet ) ) {
		$pdf->Write ( 5, 'I ask to withhold (or if already started, to stop) all forms of therapy, including life-support treatment, that are not intended solely for my comfort.' );
		}
	}
if ( !empty ( $lsReEvalSet ) ) {
	$pdf->Write ( 5, 'I request that my doctors regularly reevaluate my plan for life sustaining treatment to be sure it is meeting my needs and in accordance with my wishes.' );
	}
$pdf->Ln ( 8 );
// ============= END LIFE SUSTAINING TREATMENT

// ############# ARTIFICIAL NUTRITION & HYDRATION
if ( !empty ( $artNutHydSet ) || !empty ( $anhReEvalSet ) ) {
	$pdf->SetFont ( 'Arial', 'B', 10 );
	$pdf->Write ( 5, 'In regard to artificial nutrition and hydration:' );
	$pdf->SetFont ( 'Arial', '', 10 );
	$pdf->Ln ( 8 );
	}
if ( !empty ( $artNutHydSet ) ) {
	if ( in_array ( 'anhMostEffect', $artNutHydSet ) ) {
		$pdf->Write ( 5, 'I want to receive nutrition and hydration by the most effective means.' );
		}
	if ( in_array ( 'anhAvoid', $artNutHydSet ) ) {
		$pdf->Write ( 5, 'I feel strongly that I do not want certain means of artificial nutrition used.' );
		if ( !empty ( $anhAvoidSet ) ) {
			$pdf->Write ( 5, ' I would like to receive all available treatment except the following:' );
			$pdf->Ln ( 8 );
			if ( in_array ( 'anhNoNoseMouth', $anhAvoidSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'I do not want placement of a feeding tube through the nose or mouth to the stomach, even if this is deemed to be the best choice for me by my doctors.', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'anhNoSurgInsert', $anhAvoidSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'I do not want surgical insertion of a feeding tube directly into the stomach, even if this is deemed to be the best choice for me by my doctors.', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			if ( in_array ( 'anhNoIV', $anhAvoidSet ) ) {
				$pdf->Cell ( 10, 5, chr(149), 0, 0, 'R' );
				$pdf->MultiCell ( 150, 5, 'I do not want intravenous administration of nutrition and hydration, even if there are no other options.', 0, 'L' );
				$pdf->Ln ( 2 );
				}
			}
		}
	if ( in_array ( 'anhNone', $artNutHydSet ) ) {
		$pdf->Write ( 5, 'I do not want to be fed or hydrated by any artificial means.' );
		}
	if ( in_array ( 'anhSpecify', $artNutHydSet ) ) {
		$pdf->Write ( 5, 'The following are my wishes about artificial nutrition and hydration:' );
		if ( !empty ( $anhFreeText ) ) {
			$pdf->MultiCell ( 150, 5, "$anhFreeText", 0, 'L' );
			}
		else {
			$pdf->MultiCell ( 150, 5, '_____________________________________________________________________________', 0, 'L' );
			}
		}
	}
if ( !empty ( $anhReEvalSet ) ) {
	$pdf->Write ( 5, 'I request that my doctors regularly reevaluate my plan for nutrition to be sure it is meeting my needs and in accordance with my wishes.' );
	}
$pdf->Ln ( 8 );
// ============= END ARTIFICIAL NUTRITION & HYDRATION

// ############# PAIN & SUFFERING
if ( !empty ( $painSufferSet ) ) {
	$pdf->SetFont ( 'Arial', 'B', 10 );
	$pdf->Write ( 5, 'In regard to relief of pain and suffering:' );
	$pdf->SetFont ( 'Arial', '', 10 );
	$pdf->Ln ( 8 );
	if ( in_array ( 'psMaxConscious', $painSufferSet ) ) {
		$pdf->Write ( 5, 'I ask that every attempt be made to maximize consciousness.' );
		}
	if ( in_array ( 'psContact', $painSufferSet ) ) {
		$pdf->Write ( 5, 'I ask that you manage my pain in a way to maximize contact with my family and friends even if it means for me greater physical suffering.' );
		}
	if ( in_array ( 'psMinSuffer', $painSufferSet ) ) {
		$pdf->Write ( 5, 'I would like every attempt to be made to minimize my suffering, even if it may hasten my death.' );
		}
	if ( in_array ( 'psOwnWords', $painSufferSet ) ) {
		$pdf->Write ( 5, 'The following are my wishes about pain relief:' );
		$pdf->Ln ( 5 );
		if ( !empty ( $psFreeText ) ) {
			$pdf->Cell ( 10, 5, '', 0, 0, 'R' );
			$pdf->MultiCell ( 130, 5, "$psFreeText", 0, 'L' );
			}
		else {
			$pdf->Cell ( 10, 5, '', 0, 0, 'R' );
			$pdf->MultiCell ( 130, 5, '_____________________________________________________________________________', 0, 'L' );
			}
		}
	}
$pdf->Ln ( 8 );
// ============= END PAIN & SUFFERING

// ############# OWN WORDS
if ( !empty ( $ownFreeText ) ) {
	$pdf->SetFont ( 'Arial', 'B', 10 );
	$pdf->Write ( 5, 'The following are additional wishes that I would like to convey to my family and care providers.' );
	$pdf->SetFont ( 'Arial', '', 10 );
	$pdf->Ln ( 8 );
	$pdf->Cell ( 10, 5, '', 0, 0, 'R' );
	$pdf->MultiCell ( 130, 5, "$ownFreeText", 0, 'L' );
	}
$pdf->Ln ( 8 );
// ============= END OWN WORDS

// ############# OTHER INSTRUCTIONS
if ( !empty ( $otherFreeText ) ) {
	$pdf->SetFont ( 'Arial', 'B', 10 );
	$pdf->Write ( 5, 'The following are other instructions for my living will.' );
	$pdf->SetFont ( 'Arial', '', 10 );
	$pdf->Ln ( 8 );
	$pdf->Cell ( 10, 5, '', 0, 0, 'R' );
	$pdf->MultiCell ( 130, 5, "$otherFreeText", 0, 'L' );
	}
$pdf->Ln ( 8 );
// ============= END OTHER INSTRUCTIONS

// ############# ORGAN DONATION
if ( !empty ( $orgDonSet ) ) {
	$pdf->SetFont ( 'Arial', 'B', 10 );
	$pdf->Write ( 5, 'Organ Donation:' );
	$pdf->SetFont ( 'Arial', '', 10 );
	$pdf->Ln ( 8 );
	$pdf->Cell ( 10, 5, '', 0, 0, 'R' );
	$pdf->Write ( 5, 'Upon my death:' );
	if ( in_array ( 'orgDonNone', $orgDonSet ) ) {
		$pdf->Write ( 5, 'I do not give any of my organs, tissues, or parts and do not want my agent, guardian, or family to make a donation on my behalf.' );
		}
	if ( in_array ( 'orgDonAny', $orgDonSet ) ) {
		$pdf->Write ( 5, 'I give any needed organs, tissues, or parts.' );
		}
	if ( in_array ( 'orgDonSpecify', $orgDonSet ) ) {
		$pdf->Write ( 5, 'I give the following organs, tissues, or parts only:' );
		if ( !empty ( $odFreeText ) ) {
			$pdf->MultiCell ( 150, 5, "$odFreeText", 0, 'L' );
			}
		else {
			$pdf->MultiCell ( 150, 5, '_____________________________________________________________________________', 0, 'L' );
			}
		}
	if ( !empty ( $odPurposeSet ) && ( $orgDonSet[0] != 'orgDonNone' ) ) {
		$pdf->Cell ( 10, 5, '', 0, 0, 'R' );
		$pdf->MultiCell ( 150, 5, 'My gift is for the following purposes:', 0, 'L' );
		if ( in_array ( 'odTransplant', $odPurposeSet ) ) {
			$pdf->Cell ( 20, 5, chr(149), 0, 0, 'R' );
			$pdf->MultiCell ( 140, 5, 'Transplant', 0, 'L' );
			$pdf->Ln ( 2 );
			}
		if ( in_array ( 'odTherapy', $odPurposeSet ) ) {
			$pdf->Cell ( 20, 5, chr(149), 0, 0, 'R' );
			$pdf->MultiCell ( 140, 5, 'Therapy', 0, 'L' );
			$pdf->Ln ( 2 );
			}
		if ( in_array ( 'odResearch', $odPurposeSet ) ) {
			$pdf->Cell ( 20, 5, chr(149), 0, 0, 'R' );
			$pdf->MultiCell ( 140, 5, 'Research', 0, 'L' );
			$pdf->Ln ( 2 );
			}
		if ( in_array ( 'odEducation', $odPurposeSet ) ) {
			$pdf->Cell ( 20, 5, chr(149), 0, 0, 'R' );
			$pdf->MultiCell ( 140, 5, 'Education', 0, 'L' );
			$pdf->Ln ( 2 );
			}
		}
	}
$pdf->Ln ( 8 );
// ============= END ORGAN DONATION
// ============================== END BODY - LIVING WILL



// ################################## BODY - SIGNATURES
$pdf->SetFont ( 'Arial', 'B', '16' );
$pdf->Cell ( 0, 5, 'Signatures', 0, 1, 'L' );
$pdf->Ln ( 5 );
$pdf->SetFont ( 'Arial', '', 10 );
$pdf->Write ( 5, 'These directions express my legal right to determine the level and extent of my own medical treatment. I intend my instructions to be carried out, unless I have rescinded them in a new writing or by clearly indicating that I have changed my mind. I understand that I may revoke this advance directive at any time. I understand and agree that if I have any prior directives, and if I sign this advance directive, my prior directives are revoked. I understand the full importance and meaning of this advanced directive, and I am emotionally and mentally competent to state my wishes here. If I have appointed a health care proxy or agent, I request that this document guide his or her decisions about my medical care.' );
$pdf->Ln ( 8 );
$pdf->SetFont ( 'Arial', 'B', '10' );
$pdf->Write ( 5, "$fullName" );
$pdf->SetFont ( 'Arial', '', '10' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Signature   _____________________________________________      	Date   ______________' );
$pdf->Ln ( 14 );

// WITNESSES
$pdf->SetFont ( 'Arial', 'B', '10' );
$pdf->Write ( 5, 'Statement of Witnesses' );
$pdf->SetFont ( 'Arial', '', '10' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'I declare that the person who signed this document appeared to execute the living will willingly and free from duress. He or she signed (or asked another to sign for him or her) this document in my presence.' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, "I also declare that I am not the person's above appointed health proxy; I am not the person's healthcare provider, nor an employee or employer thereof; I am not financially responsible for the person's health care; I am not an employee of any insurance provider for the person; I am not a creditor to the person nor entitled to any portion of the person's estate by way of will or other legal document; I am not related by blood, adoption, or marriage to the person." );
$pdf->Ln ( 14 );
// WITNESS 1
$pdf->SetFont ( 'Arial', 'B', '10' );
$pdf->Write ( 5, 'Witness 1' );
$pdf->SetFont ( 'Arial', '', '10' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Name   ______________________________________________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Signature   _____________________________________________      	Date   ______________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Address   ______________________________________________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, '                ______________________________________________' );
$pdf->Ln ( 14 );
// WITNESS 2
$pdf->SetFont ( 'Arial', 'B', '10' );
$pdf->Write ( 5, 'Witness 2' );
$pdf->SetFont ( 'Arial', '', '10' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Name   ______________________________________________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Signature   _____________________________________________      	Date   ______________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Address   ______________________________________________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, '                ______________________________________________' );
$pdf->Ln ( 14 );
// PRIMARY CARE PHYSICIAN
$pdf->SetFont ( 'Arial', 'B', '10' );
$pdf->Write ( 5, 'Primary Care Physician (Optional)' );
$pdf->SetFont ( 'Arial', '', '10' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Name   ______________________________________________' );
$pdf->Ln ( 8 );
$pdf->Write ( 5, 'Signature   _____________________________________________      	Date   ______________' );
$pdf->Ln ( 14 );
// NOTARIZATION
if ( $usState == 'NC' || $usState == 'WV' || $usState == 'VA' ) {
	$pdf->SetFont ( 'Arial', 'B', '10' );
	$pdf->Write ( 5, 'Notarization' );
	$pdf->SetFont ( 'Arial', '', '10' );
	$pdf->Ln ( 8 );
	$pdf->Write ( 5, 'I,  _________________________________________________________, a licensed Notary Public, hereby certify that the principal named above appeared before me and swore to me and to the witnesses in my presence that this instrument is an advance directive document, and that he/she willingly and voluntarily made and executed it as his/her free act and deed for the purposes expressed in it. I further certify that  __________________________________  and  ________________________________________, witnesses, appeared before me and swore that they witnessed the principal named above sign the attached health care power of attorney, believing him/her to be of sound mind; and also swore that at the time they witnessed the signing (i) they were not related within the third degree to him/her or his/her spouse, and (ii) they did not know nor have a reasonable expectation they they would be entitled to any portion of his/her estate upon his/her death under any will or codicil thereto then existing or under the Intestate Succession Act as it provided at that time, and (iii) they were not a physician attending him/her, nor an employee of an attending physician, nor an employee of a health facility in which he/she was a patient, nor an employee of an nursing home or any group-care home in which he/she resided, and (iv) they did not have a claim against him/her. I further certify that I am satisfied as to the genuineness and due execution of the instrument.' );
	$pdf->Ln ( 8 );
	$pdf->Write ( 5, 'This the  _________________  day of  ______________________, 20 ________' );
	$pdf->Ln ( 8 );
	$pdf->Write ( 5, 'Country of  __________________________' );
	$pdf->Ln ( 8 );
	$pdf->Write ( 5, 'State of  _____________________' );
	$pdf->Ln ( 8 );
	$pdf->Write ( 5, 'Notary Public  _________________________________________________' );
	$pdf->Ln ( 8 );
	$pdf->Write ( 5, 'My commission Expires:  _________________________________________________' );
	$pdf->Ln ( 8 );
}
// ============================== END BODY - SIGNATURES

$pdf->Output();

?>
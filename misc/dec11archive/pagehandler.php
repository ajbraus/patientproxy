<?php

if ( isset ( $_POST['direction'] ) ) {
	$direction = $_POST['direction'];
}



//neither post nor get set ( index )
if ( !isset ( $_POST['current'] ) && !isset ( $_GET['usState_fieldID_req'] ) && !isset ( $_GET['links'] ) ) {
	// first time, load start page
	$currentText = 'start';
	$pageTitle = 'Welcome';
	$started = 'yes';
}

//post is set, get is not, session usState is not ( legal, map )
else if ( isset ( $_POST['current'] ) && !isset ( $_GET['usState_fieldID_req'] ) && !isset ( $_POST['beginQuestions'] ) ) {
	// get legal or map
	$currentText = $_POST['current'];
	switch ( $currentText ) {
		case 'start':
			$currentText = 'legal';
			$pageTitle = 'Disclaimer';
			break;
		case 'legal':
			$currentText = 'map';
			$pageTitle = 'Choose your state';
			// load legalpage
			break;
		case 'purchasebox':
			$currentText = 'paycards';
			break;
		/*case 'done':
			$currentText = 'pay';
			$pageTitle = 'End of Questions';
			break;
		case 'pay':*/
			/*if ( isset ( $_POST['paid'] ) && $_POST['paid'] == 'paid' ) {
				$currentText = 'pdfgen';
				}
			else {
				$currentText = 'please';
				}*/
			/*$currentText = 'pdfgen';
			$pageTitle = 'Payment';
			break;
		case 'please':
			if ( isset ( $_POST['paid'] ) && $_POST['paid'] == 'paid' ) {
				$currentText = 'pdfgen';
				$pageTitle = 'PDF Creation';
				}
			else {
				$currentText = 'please';
				$pageTitle = 'Payment';
				}
			break;*/
		/*case 'pdfgen':
			$currentText = 'thanks';
			$pageTitle = 'Thank You';
			break;*/
		default:
			$pageTitle = 'Welcome';
		}
}

//get is set, post is not ( just got usState )
else if ( !isset ( $_POST['current'] ) && isset ( $_GET['usState_fieldID_req'] ) ) {
	// capture state, load first question in set
	$usState = $_GET['usState_fieldID_req'];
	$_SESSION['usState'] = $usState;
	switch ( $usState ) {
		case 'ME':
			$questionSetName = 'ME';
			$questionSetName = 'fakeState';
			break;
		case 'WI':
			$questionSetName = 'WI';
			$questionSetName = 'wisconsin';
			break;
		default :
			//$questionSet = 'generalState';
			//require_once ( 'generalstates.php' );
			// FOR TESTING:
			$questionSetName = 'generalState';
			$usStatePrefix = 'patientInfo_patientData_';
			break;
		}
	$questionSet = ${$questionSetName};
	$currentText = $questionSet[0];
	$currentObject = ${$currentText};
}

// if another link was pressed, get will be set, post will not.
else if ( isset ( $_GET['links'] ) && !isset ( $_POST['current'] ) ) {
	$link = $_GET['links'];
	$currentText = $link;
	switch ( $currentText ) {
		case 'start' :
			$pageTitle = 'Home';
			break;
		case 'legal' :
			$pageTitle = 'Legal Notice';
			break;
		case 'how' :
			$pageTitle = 'How it works';
			break;
		case 'privacy' :
			$pageTitle = 'Privacy Policy';
			break;
		case 'feedback' :
			$pageTitle = 'Feedback';
			break;
		case 'about' :
			$pageTitle = 'About';
			break;
		case 'disclaimer' :
			$pageTitle = 'Legal Disclaimer';
			break;
		case 'contact' :
			$pageTitle = 'Contact Us';
			break;
		case 'clinical' :
			$pageTitle = 'Clinical Access';
			break;
		case 'map' :
			$pageTitle = 'Choose your US state';
			break;
		case 'pay' :
			$pageTitle = 'Payment';
			break;
		case 'pdfgen' :
			$pageTitle = 'PDF Creation';
			break;
		case 'please' :
			$pageTitle = 'Payment';
			break;
		case 'thanks' :
			$pageTitle = 'Thank You';
			break;
		default:
			$pageTitle = 'Questionaire';
			break;
		}
	}




//post is set, get is not, session usState IS.
else {
	// load variables, load next question

	$currentText = $_POST['current'];
	if ( isset ( $savedData['usState_fieldID_req'] ) ) {
		$usState = $savedData['usState_fieldID_req'];
		}
	switch ( $usState ) {
			case 'WI':
				$questionSetName = 'wisconsin';
				break;
			case 'ME':
				$questionSetName = 'fakeState';
				break;
			default :
				//$questionSet = 'generalState';
				//require_once ( 'generalstates.php' );
				// FOR TESTING:
				$questionSetName = 'generalState';
				break;
			}
	$questionSet = ${$questionSetName};
	if ( in_array ( $currentText, $questionSet ) ) {
		$val = array_search ( $currentText , $questionSet );
		if ( $direction == 'forward' ) {
			$newval = $val + 1;
			if ( $newval < count ( $questionSet ) ) {
				$currentText = $questionSet[$newval];
				}
			else if ( $newval == count ( $questionSet ) ) {
				$currentText = 'pay';
				}
			else {
				$currentText = $questionSet[0];
				}
			}
		else if ( $direction == 'backward' ) {
			$newval = $val - 1;
			if ( $newval > 0 ) {
				$currentText = $questionSet[$newval];
				}
			else if ( $newval < 0 ) {
				$currentText = 'map';
				}
			else {
				$currentText = $questionSet[0];
				}
			}
		if ( ( $currentText != 'pay' ) && ( $currentText != 'map' ) ) {
			$currentObject = ${$currentText};
			}
		}
	}
	
if ( isset ( $cleared ) && $cleared == 'yes' ) {
	$currentText = 'thanks';
	}
else if ( isset ( $cleared ) && $cleared != 'yes' ) {
	$currentText = 'pay';
	}
else if ( !isset ( $cleared ) && isset ( $_POST['stripeToken'] ) ) {
	$currentText = 'thanks';
	}	


?>

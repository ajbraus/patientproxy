<?php

// retrieve $fieldIDList from storage
if ( isset ( $_SESSION['fieldIDList'] ) ) {
	$fieldIDList = $_SESSION['fieldIDList'];
	}
else {
	$fieldIDList = array ( 'usState_fieldID_req' => 'none' );
	}
	
// capture POST or GET data into $dataCapture
if ( isset ( $_POST['current'] ) ) {
	$dataCapture = $_POST;
	}
if ( isset ( $_GET['usState_fieldID_req'] ) ) {
	$dataCapture = $_GET;
	}

// if you got something from POST or GET, work with it
if ( isset ( $dataCapture ) && !empty ( $dataCapture ) ) {
	
	foreach ( $dataCapture as $key => $value ) {
	
		// if it's a fieldID, we have work to do
		if ( preg_match ( '/_fieldID/', $key ) ) {
			
			// if required AND empty, add it to the error pile
			if ( preg_match ( '/_req/', $key ) && empty ( $value ) ) {
				//$requiredEmptyError .= $key;
				}
				
			// otherwise, make sure it's in our fieldIDList
			else if ( array_key_exists ( $key, $fieldIDList ) !== false ) {
			
				// get its validation info
				$validator = $fieldIDList[$key];

				// if it checks out: yay! else add to error pile
				switch ( $validator ) {
					/*case 'date':
						//check date
						if ( 1 == 1 ) {
							$valid = 'yes';
							}
						else {
							$notValidError .= $key;
							}
						break;
					case 'nameVal':
						if ( $key == $value ) {
							$valid = 'yes';
							}
						else {
							$notValidError .= $key;
							}
						break;
					case 'none':
						$valid = 'yes';
						break;*/
					default:
						$valid = 'yes';
						break;
					}
				}
			
			// TESTING CHANGE: IGNORE VALIDATION
			if ( !isset ( $valid ) ) {
				$valid = 'yes';
				}
				
			// if valid, clean up & add to stack
			if ( $valid == 'yes' ) {
				
				if ( !is_array ( $value ) ) {
					$value = htmlspecialchars ( $value );
					}
				else {
					foreach ( $value as $subVal ) {
						$subVal = htmlspecialchars ( $subVal );
						}
					}

				$addToList = array ( $key => $value );

				if ( empty ( $toStoreInSession ) ) {
					$toStoreInSession = array ();
					}

				$toStoreInSession = array_merge ( $toStoreInSession, $addToList );
				}
			}
		}
		
		//########################################
		
		// if it's an array... help!
		/*if ( is_array ( $key ) ) {
			
			foreach ( $key as $subVal ) {
			
			// if required AND empty, add it to the error pile
			if ( preg_match ( '/_req$/', $subkey ) && empty ( $subVal ) ) {
				$requiredEmptyError .= $subkey;
				}
			
			// otherwise, make sure it's in our fieldIDList
			else if ( array_key_exists ( $subkey, $fieldIDList ) !== false ) {
			
				// get its validation info
				$validator = $fieldIDList[$subkey];

				// if it checks out: yay! else add to error pile
				switch ( $validator ) {
					case 'date':
						//check date
						if ( 1 == 1 ) {
							$valid = 'yes';
							}
						else {
							$notValidError .= $key;
							}
						break;
					case 'nameVal':
						if ( $key == $value ) {
							$valid = 'yes';
							}
						else {
							$notValidError .= $key;
							}
						break;
					case 'none':
						$valid = 'yes';
						break;
					default:
						$valid = 'yes';
						break;
					}
				}
			
			// if valid, clean up & add to stack
			if ( $valid == 'yes' ) {
				
				if ( !is_array ( $subVal ) ) {
					$value = htmlspecialchars ( $subVal );
					}
				else {
					foreach ( $subVal as $micro ) {
						$micro = htmlspecialchars ( $micro );
						}
					}

				$addToList = array ( $subkey => $subVal );

				if ( empty ( $toStoreInSession ) ) {
					$toStoreInSession = array ();
					}

				$toStoreInSession = array_merge ( $toStoreInSession, $addToList );
				}
			}
		}*/
	}
	
// dump SESSION vars into local var
if ( isset ( $_SESSION['savedData'] ) && !empty ( $_SESSION['savedData'] ) ) {
	$savedData = $_SESSION['savedData'];
	}
else {
	$savedData = array ();
	}

// if stored data and posted data collected, merge 'em
if ( isset ( $savedData ) && isset ( $toStoreInSession ) ) {
	$savedData = array_merge ( $savedData, $toStoreInSession );
	}

$_SESSION['savedData'] = $savedData;

?>

				
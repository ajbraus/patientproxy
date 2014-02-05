<?php
$RequestSignature = md5($_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'].print_r($_POST, true));

if ($_SESSION['LastRequest'] == $RequestSignature)
{
	$refreshed = true;
	}
else
{
	$refreshed = false;
	$_SESSION['LastRequest'] = $RequestSignature;
}
if ( isset ( $_POST['vouchercode'] ) ) {
	$cleared = '';
	$vouchercode = '';
	$vouchercode = trim ( $_POST['vouchercode'] );
	if ( strlen ( $vouchercode ) == 5 ) {
		$vouchercode = "'" . $vouchercode . "'";
		require_once('login.php');
		$dbc = mysqli_connect ( $db_hostname, $db_username, $db_password, $db_database);
		$query = "SELECT vouchercode, voucher_pk, used FROM vouchercodes WHERE vouchercode=$vouchercode";
		$result = mysqli_query ( $dbc, $query );
		$num = mysqli_num_rows ( $result );
		if ( $num == 1 ) {
			$row = mysqli_fetch_row ( $result );
			$used = $row[2];
			$pk = $row[1];
			$pk = "'" . $pk . "'";
			if ( $used == NULL ) {
				$cleared = 'yes';
				$update = "UPDATE vouchercodes SET used=1, useddate=NOW() WHERE vouchercode=$vouchercode";
				$done = mysqli_query ( $dbc, $update );
				}
			else {
				$cleared = 'no';
				}
			}
		else {
			$cleared = 'error';
			}
		}
	else {
		$cleared = 'invalid';
		}
	}
else if ( isset ( $_POST['stripeToken'] ) && !$refreshed ) {
	// get the credit card details submitted by the form
	$token = $_POST['stripeToken'];
	$chargeAmount = $_POST['chargeAmount'];
	// set your secret key: remember to change this to your live secret key in production
	// see your keys here https://manage.stripe.com/account
	Stripe::setApiKey("Y99QKdT9CSKYsK6FP7rhNMm7WgRGsOsg");
	
	// create the charge on Stripe's servers - this will charge the user's card
	$charge = Stripe_Charge::create(array(
	  "amount" => $chargeAmount, // amount in cents, again
	  "currency" => "usd",
	  "card" => $token,
	  "description" => "payinguser@example.com")
	);	
	}

			
// add email to subscription database
if ( isset($_POST['emailaddress']) && !$refreshed ) {
	// add email to database
	require_once('login.php');
	$dbc = mysqli_connect ( $db_hostname, $db_username, $db_password, $db_database);
	$emailaddress = $_POST['emailaddress'];
	$idcode = uniqid ( 'email', 1 );
	$query = "INSERT INTO emailrenew (emailaddress, idcode, startdate) VALUES" . "('$emailaddress', '$idcode', NOW())";
	$result = mysqli_query ($dbc, $query);
	
	// get date from database, set nextdate and enddate
	$datequery = "SELECT startdate FROM emailrenew WHERE emailaddress = '$emailaddress' AND idcode = '$idcode' LIMIT 1";
	$dateresult = mysqli_query($dbc, $datequery);
    $daterow = mysqli_fetch_array($dateresult);
    if ($daterow != NULL) {
		$nowdate = $daterow['startdate'];
		$nextdate = date ('Y-m-d', strtotime ($nowdate . "+ 1 year" ));
		$enddate = date ('Y-m-d', strtotime ($nowdate . "+ 3 years" ));
		$updatequery = "UPDATE emailrenew SET nextdate = '$nextdate' WHERE idcode = '$idcode'";
		mysqli_query ($dbc, $updatequery);
		$updatequery2 = "UPDATE emailrenew SET enddate = '$enddate' WHERE idcode = '$idcode'";
		mysqli_query ($dbc, $updatequery2);
		$checkresult = $enddate;
		}
	mysqli_close ( $dbc );
	}

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
				if ( !isset ( $requiredEmptyError ) ) {
					$requiredEmptyError = array ();
					}
				$requiredEmptyError .= $key;
				}

			/* if we get a "SET_xxx" key, with a value of submitted, we know that a radio or checkbox field has been posted, so we have to check it's corresponding "xxx_SET[]" to see if it contains this key's value ( $elemId ). if yes, cool, that value will take care of itself, if NOT, the user has unchecked all values and we have to clear the appropriate $savedData value.*/
			if ( preg_match ( '/^SET_/', $key ) && $value == 'submitted' ) {
				/* to obtain the corresponding xxx_SET[] and $elemId, we have to reverse-engineer the names. First, get rid of the prefix SET_, this should leave us with the $elemId */
				$corrElemId = str_replace ( 'SET_', '', $key );
				/* next, get the _xxx_fieldID scruff off, leaving the element's set name exposed */
				$corrSetId = preg_replace ( '/_([^_]*)_fieldID$/', '', $corrElemId );
				/* finally, add back in _fieldID_SET */
				$setId = $corrSetId . '_fieldID_SET';
				/* if this setId is in the dataCapture, go to next dataCapture element. if not, we have to update it in savedData by adding it to addToList and toStoreInSession. */
				if ( !array_key_exists ( $setId, $dataCapture ) ) {
					$addToList = array ( $setId => array() );
					if ( !isset ( $toStoreInSession ) ) {
						$toStoreInSession = array ();
						}
					$toStoreInSession = array_merge ( $toStoreInSession, $addToList );
				}
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
			
				// TESTING CHANGE: IGNORE VALIDATION
				if ( !isset ( $valid ) ) {
					$valid = 'yes';
					}
					
				// if valid, clean up & add to stack
				if ( $valid == 'yes' ) {
					if ( !is_array ( $value ) ) {
						$value = htmlspecialchars ( $value );
						}
					$addToList = array ( $key => $value );
					if ( !isset ( $toStoreInSession ) ) {
						$toStoreInSession = array ();
						}
					$toStoreInSession = array_merge ( $toStoreInSession, $addToList );
					}
			}
		}
		if ( $key == 'usState_fieldID_req' ) {
			switch ( $value ) {
				case 'WI':
				default :
					$addToList = array ( 'patientInfo_patientData_usState_fieldID' => $value );
					if ( !isset ( $toStoreInSession ) ) {
						$toStoreInSession = array ();
						}
					$toStoreInSession = array_merge ( $toStoreInSession, $addToList );
					break;
				}
			}
	}
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

				
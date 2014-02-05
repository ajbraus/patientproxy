<?php
switch ( $currentText ) {
	case 'start' :
		require_once ( 'pages/start.php' );
		break;
	case 'legal' :
		page_body ( 'start' );
		require_once ( 'pages/legal.php' );
		page_body ( 'end' );
		break;
	case 'how' :
		page_body ( 'start' );
		require_once ( 'pages/how.php' );
		page_body ( 'end' );
		break;
	case 'privacy' :
		page_body ( 'start' );
		require_once ( 'pages/privacy.php' );
		page_body ( 'end' );
		break;
	case 'feedback' :
		page_body ( 'start' );
		require_once ( 'pages/feedback.php' );
		page_body ( 'end' );
		break;
	case 'disclaimer_no_button' :
		page_body ( 'start' );
		require_once ( 'pages/disclaimer_no_button.php' );
		page_body ( 'end' );
		break;
	case 'disclaimer' :
		page_body ( 'start' );
		require_once ( 'pages/disclaimer.php' );
		page_body ( 'end' );
		break;
	case 'contact' :
		page_body ( 'start' );
		require_once ( 'pages/contact.php' );
		page_body ( 'end' );
		break;
	case 'clinical' :
		page_body ( 'clinical' );
		require_once ( 'pages/clinical.php' );
		page_body ( 'end' );
		break;
	case 'map' :
		page_body ( 'start' );
		require_once ( 'pages/map.php' );
		page_body ( 'end' );
		break;
	case 'pay' :
		require_once ( 'pages/pay.php' );
		break;
	case 'thanks' :
		page_body ( 'start' );
		require_once ( 'pages/thanks.php' );
		page_body ( 'end' );
		break;
	case 'scholarship' :
		page_body ( 'start' );
		require_once ( 'pages/scholarship.php' );
		page_body ( 'end' );
		break;
	case 'purchasebox' :
		page_body ( 'start' );
		require_once ( 'pages/purchasebox.php' );
		page_body ( 'end' );
		break;
	case 'paycards' :
		page_body ( 'start' );
		require_once ( 'pages/paycards.php' );
		page_body ( 'end' );
		break;
	case 'thanksbulk':
		page_body ( 'start' );
		require_once ( 'pages/thanksbulk.php' );
		page_body ( 'end' );
		break;
	default :
		question_body ( 'start' );
		start_form ( $currentText, 'POST' );
		hidden_variable ( 'beginQuestions', 'yes' );
		$addToSessionList = array ();
		questionpage_builder ( $currentObject );
		$fieldIDList = array_merge ( $fieldIDList, $addToSessionList );
		$_SESSION['fieldIDList'] = $fieldIDList;
		end_form_both ();
		question_body ( 'end' );
		break;
		
	}

?>
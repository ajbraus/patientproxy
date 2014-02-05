<?php
switch ( $currentText ) {
	case 'start' :
		start_form ( 'start', 'POST' );
		require_once ( 'pages/start.php' );
		end_form_onebutton ( 'BEGIN' );
		break;
	case 'legal' :
		start_form ( 'legal', 'POST' );
		require_once ( 'pages/legal.php' );
		end_form_onebutton ( 'CONTINUE' );
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
	case 'about' :
		page_body ( 'start' );
		require_once ( 'pages/about.php' );
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
	case 'map' :
		page_body ( 'start' );
		require_once ( 'pages/map.php' );
		page_body ( 'end' );
		break;
	case 'done' :
		start_form ( 'done', 'POST' );
		end_form_onebutton ( 'PAY' );
		require_once ( 'pages/done.php' );
		break;
	case 'pay' :
		start_form ( 'pay', 'POST' );
		end_form_onebutton ( 'PAY' );
		require_once ( 'pages/pay.php' );
		break;
	case 'pdfgen' :
		start_form ( 'pdfgen', 'POST' );
		end_form_onebutton ( 'PAY' );
		require_once ( 'pages/pdfgen.php' );
		break;
	case 'please' :
		start_form ( 'please', 'POST' );
		end_form_onebutton ( 'PAY' );
		require_once ( 'pages/please.php' );
		break;
	case 'thanks' :
		page_body ( 'start' );
		require_once ( 'pages/thanks.php' );
		page_body ( 'end' );
		break;
	default :
		question_body ( 'start' );
		start_form ( $currentText, 'POST' );
		hidden_variable ( 'beginQuestions', 'yes' );
		$addToSessionList = array ();
		questionpage_builder ( $currentObject );
		$fieldIDList = array_merge ( $fieldIDList, $addToSessionList );
		/*echo '<pre style="font-size: 10pt;">';
		print_r ( $fieldIDList );
		echo '</pre>';*/
		$_SESSION['fieldIDList'] = $fieldIDList;
		end_form_both ();
		question_body ( 'end' );
		break;
		
	}

?>
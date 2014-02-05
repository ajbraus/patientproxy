<?php

// ################################## PAGE BODY
function page_body ( $which ) {
	if ( $which == 'start' ) {
		echo <<<EOT
		
	<div class="pagecontent">
	
EOT;
	}
	else if ( $which == 'end' ) {
		echo <<<EOT
		
	</div><!-- close pagecontent div -->
	
EOT;
	}
}// ================================== END PAGE BODY



// ################################## QUESTION BODY
function question_body ( $which ) {
	if ( $which == 'start' ) {
		echo <<<EOT
		
	<div class="questionblock">
	
EOT;
	}
	else if ( $which == 'end' ) {
		echo <<<EOT
		
	</div><!-- close questionblock div -->
	
EOT;
	}
}// ================================== END QUESTION BODY



// ################################## HIDDEN VARIABLE
function hidden_variable ( $name, $value ) {
	echo <<<EOT
	
	<input type="hidden" name="$name" value="$value" />
	
EOT;
}// ================================== END HIDDEN VARIABLE



// ################################## START FORM
function start_form ( $currentText, $method ) {
	$path = $_SERVER['PHP_SELF'];
	echo <<<EOT
	
	<form action="$path" method="$method">
		<input type="hidden" name="current" value="$currentText" />
		
EOT;
}// ================================== END START FORM



// ################################## FORM END BOTH
function end_form_both () {
	echo <<<EOT
	
		<button type="submit" class="backbutton" name="direction" value="backward">BACK</button>
		<button type="submit" class="nextbutton" name="direction" value="forward">CONTINUE</button>
	</form>
	
EOT;
}// ================================== END FORM END BOTH



// ################################## FORM ONEBUTTON END
function end_form_onebutton ( $buttonText ) {
	echo <<<EOT
	
		<button type="submit" class="nextbutton" name="direction" value="neither">$buttonText</button>
	</form>
	
EOT;
}// ================================== END FORM ONEBUTTON END



// ################################## ADD HEADING
function add_heading ( $number, $text ) {
	echo "\n<h$number>$text</h$number>\n";
}// ================================== END ADD HEADING



// ################################## QUESTIONPAGE BUILDER
function questionpage_builder ( $qpObject ) {
	// first display label text and any help text
	echo <<<EOT
	
		<p class="questiontext">$qpObject->labelText<span class="help">?</span><br />
		<span class="helptext">$qpObject->helpText</span></p>
		
EOT;

	// for each group of questions, call fieldset_builder
	foreach ( $qpObject->childElements as $fsObject ) {
		fieldset_builder ( $fsObject, $qpObject->idName );
		
	}
}// ================================== END QUESTIONPAGE BUILDER



// ################################## FIELDSET BUILDER
function fieldset_builder ( $fsObject, $idPrefix ) {
	// set the id of the fieldset = questionId_fieldsetId
	$fieldSetId = $idPrefix . '_' . $fsObject->idName;
	
	// begin fieldset, class = questionType_set
	echo "\n\t\t" . '<fieldset class="' . $fsObject->childrenType . '_set" id="' . $fieldSetId . '">' . "\n";
	
	// if there is label text for fieldset, display it as legend
	if ( $fsObject->labelText != '' ) {
		echo "\n<legend>$fsObject->labelText</legend>\n";
	}
	
	// start unordered list with class = questiontype_ul
	echo "\n\t\t" . '<ul class="' . $fsObject->childrenType . '_ul">';
	
	// for each child question, call element_display to build it
	foreach ( $fsObject->childElements as $bqObject ) {
		element_display ( $bqObject, $fieldSetId );
		
	}
	
	// close ul and fieldset
	echo "\n\t\t" . '</ul></fieldset><!-- close of ul, fieldset -->' . "\n";	
}// ================================== END FIELDSET BUILDER



// ################################## ELEMENT DISPLAY
function element_display ( $bqObject, $elemIdPrefix ) {
	
	global $savedData;
	global $addToSessionList;
	
	// fetch type, set question's id, set fieldset data if selection element
	$type = $bqObject->inputType;
	$elemId = $elemIdPrefix . '_' . $bqObject->idName . '_fieldID';
	if ( $bqObject->required == 'yes' ) {
		$elemId .= '_req';
		}
	/*if ( $type == 'checkbox' || $type == 'radio' ) {
		$elemSetId = $elemIdPrefix . '_fieldID[]';
		$toAddNext = array ( $elemSetId => 'none', $elemId => $bqObject->validationType );
		}
	else {*/
		$toAddNext = array ( $elemId => $bqObject->validationType );
		/*}*/
	$addToSessionList = array_merge ( $addToSessionList, $toAddNext );
	/*if ( $type == 'checkbox' || $type == 'radio' ) {
		echo '<pre style="font-size: 10pt;">field is checkbox or radio, made it into if clause<br />';
		if ( isset ( $savedData[$elemSetId] ) ) {
			echo "elem set id = $elemSetId<br />";
			if ( array_search ( $bqObject->choiceValue, $savedData[$elemSetId] ) ) {
				echo 'choiceValue is in the set array!</pre>';
				$value = $bqObject->choiceValue;
				}
			}
		}
	else {*/
		if ( isset ( $savedData[$elemId] ) ) {
				$value = $savedData[$elemId];
			}
		/*}*/
	
	// begin list item
	echo "\n\t\t" . '<li class="' . $type . '_li">';
	
/*	echo <<<EOT
			<pre style="font-size: 10pt;">
			<p>Type = $type<br />
			toAddNext array =
EOT;
	print_r ( $toAddNext );
	echo <<<EOT
<br />
			savedData &lt; elemId = $savedData[$elemId]<br />
			value = $value<br /></pre>
EOT;
*/
	
	// test type, display accordingly
	switch ( $type ) {
		
// ################ TEXT
		case 'text':
			echo <<<EOT
		
			<span class="form_label"><label for="$elemId">$bqObject->labelText</label></span>
			<span class="form_field"><input type="text" id="$elemId" name="$elemId" value="
EOT;
			if ( !empty ( $value ) ) { echo $value; }
			echo '" /></span><br />';
			break;
		
// ################ TEXTAREA
		case 'textarea':
			echo <<<EOT
		
			<span class="form_label"><label for="$elemId">$bqObject->labelText</label></span>
			<span class="form_field"><textarea id="$elemId" name="$elemId">
EOT;
			if ( !empty ( $value ) ) { echo $value; }
			echo '</textarea></span><br />';
			break;//==============================
		
// ################ CHECKBOX
		case 'checkbox':
			echo <<<EOT
			
			<span class="checkbox_field"><input type="checkbox" class="styled" id="$elemId" name="$elemId" value="' . $bqObject->choiceValue . '"'
EOT;
			if ( !empty ( $value ) ) { echo ' checked="checked"'; }
			echo <<<EOT
 /></span>
			<span class="checkbox_label"><label for="$elemId">$bqObject->labelText</label></span><br />
EOT;
			break;//==============================
		
// ################ RADIO
		case 'radio':
			echo <<<EOT
			
			<span class="radio_field"><input type="radio" class="styled" id="$elemId" name="$elemId" value="' . $bqObject->choiceValue . '"'
EOT;
			if ( !empty ( $value ) ) { echo ' checked="checked"'; }
			echo <<<EOT
 /></span>
			<span class="radio_label"><label for="$elemId">$bqObject->labelText</label></span><br />
EOT;
			break;//==============================
	}//===================================================
	
	// if there are sub-fieldsets under this question, build them
	if ( $bqObject->numChildren > 0 ) {
		foreach ( $bqObject->childElements as $bqfsObject ) {
		fieldset_builder ( $bqfsObject, $elemId );
		}
	}
	
	// close list item
	echo "\n\t\t</li>";	
}// ================================== END ELEMENT DISPLAY



?>
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
	
		<span class="questiontext">$qpObject->labelText</span>
		
EOT;
	if ( !empty ( $qpObject->helpText ) ) {
	echo <<<EOT
		
		<div class="helpbox">
		<span class="help">?</span><br />
		<span class="helptext">$qpObject->helpText</span>
		</div>
EOT;
	}
	
	// for each group of questions, call fieldset_builder
	foreach ( $qpObject->childElements as $fsObject ) {
		fieldset_builder ( $fsObject, $qpObject->idName );
		
	}
}// ================================== END QUESTIONPAGE BUILDER



// ################################## FIELDSET BUILDER
function fieldset_builder ( $fsObject, $idPrefix ) {
	if ( get_class ( $fsObject ) == 'QuestionFieldSet' ) {
		// set the id of the fieldset = questionId_fieldsetId
		$fieldSetId = $idPrefix . '_' . $fsObject->idName;
		// begin fieldset, class = questionType_set
		echo "\n\t\t" . '<fieldset class="' . $fsObject->childrenType . '_set" id="' . $fieldSetId . '">' . "\n";
		
		// if there is label text for fieldset, display it as legend
		if ( $fsObject->labelText != '' ) {
			echo "\n<legend>$fsObject->labelText</legend>\n";
		}
		if ( !empty ( $fsObject->helpText ) ) {
	echo <<<EOT
		
		<div class="helpbox">
		<span class="help">?</span><br />
		<span class="helptext">$fsObject->helpText</span>
		</div>
EOT;
	}
		
		// start unordered list with class = questiontype_ul
		echo "\n\t\t" . '<ul class="' . $fsObject->childrenType . '_ul">';
		
		// for each child question, call element_display to build it
		foreach ( $fsObject->childElements as $bqObject ) {
			element_display ( $bqObject, $fieldSetId );
			
		}
		
		// close ul and fieldset
		echo "\n\t\t" . '</ul></fieldset><!-- close of ul, fieldset -->' . "\n";	
		}
	else { //object is textObject
		$textObjectId = $idPrefix . '_' . $fsObject->idName;
		echo "\n\t\t" . '<p class="text_object" id="' . $textObjectId . '">' . $fsObject->textBody . '</p>';
		}
}// ================================== END FIELDSET BUILDER



// ################################## ELEMENT DISPLAY
function element_display ( $bqObject, $elemIdPrefix ) {
	
	global $savedData;
	global $addToSessionList;
	
	// fetch type, set question's id, set fieldset data if selection element
	$type = $bqObject->inputType;
	$value = '';
	$elemId = $elemIdPrefix . '_' . $bqObject->idName . '_fieldID';
	if ( $bqObject->required == 'yes' ) {
		$elemId .= '_req';
		}
	if ( $type == 'radio' || $type == 'checkbox' ) {
		$elemSetId = $elemIdPrefix . '_fieldID_SET';
		$toAddNext = array ( $elemSetId => 'none', $elemId => $bqObject->validationType );
		}
	else {
		$toAddNext = array ( $elemId => $bqObject->validationType );
		}
	$addToSessionList = array_merge ( $addToSessionList, $toAddNext );
	if ( $type == 'radio' || $type == 'checkbox') {
		if ( isset ( $savedData[$elemSetId] ) ) {
			if ( in_array ( $bqObject->choiceValue, $savedData[$elemSetId] ) ) {
				$value = $bqObject->choiceValue;
				}
			}
		}
	else {
		if ( isset ( $savedData[$elemId] ) ) {
				$value = $savedData[$elemId];
			}
		}
	
	// begin list item
	echo "\n\t\t" . '<li class="' . $type . '_li">';
	

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
			
			<input type="hidden" name="SET_$elemId" value="submitted" />
			<span class="checkbox_field"><input type="checkbox" class="styled" id="$elemId" name="
EOT;
			echo $elemSetId . '[]" value="' . $bqObject->choiceValue . '"';
			if ( !empty ( $value ) ) { 
				echo ' checked="checked"'; 
				}
			echo <<<EOT
 /></span>
			<span class="checkbox_label"><label for="$elemId">$bqObject->labelText</label></span><br />
EOT;
			break;//==============================
		
// ################ RADIO
		case 'radio':
			echo <<<EOT
			
			<input type="hidden" name="SET_$elemId" value="submitted" />
			<span class="radio_field"><input type="radio" class="styled" id="$elemId" name="
EOT;
			echo $elemSetId . '[]" value="' . $bqObject->choiceValue . '"';
			if ( !empty ( $value ) ) { 
				echo ' checked="checked"'; 
				}
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
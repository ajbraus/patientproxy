<?php

function textToObject ( $text_page, $questionSet ) {
	foreach ( $questionSet as $page ) {
		if ( $page->idName == $text_page ) {
			echo $page;
			//$arrayKey = array_search ( $page, $questionSet );
			//$newObject = $questionSet[$arrayKey];
			//return $newObject;
		}
	}
	
}


function pageNav ( $pageName, $questionSet, $mapPage ) {
	switch  ( $pageName->idName ) {
		case 'homepage' : 
			$nextPage = $mapPage;
			$nextPage_text = $mapPage->idName;
			$pageName_text = $pageName->idName; ?>
			<form name="<?php echo $pageName->idName; ?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<button type="submit" class="nextbutton" id="<?php echo $pageName->idName; ?>" name="nextpage" value="mappage">Begin</button>
			</form>
	<?php break;
		case 'mappage' :
			$nextPage = $questionSet[0];
			$nextPage_text = $questionSet[0]->idName;
			$pageName_text = $pageName->idName;
			require_once ( 'map.php' );
			break;
		default:
			$current = array_search ( $pageName, $questionSet );
			$next = $current + 1;
			if ( $current == 0 ) {
				$prevPage_text = 'mappage';
			}
			else {
				$prev = $current - 1; 
				$prevPage = $questionSet[$prev]; 
				$prevPage_text = $prevPage->idName; 
			}
			$nextPage = $questionSet[$next];
			$pageName_text = $pageName->idName;
			$nextPage_text = $nextPage->idName; ?>
				<ul class="buttons">
						<li>
							<button type="submit" class="backbutton" name="prevpage" value="<?php echo $prevPage_text; ?>">Back</button>
						</li>
						<li>
							<button type="submit" class="nextbutton" name="nextpage" value="<?php echo $nextPage_text; ?>">Continue</button>
						</li>
					</ul>
					
				</form>
				</div>
		<?php break;
	}
}



function elementDisplay ( $inputPart, $displayType, $idString ) {
	if ( $inputPart->numElements == 0 ) { 
		$finalId = $idString . '_' . $inputPart->idName;
		switch ( $inputPart->fieldType ) {
			case 'text': ?>
			<span class="fmlabel"><label for="<?php echo $finalId; ?>"><?php echo $inputPart->labelText; ?></label></span>
			<span class="fmfield"><input type="text" class="w<?php echo $inputPart->fieldLength; ?>" id="<?php echo $finalId; ?>" name="<?php echo $finalId; ?>" value="" /></span>
			
			
				
	<?php }
	}
}	




function buildContent ( $pageName ) { ?>
<div id="page_<?php echo $pageName->idName; ?>" class="questionblock">
	<form name="<?php echo $pageName->idName; ?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<p class="questiontext"><?php echo $pageName->labelText; ?><span class="help">?</span><br />
		<span class="helptext"><?php echo $pageName->helpText; ?></span></p>
		
<?php foreach ( $pageName->subElements as $subSection ) { ?>
		<div class="<?php echo $subSection->elementType; ?>">
		<?php 
		$idString = $pageName->idName . '_' . $subSection->idName;
		$displayType = $subSection->elementType;
		foreach ( $subSection->subElements as $inputPart ) {
			elementDisplay ( $inputPart, $displayType, $idString );
		} ?>
			
		</div>

<?php }

}








/*
<span class="fmlabel"><?php echo $inputPart->labelText; ?></span>
				<span class="fmfield">
				<?php switch ( $inputPart->fieldType ) { 
					case 'textarea':
						echo '<textarea rows="3" cols="3"></textarea>';
						break;
					case 'text':
						echo '<input type="text" value="" />';
						break;
					case 'radio':
						echo '<input type="radio" />';
						break;
					case 'checkbox':
						echo '<input type="checkbox" />';
						break;
					} ?></span>
*/
?>
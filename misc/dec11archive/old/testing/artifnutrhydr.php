<?php
	//set page name and get header
	$page_title = 'Artificial Nutrition &amp; Hydration';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="artifnutrhydr">
	<form name="artifnutrhydr" action="painsuffer.php" method="post">
		<p class="questiontext">Artificial Nutrition &amp; Hydration<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th><input type="radio" class="styled" id="anhmost" name="artnuthyd" value="anhmost"<?php if ($_SESSION['artnuthyd'] == 'anhmost') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="anhmost">I want to receive nutrition and hydration by the most effective means.</label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="anhavoid" name="artnuthyd" value="anhavoid"<?php if ($_SESSION['artnuthyd'] == 'anhavoid') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="anhavoid">I feel strongly that I do not want certain means of artificial nutrition used.<br />
					<table>
						<tr>
							<th><input type="checkbox" class="styled" id="anhnonosemouth" name="anhnonosemouth" value="anhnonosemouth"<?php if ($_SESSION['anhnonosemouth'] == 'anhnonosemouth') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="anhnonosemouth">I do not want placement of a feeding tube through the nose or mouth to the stomach, even if this is deemed to be the best choice for me by my doctors.</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="anhnosurginsert" name="anhnosurginsert" value="anhnosurginsert"<?php if ($_SESSION['anhnosurginsert'] == 'anhnosurginsert') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="anhnosurginsert">I do not want surgical insertion of a feeding tube directly into the stomach, even if this is deemed to be the best choice for me by my doctors.</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="anhnoiv" name="anhnoiv" value="anhnoiv"<?php if ($_SESSION['anhnoiv'] == 'anhnoiv') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="anhnoiv">I do not want intravenous administration of nutrition and hydration, even if there are no other options.</label></td>
						</tr>
					</table>
				</label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="artnuthyd" name="artnuthyd" value="anhnone"<?php if ($_SESSION['artnuthyd'] == 'anhnone') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="artnuthyd">I do not want to be fed or hydrated by any artificial means.</label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="anhspecify" name="artnuthyd" value="anhspecify"<?php if ($_SESSION['artnuthyd'] == 'anhspecify') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="anhspecify">I would like to specify in my own words my wishes about artificial nutrition and hydration.<br /><textarea cols="20" rows="3" id="anhspecifytext" name="anhspecifytext"><?php echo isset($_SESSION['anhspecifytext']) ? $_SESSION['anhspecifytext'] : '' ; ?></textarea></label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="anhdocreeval" name="anhdocreeval" value="anhdocreeval"<?php if ($_SESSION['anhdocreeval'] == 'anhdocreeval') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="anhdocreeval">I request that my doctors regularly reevaluate my plan for nutrition to be sure it is meeting my needs and in accordance with my wishes.</label></td>
			</tr>
		</table>
		
		<ul class="buttons">
			<li>
				<a href="lifesustaintrmt.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="artifnutrhydr" /><button type="submit" name="artifnutrhydr" id="nextbutton">Next</button>
			</li>
		</ul>
	</form>
</div> <!-- close div #artifnutrhydr -->

<?php 
	require_once('footer.php');
?>
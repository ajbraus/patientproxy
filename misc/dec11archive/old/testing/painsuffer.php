<?php
	//set page name and get header
	$page_title = 'Pain &amp; Suffering';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="painsuffer">
	<form name="painsuffer" action="ownwords.php" method="post">
		<h6 class="help">?</h6>
		<p class="helptext">Here is some information in case you are confused by this question</p>
		<h2>Releif of Pain &amp; Suffering</h2>
		<ul>
			<li>
				<input type="radio" name="painsuf" value="psmaxconscious"<?php if ($_SESSION['painsuf'] == 'psmaxconscious') { echo 'checked="checked"'; }; ?> /> I ask that every attempt be made to maximize consciousness.
			</li>
			<li>
				<input type="radio" name="painsuf" value="pscontact"<?php if ($_SESSION['painsuf'] == 'pscontact') { echo 'checked="checked"'; }; ?> /> I ask that you manage my pain in a way to maximize contact with my family and friends even if it means for me greater physical suffering.
			</li>
			<li>
				<input type="radio" name="painsuf" value="psminsuffer"<?php if ($_SESSION['painsuf'] == 'psminsuffer') { echo 'checked="checked"'; }; ?> /> I would like every attempt to be made to minimize my suffering, even if it may hasten my death.
			</li>
			<li>
				<input type="radio" name="painsuf" value="psownwords"<?php if ($_SESSION['painsuf'] == 'psownwords') { echo 'checked="checked"'; }; ?> /> I would like to specify in my own words my wishes about pain relief:<br /><textarea cols="20" rows="3" id="psownwordstext" name="psownwordstext"><?php echo isset($_SESSION['psownwordstext']) ? $_SESSION['psownwordstext'] : '' ; ?></textarea>
			</li>
		</ul>
		
		
		
		<ul class="buttons">
			<li>
				<h4 class="back"><a href="artifnutrhydr.php" title="Go to previous question">Back</a></h4>
			</li>
			<li>
				<h4 class="next"><input type="hidden" name="pagename" value="painsuffer" /><input type="submit" name="painsuffer" value="Continue" /></h4>
			</li>
		</ul>
	</form>
</div> <!-- close div #painsuffer -->

<?php 
	require_once('footer.php');
?>
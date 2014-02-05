<?php
	//set page name and get header
	$page_title = 'Additional Wishes';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="ownwords">
	<form name="ownwords" action="lwexpiration.php" method="post">
		<h6 class="help">?</h6>
		<p class="helptext">Here is some information in case you are confused by this question</p>
		<h2>Additional Wishes</h2>
		<ul>
			<li>
				I would like to add my own words about any other wishes I may have that I would like to convey to my family and care providers:<br /><textarea cols="20" rows="3" id="genwishestext" name="genwishestext"><?php echo isset($_SESSION['genwishestext']) ? $_SESSION['genwishestext'] : '' ; ?></textarea>
			</li>
		</ul>
		
		
		
		<ul class="buttons">
			<li>
				<h4 class="back"><a href="painsuffer.php" title="Go to previous question">Back</a></h4>
			</li>
			<li>
				<h4 class="next"><input type="hidden" name="pagename" value="ownwords" /><input type="submit" name="ownwords" value="Continue" /></h4>
			</li>
		</ul>
	</form>
</div> <!-- close div #ownwords -->

<?php 
	require_once('footer.php');
?>
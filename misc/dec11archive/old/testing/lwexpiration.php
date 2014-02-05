<?php
	//set page name and get header
	$page_title = 'Expiration of Living Will';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="lwexpiration">
	<form name="lwexpiration" action="organdonation.php" method="post">
		<h6 class="help">?</h6>
		<p class="helptext">Here is some information in case you are confused by this question</p>
		<h2>Expiration of Living Will</h2>
		<ul>
			<li>
				<input type="radio" name="lwexp" value="lwexpindef"<?php if ($_SESSION['lwexp'] == 'lwexpindef') { echo 'checked="checked"'; }; ?> /> I would like this living will to remain in effect indefinitely, unless I revoke it.
			</li>
			<li>
				<input type="radio" name="lwexp" value="lwexpdate"<?php if ($_SESSION['lwexp'] == 'lwexpdate') { echo 'checked="checked"'; }; ?> /> I would like to set an expiration date for this living will.<br />Expiration Date: <input type="text" id="lwexpdatetext" name="lwexpdatetext" value="<?php echo isset($_SESSION['lwexpdatetext']) ? $_SESSION['lwexpdatetext'] : '' ; ?>" />
			</li>
			<li>
				<input type="radio" name="lwexp" value="lwexpcircum"<?php if ($_SESSION['lwexp'] == 'lwexpcircum') { echo 'checked="checked"'; }; ?> /> I would like to set circumstances under which this living will will expire.<br />Expiration Circumstances: <br /><textarea cols="20" rows="3" id="lwexpcirctext" name="lwexpcirctext"><?php echo isset($_SESSION['lwexpcirctext']) ? $_SESSION['lwexpcirctext'] : '' ; ?></textarea>
			</li>
			<li>
				<input type="radio" name="lwexp" value="lwexpboth"<?php if ($_SESSION['lwexp'] == 'lwexpboth') { echo 'checked="checked"'; }; ?> /> I would like to set an expiration date and circumstances under which this living will will expire.<br />Expiration Date: <input type="text" id="lwexpbothdate" name="lwexpbothdate" value="<?php echo isset($_SESSION['lwexpbothdate']) ? $_SESSION['lwexpbothdate'] : '' ; ?>" /><br />
				Expiration Circumstances: <br /><textarea cols="20" rows="3" id="lwexpbothcirc" name="lwexpbothcirc"><?php echo isset($_SESSION['lwexpbothcirc']) ? $_SESSION['lwexpbothcirc'] : '' ; ?></textarea>
			</li>
		</ul>
		
		
		
		
		<ul class="buttons">
			<li>
				<h4 class="back"><a href="ownwords.php" title="Go to previous question">Back</a></h4>
			</li>
			<li>
				<h4 class="next"><input type="hidden" name="pagename" value="lwexpiration" /><input type="submit" name="lwexpiration" value="Continue" /></h4>
			</li>
		</ul>
	</form>
</div> <!-- close div #lwexpiration -->

<?php 
	require_once('footer.php');
?>
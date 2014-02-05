<?php
	//set page name and get header
	$page_title = 'Living Will';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="livingwillapply">
	<form name="livingwillapply" action="lifesustaintrmt.php" method="post">
		<p class="questiontext">Situations in which your Living Will applies.<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		
		<table>
			<tr>
				<th><input type="checkbox" class="styled" id="lwpostponedeath" name="lwpostponedeath" value="lwpostponedeath"<?php if ($_SESSION['lwpostponedeath'] == 'lwpostponedeath') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lwpostponedeath">If my doctors reason I am close to death and life support would only postpone the moment of my death.</label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="lwcomaveg" name="lwcomaveg" value="lwcomaveg"<?php if ($_SESSION['lwcomaveg'] == 'lwcomaveg') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lwcomaveg">If I am in a deep coma, persistent vegetative state, or have suffered other severe neurological injury which my doctors reason is irreversible.</label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="lwdemnocomm" name="lwdemnocomm" value="lwdemnocomm"<?php if ($_SESSION['lwdemnocomm'] == 'lwdemnocomm') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lwdemnocomm">If I am irreversibly demented to the point that I can no longer recognize my friends and family nor convey my wishes about medical care.</label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="lwtermnocomm" name="lwtermnocomm" value="lwtermnocomm"<?php if ($_SESSION['lwtermnocomm'] == 'lwtermnocomm') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lwtermnocomm">If my doctors reason I have a serious and irreversible condition or illness that I am unlikely to recover from, and I am no longer able to communicate my wishes.</label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="lwother" name="lwother" value="lwother"<?php if ($_SESSION['lwother'] == 'lwother') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lwother">I would like to specify other conditions in addition to or instead of the above choices.<br /><textarea cols="20" rows="3" name="lwothertext" id="lwothertext"><?php echo isset($_SESSION['lwothertext']) ? $_SESSION['lwothertext'] : '' ; ?></textarea></label></td>
			</tr>
		</table>
		
		<ul class="buttons">
			<li>
				<a href="authhealthrecs.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="livingwillapply" /><button type="submit" id="nextbutton" name="livingwillapply">Continue</button>
			</li>
		</ul>
		
	</form>
</div> <!-- close div #livingwillapply -->

<?php 
	require_once('footer.php');
?>
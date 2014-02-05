<?php
	//set page name and get header
	$page_title = 'Life Sustaining Treatment';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="lifesustaintrmt">
	<form name="lifesustaintrmt" action="artifnutrhydr.php" method="post">
		<p class="questiontext">Life Sustaining Treatment Options<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th><input type="radio" class="styled" id="lifesus_all" name="lifesus" value="lsall"<?php if ($_SESSION['lifesus'] == 'lsall') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lifesus_all">I would like all available treatment, including life-support treatment, administered in accordance with the highest standards of medical care.</label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="lifesus_onlyimprov" name="lifesus" value="lsonlyimprov"<?php if ($_SESSION['lifesus'] == 'lsonlyimprov') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lifesus_onlyimprov">I would like all available treatment, including life-support treatment, however if the treatment is not improving my condition I request that it be stopped.</label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="lifesus_withhold" name="lifesus" value="lswithhold"<?php if ($_SESSION['lifesus'] == 'lswithhold') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lifesus_withhold">I ask to withhold only certain specific life-support therapies:<br />
				Check all that you do not want administered.
					<table>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnocpr" name="lsnocpr" value="lsnocpr"<?php if ($_SESSION['lsnocpr'] == 'lsnocpr') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnocpr">No cardiopulmonary resuscitation (CPR)</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnodial" name="lsnodial" value="lsnodial"<?php if ($_SESSION['lsnodial'] == 'lsnodial') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnodial">No dialysis</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnosurg" name="lsnosurg" value="lsnosurg"<?php if ($_SESSION['lsnosurg'] == 'lsnosurg') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnosurg">No major curative surgery</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnointu" name="lsnointu" value="lsnointu"<?php if ($_SESSION['lsnointu'] == 'lsnointu') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnointu">No intubation (mechanical respiration)</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnodrugs" name="lsnodrugs" value="lsnodrugs"<?php if ($_SESSION['lsnodrugs'] == 'lsnodrugs') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnodrugs">No other drugs (besides for comfort)</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnoelecfib" name="lsnoelecfib" value="lsnoelecfib"<?php if ($_SESSION['lsnoelecfib'] == 'lsnoelecfib') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnoelecfib">No electric fibrillation</label></td>
						</tr>
						<tr>
							<th><input type="checkbox" class="styled" id="lsnoother" name="lsnoother" value="lsnoother"<?php if ($_SESSION['lsnoother'] == 'lsnoother') { echo ' checked="checked"'; }; ?> /></th>
							<td><label for="lsnoother">Other<br /><textarea cols="20" rows="3" id="lsnoothertext" name="lsnoothertext"><?php echo isset($_SESSION['lsnoothertext']) ? $_SESSION['lsnoothertext'] : '' ; ?></textarea></label></td>
						</tr>
					</table>
				</label></td>
			</tr>
			<tr>
				<th><input type="radio" name="lifesus" value="lsonlycomfort" class="styled" id="lsonlycomfort"<?php if ($_SESSION['lifesus'] == 'lsonlycomfort') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lsonlycomfort">I ask to withhold (or if already started, to stop) all forms of therapy, including life-support treatment, that are not intended solely for my comfort.</label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="lstrialintub" name="lstrialintub" value="lstrialintub"<?php if (isset($_SESSION['lstrialintub']) && $_SESSION['lstrialintub'] != 'lstrialintub') { echo ''; } else { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lstrialintub">Allow a trial period of intubation (mechanical respiration), but if there is no improvement in my condition, I ask that it be removed.</label></td>
			</tr>
			<tr>
				<th><input type="checkbox" class="styled" id="lsdocreeval" name="lsdocreeval" value="lsdocreeval"<?php if ($_SESSION['lsdocreeval'] == 'lsdocreeval') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="lsdocreeval">I request that my doctors regularly reevaluate my plan for life sustaining treatment to be sure it is meeting my needs and in accordance with my wishes.</label></td>
			</tr>
		</table>
		<ul class="buttons">
			<li>
				<a href="livingwillapply.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="lifesustaintrmt" /><button type="submit" id="nextbutton" name="lifesustaintrmt">Continue</button>
			</li>
		</ul>
		
	</form>
</div> <!-- close div #lifesustaintrmt -->

<?php 
	require_once('footer.php');
?>
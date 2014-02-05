<?php
	//set page name and get header
	$page_title = 'Health Proxy Expiration';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="proxyexpiration">
	<form name="proxyexpiration" action="authhealthrecs.php" method="post">
		<p class="questiontext">Set the expiration date and/or conditions for your health proxy:<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th><input type="radio" class="styled" name="proxexp" id="proxexp_pexpindef" value="pexpindef"<?php if ($_SESSION['proxexp'] == 'pexpindef') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="proxexp_pexpindef"> I would like this health care proxy to remain in effect indefinitely, unless I revoke it.</label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="proxexp_pexpdate" name="proxexp" value="pexpdate"<?php if ($_SESSION['proxexp'] == 'pexpdate') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="proxexp_pexpdate"> I would like to set an expiration date.<br />
				<table>
					<tr>
						<th>Expiration Date</th>
						<td><input type="text" id="pexpdatetext" name="pexpdatetext" value="<?php echo isset($_SESSION['pexpdatetext']) ? $_SESSION['pexpdatetext'] : '' ; ?>" /></td>
					</tr>
				</table></label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="proxexp_pexpcircum" name="proxexp" value="pexpcircum"<?php if ($_SESSION['proxexp'] == 'pexpcircum') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="proxexp_pexpcircum"> I would like to set circumstances under which this health care proxy will expire.<br />
				<table>
					<tr>
						<th>Expiration Circumstances</th>
						<td><textarea cols="20" rows="3" id="pexpcircumtext" name="pexpcircumtext"><?php echo isset($_SESSION['pexpcircumtext']) ? $_SESSION['pexpcircumtext'] : '' ; ?></textarea></td>
					</tr>
				</table></label></td>
			</tr>
			<tr>
				<th><input type="radio" class="styled" id="proxexp_pexpboth" name="proxexp" value="pexpboth"<?php if ($_SESSION['proxexp'] == 'pexpboth') { echo ' checked="checked"'; }; ?> /></th>
				<td><label for="proxexp_pexpboth"> I would like to set an expiration date and circumstances under which this health care proxy will expire.<br />
				<table>
					<tr>
						<th>Expiration Date</th>
						<td><input type="text" id="pexpbothdate" name="pexpbothdate" value="<?php echo isset($_SESSION['pexpbothdate']) ? $_SESSION['pexpbothdate'] : '' ; ?>" /></td>
					</tr>
					<tr>
						<th>Expiration Circumstances</th>
						<td><textarea cols="20" rows="3" id="pexpbothcirc" name="pexpbothcirc"><?php echo isset($_SESSION['pexpbothcirc']) ? $_SESSION['pexpbothcirc'] : '' ; ?></textarea></td>
					</tr>
				</table></label></td>
			</tr>
		</table>
		<ul class="buttons">
			<li>
				<a href="alternatehp.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="proxyexpiration" /><button type="submit" id="nextbutton" name="proxyexpiration">Continue</button>
			</li>
		</ul>
		
	</form>
</div> <!-- close div #proxyexpiration -->

<?php 
	require_once('footer.php');
?>
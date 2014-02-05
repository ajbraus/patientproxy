<?php
	//set page name and get header
	$page_title = 'Alternate Health Proxy';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="alternatehp">
	<form name="alternatehp" action="proxyexpiration.php" method="post">
		<p class="questiontext">Designate an Alternate Health Proxy<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th>Full Name</th>
				<td><input type="text" id="althpfirst" name="althpfirst" value="<?php echo isset($_SESSION['althpfirst']) ? $_SESSION['althpfirst'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>Street Address</th>
				<td><input type="text" id="althpstreet" name="althpstreet" value="<?php echo isset($_SESSION['althpstreet']) ? $_SESSION['althpstreet'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>City</th>
				<td><input type="text" id="althpcity" name="althpcity" value="<?php echo isset($_SESSION['althpcity']) ? $_SESSION['althpcity'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>State</th>
				<td><input type="text" id="althpstate" name="althpstate" value="<?php echo isset($_SESSION['althpstate']) ? $_SESSION['althpstate'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>Zip</th>
				<td><input type="text" id="althpzip" name="althpzip" value="<?php echo isset($_SESSION['althpzip']) ? $_SESSION['althpzip'] : '' ; ?>" /></td>
			</tr>
		</table>
		<ul class="buttons">
			<li>
				<a href="healthproxy.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="alternatehp" /><button type="submit" id="nextbutton" name="alternatehp">Continue</button>
			</li>
		</ul>
	</form>
</div> <!-- close div #alternatehp -->

<?php 
	require_once('footer.php');
?>
<?php
	//set page name and get header
	$page_title = 'Health Proxy Information';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="healthproxy">
	<form name="healthproxy" action="alternatehp.php" method="post">
		<p class="questiontext">Designate someone as your Health Proxy:<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th>Full Name</th>
				<td><input type="text" id="hpfirst" name="hpfirst" value="<?php echo isset($_SESSION['hpfirst']) ? $_SESSION['hpfirst'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>Street Address</th>
				<td><input type="text" id="hpstreet" name="hpstreet" value="<?php echo isset($_SESSION['hpstreet']) ? $_SESSION['hpstreet'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>City</th>
				<td><input type="text" id="hpcity" name="hpcity" value="<?php echo isset($_SESSION['hpcity']) ? $_SESSION['hpcity'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>State</th>
				<td><input type="text" id="hpstate" name="hpstate" value="<?php echo isset($_SESSION['hpstate']) ? $_SESSION['hpstate'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>Zip</th>
				<td><input type="text" id="hpzip" name="hpzip" value="<?php echo isset($_SESSION['hpzip']) ? $_SESSION['hpzip'] : '' ; ?>" /></td>
			</tr>
		</table>
		<ul class="buttons">
			<li>
				<a href="patientinfo.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="healthproxy" /><button type="submit" id="nextbutton" name="healthproxy">Continue</button>
			</li>
		</ul>
		
	</form>
</div> <!-- close div #healthproxy -->

<?php 
	require_once('footer.php');
?>
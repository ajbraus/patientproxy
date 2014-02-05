<?php
	//set page name and get header
	$page_title = 'Your Information';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="patientinfo" class="questionblock">
	<form name="patientinfo" action="healthproxy.php" method="post">
		<p class="questiontext">Your Personal Information:<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th>Full Name</th>
				<td><input type="text" class="wfull" id="userfirst" name="userfirst" value="<?php echo isset($_SESSION['userfirst']) ? $_SESSION['userfirst'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>Street Address</th>
				<td><input type="text" class="wfull" id="userstreet" name="userstreet" value="<?php echo isset($_SESSION['userstreet']) ? $_SESSION['userstreet'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>City</th>
				<td><input type="text" class="whalf" id="usercity" name="usercity" value="<?php echo isset($_SESSION['usercity']) ? $_SESSION['usercity'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>State</th>
				<td><input type="text" class="w2" id="userstate" name="userstate" maxlength="2" value="<?php echo isset($_SESSION['userstate']) ? $_SESSION['userstate'] : '' ; ?>" /></td>
			</tr>
			<tr>
				<th>Zip</th>
				<td><input type="text" class="w5" id="userzip" name="userzip" maxlength="5" value="<?php echo isset($_SESSION['userzip']) ? $_SESSION['userzip'] : '' ; ?>" /></td>
			</tr>
		</table>
		<ul class="buttons">
			<li>
				<a href="home.php" title="home"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="patientinfo" /><button type="submit" id="nextbutton" name="patientinfo">Continue</button>
			</li>
		</ul>
	</form>
</div> <!-- close div #patientinfo -->

<?php 
	require_once('footer.php');
?>
<?php
	//set page name and get header
	$page_title = 'Health Record Authorization';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="authhealthrecs">
	<form name="authhealthrecs" action="livingwillapply.php" method="post">
		<p class="questiontext">Health Record Authorization<span class="help">?</span><br />
		<span class="helptext">Here is some information in case you are confused by this question.</span></p>
		<table>
			<tr>
				<th><input type="checkbox" name="authorized" id="authorization" value="yes" class="styled" <?php if ($_SESSION['authorized'] == 'yes') { echo 'checked="checked" '; }; ?>/></th>
				<td><label for="authorized"> I authorize my proxy to get copies of my health records.</label>	</td>
			</tr>		
		</table>
		
		<ul class="buttons">
			<li>
				<a href="proxyexpiration.php" title="Go to previous question"><button id="backbutton">Back</button></a>
			</li>
			<li>
				<input type="hidden" name="pagename" value="authhealthrecs" /><button type="submit" id="nextbutton" name="authhealthrecs">Continue</button>
			</li>
		</ul>
	</form>
</div> <!-- close div #authhealthrecs -->

<?php 
	require_once('footer.php');
?>
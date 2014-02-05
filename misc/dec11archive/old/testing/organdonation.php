<?php
	//set page name and get header
	$page_title = 'Organ Donation';
	require_once('header.php');
	//store data from last question
	require_once('questionhandler.php');
?>

<div id="organdonation">
	<form name="organdonation" action="final.php" method="post">
		<h6 class="help">?</h6>
		<p class="helptext">Here is some information in case you are confused by this question</p>
		<h2>Upon my death: (initial applicable box)</h2>
		<ul>
			<li>
				<textarea cols="2" rows="1" id="orgdonnone" name="orgdonnone"><?php echo isset($_SESSION['orgdonnone']) ? $_SESSION['orgdonnone'] : '' ; ?></textarea> I do not give any of my organs, tissues, or parts and do not want my agent, guardian, or family to make a donation on my behalf,
			</li>
			<li>
				<textarea cols="2" rows="1" id="orgdonany" name="orgdonany"><?php echo isset($_SESSION['orgdonany']) ? $_SESSION['orgdonany'] : '' ; ?></textarea> I give any needed organs, tissues, or parts,
			</li>
			<li>OR</li>
			<li>
				<textarea cols="2" rows="1" id="orgdongiveonly" name="orgdongiveonly"><?php echo isset($_SESSION['orgdongiveonly']) ? $_SESSION['orgdongiveonly'] : '' ; ?></textarea> I give the following organs, tissues, or parts only:<br /><textarea cols="20" rows="3" id="orgdongivelist" name="orgdongivelist"><?php echo isset($_SESSION['orgdongivelist']) ? $_SESSION['orgdongivelist'] : '' ; ?></textarea>
			</li>
			<li>
				My gift, if I have made one, is for the following purposes:
				<ul>
					<li>
						<input type="checkbox" name="orgdontrans" value="orgdontrans"<?php if ($_SESSION['orgdontrans'] == 'orgdontrans') { echo 'checked="checked"'; }; ?> /> Transplant
					</li>
					<li>
						<input type="checkbox" name="orgdonther" value="orgdonther"<?php if ($_SESSION['orgdonther'] == 'orgdonther') { echo 'checked="checked"'; }; ?> /> Therapy
					</li>
					<li>
						<input type="checkbox" name="orgdonres" value="orgdonres"<?php if ($_SESSION['orgdonres'] == 'orgdonres') { echo 'checked="checked"'; }; ?> /> Research
					</li>
					<li>
						<input type="checkbox" name="orgdonedu" value="orgdonedu"<?php if ($_SESSION['orgdonedu'] == 'orgdonedu') { echo 'checked="checked"'; }; ?> /> Education
					</li>
				</ul>
			</li>
		</ul>
		
		
		
		<ul class="buttons">
			<li>
				<h4 class="back"><a href="lwexpiration.php" title="Go to previous question">Back</a></h4>
			</li>
			<li>
				<h4 class="next"><input type="hidden" name="pagename" value="organdonation" /><input type="submit" name="organdonation" value="Continue" /></h4>
			</li>
		</ul>
	</form>
</div> <!-- close div #organdonation -->

<?php 
	require_once('footer.php');
?>
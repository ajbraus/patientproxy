<?php
echo 'scholarship';
?>
<div id="payment">
	<div id="stripeform">
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>?links=thanks" method="POST" id="scholarshipform">
			
			
			<div class="form-row">
				<label>Name</label>
				<input type="text" size="40" autocomplete="off" class="scholarship-name" />
			</div>
			
			<div class="form-row">
				<label>Address</label>
				<input type="text" name="emailaddress" />
			</div>
			
			<div class="form-row">
				<label>Zip</label>
				<input type="text" name="emailaddress" />
			</div>
			
			<div class="form-row">
				<label>Age</label>
				<input type="text" name="emailaddress" />
			</div>
			
			<div class="form-row">
				<label>Phone Number</label>
				<input type="text" name="emailaddress" />
			</div>
			
			<div class="form-row">
				<label>Email Address</label>
				<input type="text" name="emailaddress" />
			</div>
			
			<button type="submit" class="submit-button nextbutton">SUBMIT</button>
		
		</form>
	</div><!-- close of stripeform -->
</div><!-- close of payment -->
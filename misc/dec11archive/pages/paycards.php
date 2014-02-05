<div id="payment">
	<div id="stripeform">
	
		<!-- to display errors returned by createToken -->
		<span class="payment-errors"></span>
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>?links=thanksbulk" method="POST" id="payment-form" class="bulk">
			
			<fieldset id="bulkcards" class="radio_set">
			<legend>Select the number of voucher cards you would like:</legend>
			<br />
				<input type="radio" name="boxsize" value="0" id="num10" class="styled" />
				<label for="num10">10 = Free Trial</label>
			<br />
				<input type="radio" name="boxsize" value="250" id="num25" class="styled" />
				<label for="num25">25 = $250 ($10/ea)</label>
			<br />
				<input type="radio" name="boxsize" value="450" id="num50" class="styled" />
				<label for="num50">50 = $450 ($9/ea)</label>
			<br />
				<input type="radio" name="boxsize" value="750" id="num100" class="styled" />
				<label for="num100">100 = $750 ($7/ea)</label>
			<br />
				<input type="radio" name="boxsize" value="1000" id="num250" class="styled" />
				<label for="num250">250 = $1000 ($4/ea)</label>
			</fieldset>
			
			<div class="sliderlabel">
				<label for="amountcards">Total</label>
				<input type="text" maxlength="5" id="amountcards" disabled="disabled" />
				<script type="text/javascript">
					/*var amount = new liveValidation('amount', { validMessage: "", onlyOnBlur: true });
					amount.add(Validate.Numericality, { minimum: 18, maximum: 100 } );*/
				</script>
				
			</div>
			
			<div class="form-row">
				<label>Cardholder Name</label>
				<input type="text" size="40" autocomplete="off" class="card-name" />
			</div>
			
			<div class="form-row">
				<label>Card Number</label>
				<input type="text" size="20" maxlength="20" autocomplete="off" class="card-number" />
			</div>
			
			<div class="form-row">
				<label>CVC</label>
				<input type="text" size="4" maxlength="4" autocomplete="off" class="card-cvc" />
			</div>
			
			<div class="form-row">
				<label>Expiration</label>
				<input type="text" size="2" maxlength="2" class="card-expiry-month"/>
				<span> / </span>
				<input type="text" size="4" maxlength="4" class="card-expiry-year"/>
				<span>( MM / YYYY )</span>
			</div>
			
			<div class="form-row">
				<label>Email Address</label>
				<input type="text" name="emailaddress" />
			</div>
			
			<div class="form-row">
				<label>Mailing Address</label>
				<textarea name="mailingaddress"></textarea>
			</div>
			
			<button type="submit" class="submit-button nextbutton">SUBMIT</button>
		
		</form>
	</div><!-- close of stripeform -->
</div><!-- close of payment -->
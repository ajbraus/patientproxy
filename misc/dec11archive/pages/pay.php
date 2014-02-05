

<div id="payment">
	<div id="stripeform">
		<h2>Confirm Price and Payment Method</h2>
		<p class="afford">Patient Proxy is committed to removing all barriers to people to express their health care wishes. No matter the language, no matter the cost, people have a right to express themselves. Every dollar helps Patient Proxy stay the most accessible way for people to create their advanced directive.</p>
		
		<div class="errors">	
			<!-- to display errors returned by createToken -->
			<span class="payment-errors">
			<?php 
				if ( $cleared == 'no' ) {
					echo 'This voucher has already been used.';
					}
				else if ( $cleared == 'error' || $cleared == 'invalid' ) {
					echo 'Invalid voucher code.';
					}
			?>
			</span>
		</div>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>?links=thanks" method="POST" id="payment-form">
			
			<div id="voucherbox">Have a voucher code?<br /> Enter it here:<input type="text" name="vouchercode" maxlength="5" /></div>
			
			<ul id="slidernumbers">
				<li class="start">$18</li>
				<li class="on">$36</li>
				<li class="last">$100</li>
			</ul>
			
			<div id="slider">
			</div>
			
			<div class="sliderlabel">
				<label for="amount">Total</label>
				<input type="text" maxlength="4" id="amount" disabled="disabled" />
				<script type="text/javascript">
					/*var amount = new liveValidation('amount', { validMessage: "", onlyOnBlur: true });
					amount.add(Validate.Numericality, { minimum: 18, maximum: 100 } );*/
				</script>
				
			</div>
		<div id="inputdata">
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
				<p>Providing your email address will sign you up for a free renewal once a year for the next three years.</p>
				</div>
			</div>
		</div><!-- close of #inputdata -->	
			<button type="submit" class="submit-button nextbutton">Confirm</button>
	
		</form>
		
		
		<div class="scholarshipcopy">
		<hr class="thin" />
		<p>The world of advanced care planning is growing, but it is not growing the same for all. If you feel you cannot afford the minimum suggested price of $18, please view our <a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=scholarship" title="Scholarship">scholarship page</a> to register your personal information and your proxy will be on the house.</p>
		<p>We are currently translating the site into Spanish and introducing the Clinical Voucher program so primary care physicians and other professionals can provide Patient Proxies to their patients for free.</p>
	</div><!-- close of stripeform -->
</div><!-- close of payment -->


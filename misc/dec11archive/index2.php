<?php 
session_start();

//session_destroy ();

require_once ( 'config.php' );
require_once ( 'stripe/lib/Stripe.php' );
require_once ( 'datahandler.php' );
require_once ( 'classes/basicelements.php' );
require_once ( 'states/generalstateset.php' );
require_once ( 'states/fakestateset.php' );
require_once ( 'states/wisconsin.php' );
require_once ( 'pagehandler.php' );
require_once ( 'htmlgenerator.php' );
require_once ( 'fpdf/pdfadd.php' );
require_once ( 'swift/lib/swift_required.php' );

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	echo '<title>Patient Proxy ';
	if ( isset ( $pageTitle ) ) {
		echo $pageTitle;
		}
  	echo '</title>';
?>
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/jquery.url.js"></script>    
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript" src="javascript/functions.js"></script>
<script type="text/javascript" src="javascript/custom-form-elements.js"></script>
<script type="text/javascript" src="javascript/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e90a6b437f6c7d8"></script>
<script type="text/javascript" src="javascript/livevalidation_standalone.compressed.js"></script>
<link type="text/css" rel="stylesheet" href="style/blankstyle.css" />
<link type="text/css" rel="stylesheet" href="style/style.css" />
<link type="text/css" href="javascript/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />	
<script type="text/javascript">
	function stripeResponseHandler(status, response) {
		if (response.error) {
			// re-enable the submit button
			$('.submit-button').removeAttr("disabled");
			// show the errors on the form
			$(".payment-errors").html(response.error.message);
		} else {
			var form$ = $("#payment-form");
			// token contains id, last4, and card type
			var token = response['id'];
			// insert the token into the form so it gets submitted to the server
			form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
			if ( $('form#payment-form').hasClass('bulk') ) {
				var chargeAmount = $('input[name=boxsize]:checked').attr('value') * 100;
				}
			else {
				var chargeAmount = $('#slider').slider( "option", "value" ) * 100;
				}
			form$.append("<input type='hidden' name='chargeAmount' value='" + chargeAmount + "' />");
			// and submit
			form$.get(0).submit();
		}
	}

	$(document).ready(function() {
		$("span.help").click(function(){
    		$(this).siblings("span.helptext").toggle();
    	});
    	$('input[name=boxsize]').click(function() {
			var boxPrice = $(this).attr('value');
			$('#amountcards').val( "$" + boxPrice );
		});
		$("#payment-form").submit(function(event) {
			var voucherEntered = $('input[name=vouchercode]').val();
			if ( !voucherEntered ) {
				// disable the submit button to prevent repeated clicks
				$('.submit-button').attr("disabled", "disabled");
				if ( $(this).hasClass('bulk') ) {
					var chargeAmount = $('input[name=boxsize]:checked').attr('value') * 100;
					}
				else {
					var enteredAmount = $('#slider').slider( "option", "value" ) * 100;
					if ( enteredAmount >= 1800 ) {
						var chargeAmount = enteredAmount;
						}
					else {
						var chargeAmount = 1800;
						}
					}
				// createToken returns immediately - the supplied callback submits the form if there are no errors
				Stripe.createToken({
					name: $('.card-name').val(),
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, chargeAmount, stripeResponseHandler);
				return false; // submit from callback
				}
		});
		$('#slider').slider({
			value: 36,
			min: 18,
			max: 100,
			slide: function( event, ui ) {
				$('#amount').val( "$" + ui.value );
			}
		});
		$('#amount').val( "$" + $('#slider').slider('value') );
	});
	Stripe.setPublishableKey('pk_zHjJ8JnUiYhjCb8w0A7g6zw0LcrAA');
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27941774-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="headercolor"></div>
<div id="wrapper">
	
	<div id="header">
	
		<div id="logo">
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=start"><img src="images/logo.png" title="Patient Proxy Logo" alt="Patient Proxy Logo" /></a>
			<h1 class="accessible">Patient Proxy</h1>
			<h3 class="accessible">Designate your health proxy.</h3>
		</div> <!-- close div #logo -->
		
		<div id="littlelinks">
			<ul id="topnav">
				<li class="first">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=how" title="Learn more about how to make your health proxy and why it is so important.">How it works</a>
				</li>
				<li>|</li>
				<li>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=privacy" title="View our strict privacy policy.">Privacy</a>
				</li>				
				<li>|</li>
				<li>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=feedback" title="Let us know what you think!">Feedback</a>
				</li>				
				<li>|</li>
				<li class="last">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=clinical" title="Pre-paid Vouchers">Pre-paid Vouchers</a>
				</li>
			</ul>
		</div> <!-- close div #littlelinks -->
	</div> <!-- close div #header -->
	<div id="mainbody">
	<hr class="thin" />	
	
	<?php 
	require_once ( 'body.php' ); 
	?>
	</div> <!-- close div #mainbody -->
	
	<div id="footer">
			

		<div id="bottomlinks">

			<ul id="bottomnav">
			<hr class="thin" />	
				<li class="first">
						<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=privacy" title="View our strict privacy policy.">Privacy</a>
				</li>
				<li>|</li>
				<li>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=disclaimer_no_button" title="View our strict privacy policy.">Legal Disclaimer</a>
				</li>				
				<li>|</li>
				<li class="last">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?links=contact" title="Let us know what you think!">Contact Us</a>
				</li>
			</ul> <!-- close ul #bottomnav -->
		</div> <!-- close div #bottomlinks -->
	
	</div> <!-- close div #footer -->

</div> <!-- close div #wrapper -->
</body>
</html>
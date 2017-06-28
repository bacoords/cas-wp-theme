<?php 
/*
 Template Name: Invoice Page Template
*/
get_header(); 

 
if (!empty($_POST)){
	include (TEMPLATEPATH."/lib/authorize.php");
}


?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<section>
	<div class="page-invoice">
		<div class="frame frame-mid">
			<div class="bit-1">
			<br><br><br>
				<h2 class="center">Invoice Payment Portal</h2>
				<p class="center">Thank you for your sponsorship! Please fill out the form <br> below to complete your payment</p>
				<br><br><br>
			<form id="pay-form" action="" method="post" data-validate="parsley">
				<div class="form-panel">
					<div class="form-item">
						<div class="frame">
							<div class="bit-40">
								<div class="padding">
									<h4>Invoice Information <span class="circle-number invoice-overlay-one-open cursor-pointer">?</span></h4>
									<div class="padding" style="max-width:250px">
										<input type="text" placeholder="Invoice Number*" class="form-input" name="invoice" required>
									</div>
									<div class="padding" style="max-width:250px">
										<input type="text" placeholder="Amount (U.S. $)*" class="form-input" name="amount" required>
										<h6 class="text-right">*required</h6>
									</div>
									
								</div>
							</div>
							<div class="bit-60">
								<div class="padding">
									<h4>Contact Information</h4>
									<div class="frame">
										<div class="bit-2">
											<div class="padding">
													<input type="text" placeholder="First Name*" class="form-input" name="first_name" required>
											</div>
										</div>
										<div class="bit-2">
											<div class="padding">
												<input type="text" placeholder="Last Name*" class="form-input" name="last_name" required>
											</div>
										</div>
									</div>
									<div class="padding">
										<input type="text" placeholder="Organization Name*" class="form-input" name="organization" required>
									</div>
									<div class="frame">
										<div class="bit-20">
											<div class="padding">
												<input type="tel" placeholder="Area Code*" class="form-input" name="phone_area" required>
											</div>
										</div>
										<div class="bit-40">
											<div class="padding">
												<input type="tel" placeholder="Primary Phone*" class="form-input" name="phone_number" required>
											</div>
										</div>
									</div>
									<div class="padding">
										<input type="email" placeholder="Email Address*" class="form-input" name="email" required>
									</div>
									<h6 class="text-right">*required</h6
								</div>
								
								
							</div>
						</div>
					</div>
					<br><br>
					<div class="frame">
						<div class="bit-25">
							<div class="padding">
								<h4>Payment Method</h4>
							</div>
						</div>
						<div class="bit-75">
							<div class="padding">
								<img src="<?php echo get_template_directory_uri(); ?>/images/payment.png">
							</div>
						</div>
					</div>
					<div class="frame">
						<div class="bit-2">
							<div class="padding">
								<input type="text" placeholder="Debit/Credit Card Number* (no dashes)" class="form-input" name="cc_card" required>
							</div>
						</div>
						<div class="bit-2">
							<div class="frame">
								<div class="bit-4">
									<div class="padding">
										<input type="text" placeholder="Security Code*" class="form-input" required>
									</div>
								</div>
								<div class="bit-4">
									<div class="padding">
										<h4 style="padding-top:10px"><span class="circle-number invoice-overlay-two-open cursor-pointer" style="float:left">?</span> <span style="float:right">Expires</span></h4>
									</div>
								</div>
								<div class="bit-4">
									<div class="padding">
										<select class="form-input" name="cc_month" required>
										  <option value="" disabled selected>Month*</option>
											<option value="01">January</option>
											<option value="02">February</option>
											<option value="03">March</option>
											<option value="04">April</option>
											<option value="05">May</option>
											<option value="06">June</option>
											<option value="07">July</option>
											<option value="08">August</option>
											<option value="09">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
								</div>
								<div class="bit-4">
									<div class="padding">
										<select class="form-input" name="cc_year" required>
										  <option value="" disabled selected>Year*</option>
											<option value="15">2015</option>
											<option value="16">2016</option>
											<option value="17">2017</option>
											<option value="18">2018</option>
											<option value="19">2019</option>
											<option value="20">2020</option>
											<option value="21">2021</option>
											<option value="22">2022</option>
											<option value="23">2023</option>
											<option value="24">2024</option>
											<option value="25">2025</option>
											<option value="26">2026</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br><br>
					
					<div class="padding">
						<h4>Billing Information</h4>
					</div>
					<div class="frame">
						<div class="bit-40">
							<div class="padding">
								<input type="text" placeholder="First Name*" class="form-input" name="bill_first_name" required>
							</div>
						</div>
						<div class="bit-60">
							<div class="padding">
								<input type="text" placeholder="Street Address (include Ste/Apt)*" class="form-input" name="billing_address_1" required>
							</div>
						</div>
					</div>
					<div class="frame">
						<div class="bit-40">
							<div class="padding">
								<input type="text" placeholder="Last Name*" class="form-input" name="bill_last_name" required>
							</div>
						</div>
						<div class="bit-60">
							<div class="frame">
								<div class="bit-2">
									<div class="padding">
										<input type="text" placeholder="City*" class="form-input" name="billing_city" required>
									</div>
								</div>
								<div class="bit-25">
									<div class="padding">
										<select placeholder="State*" class="form-input" name="billing_state" required>
										  <option value="" disabled selected>State*</option>

											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District Of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
								</div>
								<div class="bit-25">
									<div class="padding">
										<input type="text" placeholder="Zip Code*" class="form-input" name="billing_zip" required>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="frame">
						<div class="bit-75">
							<div class="padding">
								<input type="text" placeholder="Organization Name*" class="form-input" name="org_name" required>
								<h6 class="text-right">*required</h6>
							</div>
						</div>
						
						<div class="bit-25">
							<div class="padding text-right">
								<input type="submit" name="submit" value="Submit Payment" class="button button-block button-round">

							</div>
						</div>
					</div>
					<div class="padding center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/invoice.bottom.png" class="center">
					</div>
					
				</div>
			</div>
			</form>

			</div>
		</div>
	</div>
</section>


<!--Start Custom Overlay Frame-->
	<div class="invoice-overlay invoice-overlay-one">
			<img src="<?php echo get_template_directory_uri(); ?>/images/invoicepopup.2.png" >
	</div>
<!--End Custom Overlay Frame-->


<!--Start Custom Overlay Frame-->
	<div  class="invoice-overlay invoice-overlay-two">
			<img src="<?php echo get_template_directory_uri(); ?>/images/invoicepopup2.2.png">
	</div>
<!--End Custom Overlay Frame-->




<?php endwhile; endif; ?>

<!-- 	<script type="text/javascript"> -->
<!--   jQuery('#pay-form').parsley(); -->
<!-- </script> -->
	
<?php get_footer(); ?>
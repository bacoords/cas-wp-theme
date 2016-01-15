<?php 
/*
 Template Name: Shopping Cart Page Template
*/
get_header('cart'); 

	echo 'authorize.php loaded';
  include 'http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/lib/authorize/autoload.php';
  use net\authorize\api\contract\v1 as AnetAPI;
  use net\authorize\api\controller as AnetController;
  define("AUTHORIZENET_LOG_FILE", "phplog");
  // Common setup for API credentials
  $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  $merchantAuthentication->setName("4t5eP48gFj");
  $merchantAuthentication->setTransactionKey("65S6Z73H4uH8Adfp");
  $refId = 'ref' . time();
  // Create the payment data for a credit card
  $creditCard = new AnetAPI\CreditCardType();
  $creditCard->setCardNumber( "4111111111111111" );
  $creditCard->setExpirationDate( "2038-12");
  $paymentOne = new AnetAPI\PaymentType();
  $paymentOne->setCreditCard($creditCard);
  // Order info
  $order = new AnetAPI\OrderType();
  $order->setInvoiceNumber("101");
  $order->setDescription("Golf Shirts");
  // Line Item Info
  $lineitem = new AnetAPI\LineItemType();
  $lineitem->setItemId("Shirts");
  $lineitem->setName("item1");
  $lineitem->setDescription("golf shirt");
  $lineitem->setQuantity("1");
  $lineitem->setUnitPrice(20.95);
  $lineitem->setTaxable(false);
  // Tax info 
  $tax =  new AnetAPI\ExtendedAmountType();
  $tax->setName("level 2 tax name");
  $tax->setAmount(4.50);
  $tax->setDescription("level 2 tax");
  // Customer info 
  $customer = new AnetAPI\CustomerDataType();
  $customer->setId("15");
  $customer->setEmail("foo@example.com");
  // PO Number
  $ponumber = "15";
  //Ship To Info
  $shipto = new AnetAPI\NameAndAddressType();
  $shipto->setFirstName("Bayles");
  $shipto->setLastName("China");
  $shipto->setCompany("Thyme for Tea");
  $shipto->setAddress("12 Main Street");
  $shipto->setCity("Pecan Springs");
  $shipto->setState("TX");
  $shipto->setZip("44628");
  $shipto->setCountry("USA");
  // Bill To
  $billto = new AnetAPI\CustomerAddressType();
  $billto->setFirstName("Ellen");
  $billto->setLastName("Johnson");
  $billto->setCompany("Souveniropolis");
  $billto->setAddress("14 Main Street");
  $billto->setCity("Pecan Springs");
  $billto->setState("TX");
  $billto->setZip("44628");
  $billto->setCountry("USA");
  
  //create a transaction
  $transactionRequestType = new AnetAPI\TransactionRequestType();
  $transactionRequestType->setTransactionType( "authCaptureTransaction"); 
  $transactionRequestType->setAmount(151.51);
  $transactionRequestType->setPayment($paymentOne);
  $transactionRequestType->setOrder($order);
  $transactionRequestType->addToLineItems($lineitem);
  $transactionRequestType->setTax($tax);
  $transactionRequestType->setPoNumber($ponumber);
  $transactionRequestType->setCustomer($customer);
  $transactionRequestType->setBillTo($billto);
  $transactionRequestType->setShipTo($shipto);
  $request = new AnetAPI\CreateTransactionRequest();
  $request->setMerchantAuthentication($merchantAuthentication);
  $request->setRefId( $refId);
  $request->setTransactionRequest( $transactionRequestType);
  $controller = new AnetController\CreateTransactionController($request);
  $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
  
  if ($response != null)
  {
    $tresponse = $response->getTransactionResponse();
    if (($tresponse != null) && ($tresponse->getResponseCode()=="1") )   
    {
      echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
      echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
    }
    else
    {
        echo  "Charge Credit Card ERROR :  Invalid response\n";
    }
    
  }
  else
  {
    echo  "Charge Credit card Null response returned";
  }
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section ng-controller="CartCtrl">

	<div class="page-invoice" ng-show="!items.length">
		<div class="frame frame-mid">
			<div class="bit-1">
				<br><br><br>
				<div class="form-panel">
					<div class="form-item form-item-bottom-line">
						<h2>Items in Your Bag</h2>
					</div>
					<div class="form-item">
						<br><br><br>
						<p class="center">Please browse our site and return when your bag is no longer empty.</p>
						<br><br><br>
					</div>
				</div>
				<br><br><br>
			</div>
		</div>
	</div>
<div class="page-invoice" ng-show="items.length>0">
	<div class="frame frame-mid">
		<div class="bit-1">
		<br><br><br>
			<div class="form-panel">
				<div class="form-item form-item-bottom-line">
					<h2>Items in Your Bag</h2>
				</div>
				<div class="form-item form-item-bottom-line">
					<div class="frame" ng-repeat="item in items">
						<div class="bit-25">
							<div class="padding">
								<img src="<?php echo get_template_directory_uri(); ?>/images/OrderPoster-F15-Poster.png">
							</div>
						</div>
						<div class="bit-75">
							<div class="form-item-bottom-line">
								<h4>{{item[0][0].school}}<span style="float:right">${{item[0][0].total | currency : ""}}</span></h4>
							</div>
							<div>
								<div ng-repeat="single in item" class="frame ng-class:{'form-item-top-line padding-top': single[0].type === 'extra' }" ng-hide="$first">
									<div class="bit-60">
										<div>
											<div>
												<p class="checkout-items"><strong>{{single[0].name}}&nbsp;</strong> <a ng-click="removeItem($index, $parent.$parent.$index, single[0].type)" ng-if="single[0].name" class="text-blue cursor-pointer">Remove</a> </p>
												
											</div>
										</div>
									</div>
									<div class="bit-40">
										<div>
											<p class="checkout-items ng-class:{'text-red': single[0].name === '' }">{{single[0].subtitle}}<span style="float:right;">${{single[0].price | currency : ""}}</span></p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div>
						
					</div>
				</div>
				<div class="form-item">
					<div class="frame">
						<div class="bit-2">
							<div class="padding">
								<h6 class="checkout-items center">*Disclamre Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
								<br><br>
								<img src="<?php echo get_template_directory_uri(); ?>/images/invoice.bottom.png">
							</div>
						</div>
						<div class="bit-25">
							<br>
						</div>
						<div class="bit-25">
							<div class="padding">
								<div class="form-item-bottom-line">
									<p ng-repeat="item in items" class="checkout-items">{{item[0][0].school}} <span style="float:right">${{item[0][0].total | currency : ""}}</span></p>
								</div>
								<p class="checkout-items text-red padding-top"><strong>Total Saved<span style="float:right">${{totalSaved() | currency : ""}}</strong></span></p>
								<p class="checkout-items"><strong>Total<span style="float:right">${{totalPrice() | currency : ""}}</strong></span></p>
								<div class="padding-top">
									
								<a ng-click="showform = true" class="button button-block button-round" ng-hide="showform">CHECK OUT</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br><br>			
		</div>
	</div>
</div>

	<div class="page-invoice" ng-show="showform && items.length > 0" >
		<div class="frame frame-mid">
			<div class="bit-1">
<!--
			<br><br><br>
				<h2 class="center">Invoice Payment Portal</h2>
				<p class="center">Thank you for your sponsorship, please fill out the form <br> below to complete your payment</p>
				<br><br><br>
-->
			<form id="pay-form" action="" method="post">
				<div class="form-panel">
					<div class="form-item">
						<div class="frame">
							<div class="bit-40">
								<div class="padding">
									<br>
									<div class="padding">
										<div class="form-item-bottom-line">
											<p ng-repeat="item in items" class="checkout-items">{{item[0][0].school}} <span style="float:right">${{item[0][0].total | currency : ""}}</span></p>
										</div>
										<p class="checkout-items text-red padding-top"><strong>Total Saved<span style="float:right">${{totalSaved() | currency : ""}}</strong></span></p>
										<p class="checkout-items"><strong>Total<span style="float:right">${{totalPrice() | currency : ""}}</strong></span></p>
										<br><br>
										<input type="hidden" placeholder="Amount (U.S. $)*" class="form-input" name="amount" ng-value="totalPrice()">
									</div>
								</div>
							</div>
							<div class="bit-60">
								<div class="padding">
									<h4>Contact Information</h4>
									<div class="frame">
										<div class="bit-2">
											<div class="padding">
													<input type="text" placeholder="First Name*" class="form-input" name="first_name">
											</div>
										</div>
										<div class="bit-2">
											<div class="padding">
												<input type="text" placeholder="Last Name*" class="form-input" name="last_name">
											</div>
										</div>
									</div>
									<div class="padding">
										<input type="text" placeholder="Organization Name*" class="form-input" name="organization">
									</div>
									<div class="frame">
										<div class="bit-20">
											<div class="padding">
												<input type="tel" placeholder="Area Code*" class="form-input" name="phone_area">
											</div>
										</div>
										<div class="bit-40">
											<div class="padding">
												<input type="tel" placeholder="Primary Phone*" class="form-input" name="phone_number">
											</div>
										</div>
									</div>
						
									
								</div>
								
								
							</div>
						</div>
				
					<div class="frame">
						<div class="bit-40">
							<div class="padding">
									<input type="text" placeholder="Sponsor Representative" class="form-input" name="sponsor_representative">
							</div>
						</div>
						<div class="bit-60">
							<div class="padding">
								<input type="email" placeholder="Email Address*" class="form-input" name="email">
							</div>
							<h6 class="text-right">*required</h6>
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
								<input type="text" placeholder="Debit/Credit Card Number*" class="form-input" name="cc_card">
							</div>
						</div>
						<div class="bit-2">
							<div class="frame">
								<div class="bit-4">
									<div class="padding">
										<input type="text" placeholder="Security Code*" class="form-input">
									</div>
								</div>
								<div class="bit-4">
									<div class="padding">
										<h4 style="padding-top:10px"><span class="circle-number invoice-overlay-two-open cursor-pointer" style="float:left">?</span> <span style="float:right">Expires</span></h4>
									</div>
								</div>
								<div class="bit-4">
									<div class="padding">
										<select class="form-input" name="cc_month">
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
										<select class="form-input" name="cc_year">
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
								<input type="text" placeholder="First Name*" class="form-input" name="bill_first_name">
							</div>
						</div>
						<div class="bit-60">
							<div class="padding">
								<input type="text" placeholder="Street Address*" class="form-input" name="billing_address_1">
							</div>
						</div>
					</div>
					<div class="frame">
						<div class="bit-40">
							<div class="padding">
								<input type="text" placeholder="Last Name*" class="form-input" name="bill_last_name">
							</div>
						</div>
						<div class="bit-60">
							<div class="frame">
								<div class="bit-2">
									<div class="padding">
										<input type="text" placeholder="City*" class="form-input" name="billing_city">
									</div>
								</div>
								<div class="bit-25">
									<div class="padding">
										<select placeholder="State*" class="form-input" name="billing_state">
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
										<input type="text" placeholder="Zip Code*" class="form-input" name="billing_zip">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="frame">
						<div class="bit-75">
							<div class="padding">
								<input type="text" placeholder="Organization Name*" class="form-input">
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
				<br><br><br><br>
				<div class="invoice-success" <?php if($show_success){ }else{ ?> style="display:none;" <?php }?>>
					<h2 class="center">THANK YOU FOR YOUR PAYMENT</h2>
					<h2 class="center">We will send you a confirmation email shortly.</h2>
				</div>
				<br><br><br><br>
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


<?php get_footer(); ?>
<?php
	
		//Purchases: $_POST['purchases']
		//Invoice Amount: $_POST['amount']
		//First Name: $_POST['first_name']
		//Last Name: $_POST['last_name']
		//Organization: $_POST['organization']
		//Area Code: $_POST['phone_area']
		//Phone Number: $_POST['phone_number']
		//Email : $_POST['email']
		// Sponsor Representative : $_POST['sponsor_representative']
		//Credit Card: $_POST['cc_card']
		//Month: $_POST['cc_month']
		//Year : $_POST['cc_year']
		//Billing First Name: $_POST['bill_first_name']
		//Billing Address: $_POST['billing_address_1']
		//Billing Last Name: $_POST['bill_last_name']
		//Billing City: $_POST['billing_city']
		//Billing State: $_POST['billing_state']
		//Billing Zip: $_POST['billing_zip']
		//Billing Organization: $_POST['org_name']

		//  include (TEMPLATEPATH."/lib/anet_php_sdk/AuthorizeNet.php");
		//  include (TEMPLATEPATH."/authorize.php");

			include (TEMPLATEPATH . "/lib/vendor/autoload.php");
			use net\authorize\api\contract\v1 as AnetAPI;
			use net\authorize\api\controller as AnetController;
			define("AUTHORIZENET_LOG_FILE", "phplog");


			// Common setup for API credentials
			$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
			$merchantAuthentication->setName("6J2faV84");
			$merchantAuthentication->setTransactionKey("4jhfk6TKAB262T9G");
			$refId = 'ref' . time();

			// Create the payment data for a credit card
			$creditCard = new AnetAPI\CreditCardType();
  $cc_card = preg_replace('/\D/', '', $_POST['cc_card']);

			$creditCard->setCardNumber( $cc_card);
	$thedate = "20".$_POST['cc_year']."-".$_POST['cc_month'];
			$creditCard->setExpirationDate($thedate);
			$paymentOne = new AnetAPI\PaymentType();
			$paymentOne->setCreditCard($creditCard);

			// Order info
			$order = new AnetAPI\OrderType();
			$order->setInvoiceNumber($_POST['invoice']);
			$order->setDescription("Invoice");

			// Line Item Info
		//  $lineitem = new AnetAPI\LineItemType();
		//  $lineitem->setItemId("Shirts");
		//  $lineitem->setName("item1");
		//  $lineitem->setDescription("golf shirt");
		//  $lineitem->setQuantity("1");
		//  $lineitem->setUnitPrice(20.95);
		//  $lineitem->setTaxable(false);

			// Tax info 
		//  $tax =  new AnetAPI\ExtendedAmountType();
		//  $tax->setName("level 2 tax name");
		//  $tax->setAmount(4.50);
		//  $tax->setDescription("level 2 tax");

		//  // Customer info 
		//  $customer = new AnetAPI\CustomerDataType();
		//  $customer->setId("15");
		//  $customer->setEmail("foo@example.com");
		//
		//  // PO Number
		//  $ponumber = "15";
		//  //Ship To Info
		//  $shipto = new AnetAPI\NameAndAddressType();
		//  $shipto->setFirstName("Bayles");
		//  $shipto->setLastName("China");
		//  $shipto->setCompany("Thyme for Tea");
		//  $shipto->setAddress("12 Main Street");
		//  $shipto->setCity("Pecan Springs");
		//  $shipto->setState("TX");
		//  $shipto->setZip("44628");
		//  $shipto->setCountry("USA");

			// Bill To
			$billto = new AnetAPI\CustomerAddressType();
			$billto->setFirstName($_POST['bill_first_name']);
			$billto->setLastName($_POST['bill_last_name']);
			$billto->setCompany($_POST['organization']);
			$billto->setAddress($_POST['billing_address_1']);
			$billto->setCity($_POST['billing_city']);
			$billto->setState($_POST['billing_state']);
			$billto->setZip($_POST['billing_zip']);
			$billto->setCountry("USA");

			//create a transaction
			$transactionRequestType = new AnetAPI\TransactionRequestType();
			$transactionRequestType->setTransactionType( "authCaptureTransaction"); 
			$transactionRequestType->setAmount($_POST['amount']);
			$transactionRequestType->setPayment($paymentOne);
			$transactionRequestType->setOrder($order);
		//  $transactionRequestType->addToLineItems($lineitem);
		//  $transactionRequestType->setTax($tax);
		//  $transactionRequestType->setPoNumber($ponumber);
		//  $transactionRequestType->setCustomer($customer);
			$transactionRequestType->setBillTo($billto);
		//  $transactionRequestType->setShipTo($shipto);

			$request = new AnetAPI\CreateTransactionRequest();
			$request->setMerchantAuthentication($merchantAuthentication);
			$request->setRefId( $refId);
			$request->setTransactionRequest( $transactionRequestType);
			$controller = new AnetController\CreateTransactionController($request);
			$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
	
  if ($response != null)
  {
    $tresponse = $response->getTransactionResponse();

    if (($tresponse != null) && ($tresponse->getResponseCode()=="1") )   
    {
					
			//Flush before cart starts
			echo  "<script type='text/javascript'> Lockr.rm('CASCart'); </script>";
//      echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
//      echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
			
			$message_string = "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "<BR>" .
												'Charge Credit Card AUTH CODE : ' . $tresponse->getAuthCode() . '<BR>' .  
												'Invoice Amount: $' .  $_POST['amount'] . '<br>' . 
												'First Name: ' .  $_POST['first_name'] . '<br>' . 
												'Last Name: ' .  $_POST['last_name'] . '<br>' . 
												'Organization: ' .  $_POST['organization'] . '<br>' . 
												'Area Code: ' .  $_POST['phone_area'] . '<br>' . 
												'Phone Number: ' .  $_POST['phone_number'] . '<br>' . 
												'Email: ' .  $_POST['email'] . '<br>' . 
												'Sponsor Representative : ' . $_POST['sponsor_representative'] . '<BR>' . 
												'Purchases: ' . $_POST['purchases'];
			
			$title_string =  "New Shopping Cart Transaction: " . $tresponse->getTransId();
			
			// Create post and store on back end.
			$post = array(
				'post_title' => $title_string,
				'post_content' => $message_string,
				'post_type' => 'cas_invoice',
				'post_status' => 'private'
			);
			wp_insert_post( $post, $wp_error );
			
			$email_title_string =  "New Shopping Cart Transaction: " . $tresponse->getTransId();
			//Alert CAS with Email
			$headers = array('Content-Type: text/html; charset=UTF-8');
			wp_mail( array('design@communityallstars.com','lauren@communityallstars.com'), $email_title_string , $message_string, $headers ); 

			
			//Display Confirmation
			echo   '<div class="page-invoice">
								<div class="frame frame-mid">
									<div class="bit-1">
										<br><br><br>
										<div class="form-panel">
											<div class="form-item form-item-bottom-line">
												<h2 class="center">We will send you a confirmation email shortly.</h2>
											</div>
											<div class="form-item">
												<br><br><br>
												<p class="center">Your Purchase has been successfully processed.</p>
												<p class="center">If you pay after our normal business hours, you will receive a confirmation email the following business day.</p>
												<br><br><br>
											</div>
										</div>
										<br><br><br>
									</div>
								</div>
							</div>';
			
    }
    else
    {
        echo    '<div class="page-invoice">
								<div class="frame frame-mid">
									<div class="bit-1">
										<br><br><br>
										<div class="form-panel">
											<div class="form-item form-item-bottom-line">
												<h2 class="center">Credit Card Error</h2>
											</div>
											<div class="form-item">
												<br><br><br>
												<p class="center">Please try again or contact site manager.</p>
												<br><br><br>
											</div>
										</div>
										<br><br><br>
									</div>
								</div>
							</div>';
    }
    
  }
  else
  {
          echo   '<div class="page-invoice">
								<div class="frame frame-mid">
									<div class="bit-1">
										<br><br><br>
										<div class="form-panel">
											<div class="form-item form-item-bottom-line">
												<h2 class="center">Credit Card Error</h2>
											</div>
											<div class="form-item">
												<br><br><br>
												<p class="center">Please try again or contact site manager.</p>
												<br><br><br>
											</div>
										</div>
										<br><br><br>
									</div>
								</div>
							</div>';
  }
?>

<?php 
/*
 Template Name: Invoice Page Template
*/
get_header(); 



$test = true; //// <<------------------------------- Set to true for testing

// Process Form & Payment
if($_POST['submit']) {

	// General
	date_default_timezone_set('America/Los_Angeles');
	
	// While Developing
	ini_set("display_errors",0);
	ini_set("error_reporting",-1);
	
	// Gloabl Var	
	$wp_content = "/home/content/98/8417598/html/wp-content";
	$upload_location = $wp_content."/uploads/school_files/";
	$httpdocs_folder = "html";
	$the_domain = "http://www.communityallstar.com";
		
	if(!$_POST['invoice']) {
		// Uploaded File Handling
		ini_set("max_execution_time",600);				// 10 minutes
		ini_set("max_input_time",600);					// 10 minutes
		$max_filesize = 100 * 1024 * 1024; 				// 100 MB Per file
		ini_set("upload_max_filesize","300M");			// 300 MB total (Form allows 3 files)
		ini_set("post_max_size","300M");
		$supported_formats = array("image/gif","image/jpg","image/jpeg","image/pjpeg","image/png","image/x-png","image/tif","image/tiff","image/x-tif","image/x-tiff","application/tif","application/tiff","application/x-tif","application/x-tiff","image/bmp","image/ms-bmp","image/x-bitmap","image/x-bmp","image/x-ms-bmp","image/x-win-bitmap","image/x-windows-bmp","image/x-xbitmap","application/bmp","application/x-bmp","image/photoshop","image/x-photoshop","image/psd","image/x-psd","application/photoshop","application/x-photoshop","application/psd","application/x-psd","image/eps",	"image/x-eps","application/postscript","application/eps","application/x-eps","application/illustrator");
		
		// Calculations using post data
		$season_data = explode(" - $",$_POST['seasonSelect']);
		$season_price = str_replace(",","",$season_data[1]);
		$seasons_purchased = $season_data[0];
		/**/
		$ad_size_array = explode("(",stripslashes($_POST['size']));
		$ad_size = $ad_size_array[0];
	}
	
	// Create Email Message
	$i = 1;		// For the "File #" lines within the message 
	$email_header  = 'MIME-Version: 1.0' . "\r\n";
	$email_header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$email_header .= 'From: CAS Orders <orders@communityallstars.com>' . "\r\n";
	$email_header .= 'Cc: orders@communityallstars.com' . "\r\n";
	if($_POST['invoice']) {
		$the__subject = "An invoice has been paid!";
		$message = "An invoice has been paid!<br><br>";
		$message .= "<strong>Invoice #:</strong> ". $_POST['invoice']."<br>";
	}	
	else {
		$the__subject = "New School Submitted";
		$message = "A order has been placed for a new ad!<br><br>";
	}
	$message .= "<strong>School:</strong> ". get_the_title()."<br>";
	$message .= "<strong>Contact:</strong> ". $_POST['first_name']." ".$_POST['last_name']."<br>";
	$message .= "<strong>Email:</strong> ". $_POST['email']."<br>";
	$message .= "<strong>Phone:</strong> (". $_POST['phone_area'].") ". $_POST['phone_number']."<br>";
	if(!$_POST['invoice']) {
		$message .= "<strong>Business:</strong> (". $_POST['fax_area'].") ". $_POST['fax_number']."<br>";
		$message .= "<strong>Website:</strong> ". $_POST['website']."<br>";	
	}
	$message .= "<strong>Organization:</strong> ". $_POST['organization']."<br>";
	$message .= "<strong>Billing Name:</strong> ". $_POST['bill_first_name']." ".$_POST['bill_last_name']."<br>";
	$message .= "<strong>Billing Address:</strong> ". $_POST['billing_address_1']."<br>";
	$message .= "<strong>Billing City:</strong> ". $_POST['billing_city']."<br>";
	$message .= "<strong>Billing State:</strong> ". $_POST['billing_state']."<br>";
	$message .= "<strong>Billing Zip:</strong> ". $_POST['billing_zip']."<br>";
	if(!$_POST['invoice']) {
		$message .= "<strong>Helped by Rep:</strong> ". $_POST['business_rep']."<br>";
		$message .= "<strong>Ad Size:</strong> ".$ad_size."<br>";
		$message .= "<strong>Seasons Purchased:</strong> ".$seasons_purchased."<br>";
		$message .= "<strong>Price:</strong> ".$season_price."<br>";
	}

//	if(!$_POST['invoice']) {
//		// Process Files
//		foreach($_FILES as $file) {
//			if(!empty($file['name'])) {
//				
//				// File Handling - Individual
//				$safe_filename = preg_replace( array("/\s+/", "/[^-\.\w]+/"), array("_", ""), trim($file['name']));
//				$time_stamp = date("Y-m-d-H-i-s-u");
//				$file_location = $upload_location . $time_stamp ."-".$safe_filename;
//				
//				// Process Files			 
//				if (in_array( $file["type"],$supported_formats)) {
//					if (file_exists($file_location)) {
//						$alerts[] = "Error! ".$safe_filename . " already exists on our server.";
//					}
//					else {
//						if($file['size'] < $max_filesize) {
//							$move = move_uploaded_file($file["tmp_name"], $file_location );
//							if($move) {
//								$url = explode($httpdocs_folder,$file_location);
//								$notify = "<strong>Ad file #".$i." downloadable at:</strong> ". $the_domain. $url[1]."<br>";
//								$message .= $notify;
//								$i++;
//							}
//							else {
//								$alerts[] = "Error! Your file could not be stored. Please try again.";
//							}
//						}
//						else {
//							$alerts[] = "Error! File size too large. Please upload a file that is less than ".$max_filesize."MB";
//						}
//					}
//				}
//				else {
//				  $alerts[] = "Error! Invalid file type.";
//				}
//			}
//		}
//	}
	
	// Process Transaction if no file issues
	if(empty($alerts) || $test == true || !empty($_POST['invoice'])) {
	
		// Process Authorize.net Transaction
		require_once $wp_content."/themes/community-all-stars/authorize/AuthorizeNet.php";
		
		//$sale = new AuthorizeNetAIM("6J2faV84","2PY9Ybtsx42X37Tu");
        $sale = new AuthorizeNetAIM("6J2faV84","982ak7Y224yeCT3w");
	
		// Credentials
		$sale->setSandbox(false);
		$sale->test_request = $test;
		
		// Billing info
		$sale->first_name = $_POST['bill_first_name'];
		$sale->last_name = $_POST['bill_last_name'];
		$sale->address = $_POST['billing_address'];
		$sale->city = $_POST['billing_city'];
		$sale->state = $_POST['billing_state'];
		$sale->zip = $_POST['billing_zip'];
		
		// The Sale
		if(!empty($_POST['invoice'])) {
			$charge_amount = $_POST['amount'];
		}
		else if($test) {
			$charge_amount = 1;
		}
		else {
			$charge_amount = $season_price;
		}
		
		$sale->amount = $charge_amount;
		$sale->card_num = $_POST['cc_card'];
		$sale->exp_date = $_POST['cc_month']."/".$_POST['cc_year'];
		
		$response = $sale->authorizeAndCapture();
		
		if ($response->approved || $test == true) {
			$alerts[] = "Success! Your credit card has been charged and your order has been processed!";
			$alerts[] = "Transaction ID: ". $response->transaction_id;
			$show_success = true;
			// Add Authorize details to message & then mail
			$message .= "<strong>Amount Charged</strong> ".$response->amount."<br>";
			$message .= "<strong>Card Used:</strong> ".$response->account_number."<br>";
			$message .= "<br><strong>Authorize Transaction ID:</strong> ".$response->transaction_id."<br>";			
			$mail = mail("lauren@communityallstars.com,brett@communityallstars.com,mike@communityallstars.com", $the__subject, $message, $email_header);$mail = mail("lauren@communityallstars.com,brett@communityallstars.com,mike@communityallstars.com", "New School Submitted", $message, $email_header);
			//$mail = mail("justin@justindocanto.com", $the__subject, $message, $email_header);
		}
		else {
			$alerts[] = "There was an error with your transaction";
			// $alerts[] = $response->response_reason_code;
		 	$alerts[] = $response->response_reason_text;
		}
	}
}


?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<section>
	<div class="page-invoice">
		<div class="frame frame-mid">
			<div class="bit-1">
			<br><br><br>
				<h2 class="center">Invoice Payment Portal</h2>
				<p class="center">Thank you for your sponsorship, please fill out the form <br> below to complete your payment</p>
				<br><br><br>
			<form id="pay-form" action="" method="post">
				<div class="form-panel">
					<div class="form-item">
						<div class="frame">
							<div class="bit-40">
								<div class="padding">
									<h4>Invoice Information <span class="circle-number invoice-overlay-one-open cursor-pointer">?</span></h4>
									<div class="padding" style="max-width:250px">
										<input type="text" placeholder="Invoice Number*" class="form-input" name="invoice">
									</div>
									<div class="padding" style="max-width:250px">
										<input type="text" placeholder="Amount (U.S. $)*" class="form-input" name="amount">
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
									<div class="padding">
										<input type="email" placeholder="Email Address*" class="form-input" name="email">
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
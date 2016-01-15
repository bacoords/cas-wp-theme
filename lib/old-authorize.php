<?php

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
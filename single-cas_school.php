<?php get_header('schools'); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<?php
//Get all school metadata
$name = get_post_meta( get_the_ID(),'_cas_school_name', true );
$subheading = get_post_meta( get_the_ID(),'_cas_school_subheading', true );
$mascot = get_post_meta( get_the_ID(),'_cas_school_mascot', true );
$colors = get_post_meta( get_the_ID(),'_cas_school_colors', true );
$color_hex = get_post_meta( get_the_ID(),'_cas_school_color_hex', true );
$progorpost = get_post_meta( get_the_ID(),'_cas_school_poster_program', true );
$description = get_post_meta( get_the_ID(),'_cas_school_description', true );
$season_sports = get_post_meta( get_the_ID(),'_cas_school_season_sports', true );
$info_field_sports = get_post_meta( get_the_ID(),'_cas_school_info_field_sports', true );
$address = get_post_meta( get_the_ID(),'_cas_school_address', true );
$city = get_post_meta( get_the_ID(),'_cas_school_city', true );
$state = get_post_meta( get_the_ID(),'_cas_school_state', true );
$zip = get_post_meta( get_the_ID(),'_cas_school_zip', true );
$leads = get_post_meta( get_the_ID(),'_cas_school_leads', true );
$website_url = get_post_meta( get_the_ID(),'_cas_school_site_url', true );
$contact_name = get_post_meta( get_the_ID(),'_cas_school_contact_name', true );
$contact_title = get_post_meta( get_the_ID(),'_cas_school_contact_title', true );
$contact_phone = get_post_meta( get_the_ID(),'_cas_school_contact_phone', true );
$contact_email = get_post_meta( get_the_ID(),'_cas_school_contact_email', true );
$logo = get_post_meta( get_the_ID(),'_cas_school_logo', true );
$background = get_post_meta( get_the_ID(),'_cas_school_background', true );
$previous_posters = get_post_meta( get_the_ID(),'_cas_school_previous_posters', true );
$testimonial_text = get_post_meta( get_the_ID(),'_cas_school_testimonial_text', true );
$testimonial_name = get_post_meta( get_the_ID(),'_cas_school_testimonial_name', true );
$testimonial_business_name = get_post_meta( get_the_ID(),'_cas_school_testimonial_business_name', true );
$testimonial_business_url = get_post_meta( get_the_ID(),'_cas_school_testimonial_business_url', true );
$testimonial_achievements = get_post_meta( get_the_ID(),'_cas_school_testimonial_achievements', true );

?>



<div class="feature feature-schools" style="background:url('http://cas.threecordsstudio.com/wp-content/uploads/2015/11/Background.jpg') no-repeat center; background-size:cover;">
	
	

		<div class="school-poster">
				<?php  
						$z = 0;
						foreach ( (array) $previous_posters as $attachment_id => $attachment_url ) {
							if($z == 0){
								echo '<a href="' . $attachment_url . '" class="venobox" data-gall="thumbs">';
								echo wp_get_attachment_image( $attachment_id, $img_size );
								echo '</a>';
								$z = 1;	
							}
							else {
								echo '<a href="' . $attachment_url . '" class="venobox hide-for-cas" data-gall="thumbs" style="display:none;">';
								echo wp_get_attachment_image( $attachment_id, $img_size );
								echo '</a>';
							}

						
						}
						if($z == 0){ ?>
							<img width="354" height="528" src="http://cas.threecordsstudio.com/wp-content/uploads/2015/09/Aptos-LARGE-F15-Poster.png" class="Poster" alt="Aptos-LARGE-F15-Poster">
					<?php 	}		?>
		    

			<br><br>
			<a href="<?php echo $website_url; ?>" target="_blank"><?php echo $name; ?> Website</a>
		</div>


</div>


<?php if(empty($testimonial_text)){ ?>

<section>
	<div class="row-schools">
		<div class="frame">
			<div class="bit-40">
				<br>
			</div>
			<div class="bit-60">
				<div class="row-schools-center">
					<h1><?php echo $name; ?></h1>
					<h2 style="color:<?php echo $color_hex; ?>"><strong><?php echo $subheading; ?></strong></h2>
					<p><?php echo $description; ?></p>
					<h2 style="color:<?php echo $color_hex; ?>"><?php echo $contact_name . ', ' . $contact_title; ?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } else { ?>

<section>
	<div class="row-schools">
		<div class="frame">
			<div class="bit-3">
				<br>
			</div>
			<div class="bit-3">
				<div class="row-schools-center">
					<h1><?php echo $name; ?></h1>
					<h2 style="color:<?php echo $color_hex; ?>"><strong><?php echo $subheading; ?></strong></h2>
					<p><?php echo $description; ?></p>
					<h2 style="color:<?php echo $color_hex; ?>"><?php echo $contact_name . ', ' . $contact_title; ?></h2>
				</div>
			</div>
			<div class="bit-3">
				<div class="row-schools-right">
					<h2 style="color:<?php echo $color_hex; ?>">TESTIMONIALS</h2>
					<p><?php echo $testimonial_text; ?></p>
					<h2 style="color:<?php echo $color_hex; ?>"><?php echo $testimonial_name; ?></h2>
					<p style="color:<?php echo $color_hex; ?>"><strong><?php echo $testimonial_business_name; ?></strong></p>
					<p><a href="http://<?php echo $testimonial_business_url; ?>" target="_blank" style="color:<?php echo $color_hex; ?>"><?php echo $testimonial_business_url; ?></a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php if($progorpost == 'poster' || $progorpost == 'program') { ?> 

<section>
	<div class="row-schools-buttons">
		<div class="frame">
			<div class="bit-1">
				<div class="center padding">
					<h2>We are looking for sponsors. Help us meet our Goal.</h2>
					<div class="frame frame-mini">
						<div class="bit-2">
							<div class="padding">
								<a href="#sponsor" class="button button-large button-block button-round button-small sponsor-form-link">SPONSOR US</a>
							</div>
						</div>
						<div class="bit-2">
							<div class="padding">
								<a class="button button-large button-outline button-round button-small" href="http://cas.threecordsstudio.com/invoice/">PAY INVOICE</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="sponsor"></div>
	<?php if($progorpost =='poster'){ ?> 
		<div class="row-schools-sponsor-form" ng-controller="PosterCtrl">
	<?php } elseif ($progorpost == 'program'){?>
		<div class="row-schools-sponsor-form" ng-controller="ProgramCtrl">
	<?php } ?>

			<div class="frame frame-mid">
				<div class="bit-75">
					<div class="padding">
						<div class="form-panel">
							<div class="form-item form-item-bottom-line">
								<h2>Select your sponsorship level</h2>
							</div>
							<div class="form-item form-item-bottom-line">

								<div class="frame">
									<div class="ng-class:{'bit-2': styleasprogram, 'bit-60': styleasposter };">

										<h4><span class="circle-number">1</span> Choose Ad Size</h4>
										<div class="frame">
											<div class="bit-1">
												<ul class="adb-selectable adb-ad-size">
													<li ng-repeat="poster in posters" class="adb-img-float-left" ng-click="selectPoster(poster)"><img ng-src="{{poster.img}}"></li>
												</ul>
											</div>
										</div>
										<br><br><br>
										<h6 ng-if="posterSelected">Preview</h6>
										<div class="frame"  ng-if="posterSelected">
											<div class="bit-2">
												<div class="padding">
													
													<div class="preview-con">
														<div class="preview-cost padding">
															<h6>${{oneseasonprice}} <br> </h6>
															
														</div>
														<div class="preview-name padding">
															<h6>1 Season <br> Sponsorship</h6>
														</div>
													</div>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
													
													<div class="preview-con">
														<div class="preview-cost padding">

															<h6>${{threeseasonprice}} <br> </h6>
														</div>
														<div class="preview-name padding">
															<h6>3 Season <br> Sponsorship</h6>
														</div>
													</div>
												</div>
												</div>
											</div>
										</div>
									<div class="ng-class:{'bit-2': styleasprogram, 'bit-40':styleasposter};">
										<div class="padding">
											<img ng-src="{{sumPosterPreview}}">
											<h6 class="text-right" >*Actual Proportions</h6>
												<BR><BR><BR>
													<div class="frame" ng-if="showmc3">
														<div class="bit-3"><label class="proglab"><input type="radio" ng-model="valuemc" ng-change="selectMCPoster(0)" ng-value="0">Full Page</label></div>
														<div class="bit-3"><label class="proglab"><input type="radio" ng-model="valuemc" ng-change="selectMCPoster(1)" ng-value="1">Inside Covers</label></div>
														<div class="bit-3"><label class="proglab"><input type="radio" ng-model="valuemc" ng-change="selectMCPoster(2)" ng-value="2">Back Page</label></div>
													</div>
													<div class="frame" ng-if="showmc2">
														<div class="bit-2"><label class="proglab"><input type="radio" ng-model="valuemc" ng-change="selectMCPoster(4)" ng-value="4">Center Fold</label></div>
														<div class="bit-2"><label class="proglab"><input type="radio" ng-model="valuemc" ng-change="selectMCPoster(3)" ng-value="3">Double Truck</label></div>
													</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="form-item form-item-bottom-line animate-if" ng-if="posterSelected">
								<h4><span class="circle-number">2</span> Choose the number of seasons</h4>
								<div class="frame">
									<div class="bit-1">
										<ul class="adb-selectable adb-seasons">
											<li class="adb-promo-box promo-third ng-class:{'ui-selected' : adbSeasonThree}" ng-click="selectSeasons(3)">
												<p>FULL YEAR</p>
												<p class="promo-price">${{sumPoster.discountthree}} DISCOUNT</p>
												<p class="promo-sub">Fall, Winter &amp; Spring</p>
											</li>
											<li class="adb-promo-box promo-third ng-class:{'ui-selected' : adbSeasonTwo}" ng-click="selectSeasons(2)">
												<p>2 SEASONS</p>
												<p class="promo-price">${{sumPoster.discounttwo}} DISCOUNT</p>
												<p class="promo-sub">Your choice of two seasons</p>
											</li>
											<li class="adb-promo-box promo-third ng-class:{'ui-selected' : adbSeasonOne}" ng-click="selectSeasons(1)">
												<p>1 SEASON</p>
												<p class="promo-price">$0 DISCOUNT</p>
												<p class="promo-sub">Fall, Winter or Spring</p>
											</li>
										</ul>
									</div>
								</div>
								<br><br>
								<h6 class="center">We ship a poster to you every season. Fall deadline is June 30th, Winter Deadline is October 30th, <br>Spring Deadline January 30th. If deadline has passed you will be pushed to the next season.</h6>
								<br><br>
							</div>
							<div class="form-item form-item-bottom-line animate-if" ng-if="seasonsSelected">
								<h4><span class="circle-number">3</span> Exclusive Products</h4>
								<div class="frame">
									<div class="bit-1">
										<ul class="adb-selectable adb-products">
											<li class="adb-promo-box promo-half ng-class:{'ui-selected' : adbExtraOne}" ng-click="selectExtras(1)">
												<p>POCKET SCHEDULES</p><br>
												<img src="<?php echo get_template_directory_uri(); ?>/images/pocketschedules.2.png"><br>
												<p>Your Exclusive Ad 3.5" x 2"</p>
												<p class="promo-sub">1000ct&nbsp;&nbsp;&nbsp;&nbsp;$750</p>
											</li>
											<li class="adb-promo-box promo-half ng-class:{'ui-selected' : adbExtraTwo}" ng-click="selectExtras(2)">
												<p>ATHLETIC SHIRTS</p><br>
												<img src="<?php echo get_template_directory_uri(); ?>/images/athleticshirts.2.png"><br>
												<p>Your Exclusive Ad 13" x 13"</p>
												<p class="promo-sub">100ct&nbsp;&nbsp;&nbsp;&nbsp;$1500</p>
											</li>
										</ul>
									</div>
								</div>
								<div class="frame">
									<div class="bit-2">
										<div class="center">
											<a href="#" class="adb-link">more info</a>
										</div>
									</div>
									<div class="bit-2">
										<div class="center">
											<a href="#" class="adb-link">more info</a>
										</div>
									</div>
								</div>
								<br><br>
							</div>
							<div class="form-item form-item-grey" ng-if="seasonsSelected">
								<div class="center">
									<br>
									<a ng-click="addToBag()" class="button button-small button-block button-inline button-round">ADD TO BAG</a>
									<br><br>
								</div>
								
							</div>
							<div class="form-item">
								<p class="center">Check out more schools Nearby</p>
								<br><br>
								<br>
								<h6>Coming Soon</h6>
								<br><br>
							</div>
						</div>
					</div>
				</div>
				<div class="bit-25 sticky">
					<div class="padding">
						<div class="form-panel">
							<div class="form-item form-item-bottom-line">
								<p>Summary</p>
							</div>
							
							<div class="form-item form-item-bottom-line">
								
								
								<ul class="adb-summary">
									<li><strong><span id="sumSchoolName"><?php echo htmlspecialchars($name); ?></span></strong></li>
									<li><span style="float:left">{{sumPosterSize}}</span> <span style="float:right">{{sumPosterPriceTot | currency : ""}}</span></li>
									<li ng-if="sumDiscountPrice > 0"><span style="float:left">{{sumDiscountName}}</span> <span style="float:right">-{{sumDiscountPrice | currency : ""}}</span></li>
									
									<li ng-if="sumExtraOnePrice > 0"><span style="float:left">{{sumExtraOneName}}</span> <span style="float:right">{{sumExtraOnePrice | currency : ""}}</span></li>
									
									<li ng-if="sumExtraTwoPrice > 0"><span style="float:left">{{sumExtraTwoName}}</span> <span style="float:right">{{sumExtraTwoPrice | currency : ""}}</span></li>
									<li class="text-right"><strong>Sub Total</strong> {{totalPrice() | currency}}</li>
								</ul>
								
								
								<br><br>
								<div class="center" ng-show="seasonsSelected">
									<a href="http://cas.threecordsstudio.com/checkout/" ng-click="checkOut()" class="button button-small button-block button-inline button-round">CHECK OUT</a>
								</div>
								<br><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




</section>
				
				<?php } //end major if ?>
<?php endwhile; endif; ?>


<?php get_footer(); ?>
<?php 
/*
 Template Name: AdSpecs Page Template
*/
get_header(); 

 



?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<section>
	<div class="page-invoice"><div class=" frame frame-max"><div class="bit-1">
	<BR>
	<BR>
	<BR>
	<div class="form-panel">
		<div class="form-item form-item-adspecs form-item-bottom-line">
			<h1 class="center ad-specs-title">Ad specifications</h1>
		</div>

		<div class="form-item form-item-adspecs form-item-bottom-line">
			<BR>

			<p class="text-red center ad-specs-subtitle">What product are you sponsoring?</p>
			<BR>
			<BR>
			<div class="cas-adspecs-heading">
				<div class="frame frame-640">
					<div class="bit-4"><a class="cas-adspecs-menu cs-0 cs-active" onclick="goSlickAd(0)">POSTER</a></div>
					<div class="bit-4"><a class="cas-adspecs-menu cs-1" onclick="goSlickAd(1)">PROGRAM</a></div>
					<div class="bit-4"><a class="cas-adspecs-menu cs-2" onclick="goSlickAd(2)">POCKET SCHEDULES</a></div>
					<div class="bit-4"><a class="cas-adspecs-menu cs-3" onclick="goSlickAd(3)">T SHIRTS</a></div>
				</div>
			</div>
			<br>

			<div class="frame">
				<div class="bit-1">

					<div class="cas-adspecs-body">
						<div class="cas-adspecs-slide">

							<div class="frame">
								<div class="bit-66">
									<div class="spn-ad-gallery padding">

										<div class="spn-ad-image">
											<img src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/OrderMockupPosterONE.jpg" alt="" id="spn-ad-img" />
										</div>


										<div class="frame spn-ad-links">
											<p class="center"><strong>Choose your ad size</strong></p>
											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/18x4-Preview.jpg" data-size="18.5in x 4in" data-orientation="Horizontal">18 X 4</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/18x2-Preview.jpg" data-size="18.5in x 2in" data-orientation="Horizontal">18 X 2</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/8x8-Preview.jpg" data-size="8in x 8in" data-orientation="Horizontal or Vertical">8 X 8</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/6x8-Preview.jpg" data-size="6in x 8in" data-orientation="Horizontal or Vertical">6 X 8</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/6x6-Preview.jpg" data-size="6in x 6in" data-orientation="Horizontal or Vertical">6 X 6</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/6x4-Preview.jpg" data-size="6in x 4in" data-orientation="Horizontal or Vertical">6 X 4</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/4x4-Preview.jpg" data-size="4in x 4in" data-orientation="Horizontal or Vertical">4 X 4</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/4x2-Preview.jpg" data-size="4in x 2in" data-orientation="Horizontal or Vertical">4 X 2</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/3x2-Preview.jpg" data-size="3in x 2in" data-orientation="Horizontal">3 X 2</a></div>

											<div class="center padding"><a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/posters/2x2-Preview.jpg" data-size="2in x 2in" data-orientation="Horizontal or Vertical">2 X 2</a></div>

											<div class="center padding">
												<a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/OrderMockupPosterONE.jpg">
													<BR>
												</a>
											</div>

											<div class="center padding">
												<a class="spn-ad-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/OrderMockupPosterONE.jpg">
													<BR>
												</a>
											</div>

										</div>
									</div>

								</div>
								<div class="bit-3">

									<div class="cas-adspecs-box">
										<p class="center"><strong>Ad Specifications</strong></p>
										<BR>
										<BR>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Size:</p>
													<p>Color format:</p>
													<p>Resolution:</p>
													<p>Bleed:</p>
													<p>File types:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
													<p class="ad-size text-red" id="spn-ad-size">No Size Selected</p>
													<p class="ad-size text-red">
														CMYK Full Color</p>
													<p class="ad-size text-red">300 dpi</p>
													<p class="ad-size text-red">No Bleed</p>
													<img src="https://communityallstars.com/wp-content/uploads/2016/02/filetypeicons.png" alt="File Types" />
												</div>
											</div>
										</div>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Orientation:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
												<p class="ad-size text-red" id="spn-ad-orientation">No Size Selected</p></div>
											</div>
										</div>

										<BR>
										<BR>
									</div>


								</div>
							</div>


						</div>
						<div class="cas-adspecs-slide">
							<div class="frame">
								<div class="bit-66">
									<div class="spn-ad-alt-gallery padding">

										<div class="spn-ad-alt-image">
											<img src="https://communityallstars.com/wp-content/uploads/2016/02/AdspecsProgram.png" alt="" id="spn-ad-alt-img" />
										</div>


										<div class="frame spn-ad-alt-links">
											<p class="center"><strong>Choose your ad size</strong></p>
											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/CenterFoldPreview.jpg" data-bleed="1/8th Inch / All Sides" data-size="17in x 11in" data-orientation="Horizontal">Center Fold</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/DoubleTruckPreview.jpg" data-bleed="1/8th Inch / All Sides" data-size="17in x 11in" data-orientation="Horizontal">Double Truck</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/BackCoverPreview.jpg" data-bleed="1/8th Inch / All Sides" data-size="8.5in x 11in" data-orientation="Vertical">Back Cover</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/InsideCoversPreview.jpg" data-bleed="1/8th Inch / All Sides" data-size="8.5in x 11in" data-orientation="Vertical">Inside Covers</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/FullPagePreview.jpg" data-bleed="1/8th Inch / All Sides" data-size="8.5in x 11in" data-orientation="Vertical">Full Page</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/1-2PagePreview.jpg" data-bleed="No Bleed" data-size="8.5in x 5.5in" data-orientation="Horizontal">1/2 Page</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/1-4PagePreview.jpg" data-bleed="No Bleed" data-size="4.25in x 5.5in" data-orientation="Vertical">1/4 Page</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/1-8PagePreview.jpg" data-bleed="No Bleed" data-size="4.25in x 2.75in" data-orientation="Horizontal">1/8 Page</a></div>

											<div class="center padding"><a class="spn-ad-alt-link" data-img-src="https://communityallstars.com/wp-content/themes/cas-wp-theme/images/programs/1-16PagePreview.jpg" data-bleed="No Bleed" data-size="2.125in x 2.75in" data-orientation="Vertical">1/16 Page</a></div>

										</div>
									</div>

								</div>
								<div class="bit-3">

									<div class="cas-adspecs-box">
										<p class="center"><strong>Ad Specifications</strong></p>
										<BR>
										<BR>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Size:</p>
													<p>Color format:</p>
													<p>Resolution:</p>
													<p>Bleed:</p>
													<p>File types:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
													<p class="ad-size text-red" id="spn-ad-alt-size">No Size Selected</p>
													<p class="ad-size text-red">
														CMYK Full Color</p>
													<p class="ad-size text-red">300 dpi</p>
													<p class="ad-size text-red"  id="spn-ad-alt-bleed">No Size Selected</p>
													<img src="https://communityallstars.com/wp-content/uploads/2016/02/filetypeicons.png" alt="File Types" />
												</div>
											</div>
										</div>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Orientation:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
												<p class="ad-size text-red" id="spn-ad-alt-orientation">No Size Selected</p></div>
											</div>
										</div>

										<BR>
										<BR>
									</div>


								</div>
							</div>

						</div>
						<div class="cas-adspecs-slide">
							
							<div class="frame">
								<div class="bit-66">
									<div class="frame">
										<div class="bit-2">
											<img src="https://communityallstars.com/wp-content/uploads/2016/02/AdspecsSchedCards-1.png" alt="Cards">
										</div>
										<div class="bit-2">
										<BR><BR>
											<h2 class="center">Pocket Schedules</h2>
											<BR>
											<p class="center">*If possible please submit layered psd or pdf document.</p>
										</div>
									</div>
								</div>
								<div class="bit-3">
									<div class="cas-adspecs-box">
										<p class="center"><strong>Ad Specifications</strong></p>
										<BR>
										<BR>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Size:</p>
													<p>Color format:</p>
													<p>Resolution:</p>
													<p>Bleed:</p>
													<p>File types:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
													<p class="ad-size text-red">3.5in x 2in</p>
													<p class="ad-size text-red">CMYK Full Color</p>
													<p class="ad-size text-red">300 dpi</p>
													<p class="ad-size text-red">1/8th in / All Sides</p>
													<img src="https://communityallstars.com/wp-content/uploads/2016/02/filetypeicons.png" alt="File Types" />
												</div>
											</div>
										</div>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Orientation:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
												<p class="ad-size text-red">Horizontal or Vertical</p></div>
											</div>
										</div>

										<BR>
										<BR>
								</div>
							</div>
						</div>
						</div>
						<div class="cas-adspecs-slide">
							
							<div class="frame">
								<div class="bit-66">
									<div class="frame">
										<div class="bit-2">
											<img src="https://communityallstars.com/wp-content/uploads/2016/02/Adspecsshirts.png" alt="Shirts">
										</div>
										<div class="bit-2">
										<BR><BR>
											<h2 class="center">Team Shirts</h2>
										</div>
									</div>
								</div>
								<div class="bit-3">
									<div class="cas-adspecs-box">
										<p class="center"><strong>Ad Specifications</strong></p>
										<BR>
										<BR>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Size:</p>
													<p>Color format:</p>
													<p>Resolution:</p>
													<p>Bleed:</p>
													<p>File types:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
													<p class="ad-size text-red">13in x 13in</p>
													<p class="ad-size text-red">1 Color</p>
													<p class="ad-size text-red">300 dpi</p>
													<p class="ad-size text-red">No Bleed</p>
													<img src="https://communityallstars.com/wp-content/uploads/2016/02/filetypeicons.png" alt="File Types" />
												</div>
											</div>
										</div>
										<div class="frame">
											<div class="bit-2">
												<div class="padding">
													<p>Orientation:</p>
												</div>
											</div>
											<div class="bit-2">
												<div class="padding">
												<p class="ad-size text-red">Horizontal or Vertical</p></div>
											</div>
										</div>

										<BR>
										<BR>
								</div>
							</div>
						</div>
	

					</div>

				</div>
			</div>

			<div class="frame">
				<div class="bit-1">
					
			<br>
			<br>
			<BR>
			<BR>
				<h6 class="center">Please note: Ads are placed on black backgrounds in no specific order. </h6>
			<h6 class="center">Questionable content such as alcohol, tobacco, fire arms, weapons, religious, drugs, will be subject for review.</h6>
			<h6 class="center">If changes are necessary our design department will send you a revised proof. Please call our design department for further questions.</h6>				
					
				</div>
			</div>

			<BR>
			<BR>
		</div>
				</div>
		<div class="form-item form-item-adspecs padding">
			<BR>

			<p class="center">Please email all artwork to <a href="mailto:design@communityallstars.com" class="text-red">design@communityallstars.com</a></p>
			<p class="center">Have questions? Call our design team at 866-558-1047 Option 2</p>
			<BR>
		</div>
		<div class="form-item form-item-adspecs form-item-red padding">
			<p class="center text-white">We will gladly adjust and make corrections to existing marketing material. If you would like us to create your ad for free please submit any images, logo, and any content to <a href="mailto:design@communityallstars.com" class="text-white">design@communityallstars.com</a>.</p>
		</div>

	</div>
	<BR>
	<BR>
	<BR>
	<BR>
</div></div></div>	
	
	
</section>	


<?php endwhile; endif; ?>


<?php get_footer(); ?>
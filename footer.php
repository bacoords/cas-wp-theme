	<footer>
		<div class="footer-grey">
			<div class="frame frame-max">
				<div class="bit-5">
					<div class="footer-column">
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'menu footer-weight') ); ?>
					</div>
				</div>
				<div class="bit-5">
					<div class="footer-column">
						<h3>For Schools</h3>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-middle') ); ?>
					</div>
				</div>
				<div class="bit-5">
					<div class="footer-column">
						<h3>For Sponsors</h3>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-right') ); ?>
					</div>
				</div>
				<div class="bit-5">
					<div class="footer-column">
						<br>
					</div>
				</div>
				<div class="bit-5">
					<div class="footer-column footer-column-social">
						<h3>Social</h3>
						<ul>
							<li><a href="https://www.instagram.com/communityallstars/"><img src="<?php echo get_template_directory_uri(); ?>/images/igicon.2.png"></a></li>
							<li><a href="https://www.facebook.com/casallstars" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/fbicon.2.png"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-black">
		<div class="frame frame-max">
			<div class="bit-2">
				<div class="footer-black-left">
					<img src="<?php echo get_template_directory_uri(); ?>/images/CAS-grey.3.png">
					<h5>Questions? 866-558-1047	| 710 13th St. Suite 315, San Diego, Ca 92101</h5>
				</div>
			</div>
			<div class="bit-2">
				<div class="footer-black-right">
					<h5>Copyright 2015 Community All-Stars - ALL RIGHTS RESERVED</h5>
				</div>
			</div>
		</div>
		</div>
	
	</footer>
	<?php wp_footer(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/venobox/venobox.css" type="text/css" media="screen" />
<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/venobox/venobox.min.js"></script>-->
	
	<script src="<?php echo get_template_directory_uri(); ?>/js/cas.js?v=1.0.2"></script>
</body>

</html>
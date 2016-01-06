
	
<!--Start Custom Overlay Frame-->
<div class="nav-overlay">
	<div class="frame">
		<div class="bit-1">
			<span class="nav-overlay-close">&#10005;</span>
			<br><br>
			<h2>Menu</h2>
			
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
	</div>
</div>
<!--End Custom Overlay Frame-->

	
	<div class="black-header">
		<div class="black-header-item">
			<a href="#">FAQ</a>
		</div>
		<div class="black-header-item">
			<a href="#">
			<img src="http://cas.threecordsstudio.com/wp-content/themes/cas/images/mail.png" alt="Email" class="l">
			EMAIL US</a>
		</div>
		<div class="black-header-item">
			<a href="#">PRESS</a>
		</div>
		<div class="black-header-item">
			<a href="#">TEAMBANK
			<img src="http://cas.threecordsstudio.com/wp-content/themes/cas/images/teambank.png" alt="Team Bank" class="r"></a>
		</div>
	</div>
</div>
<div class="feature feature-page">

	

	
	<div class="frame">
		<div class="bit-logo">
			<a href="<?php echo get_site_url(); ?>/"><img src="http://cas.threecordsstudio.com/wp-content/themes/cas/images/CASLogoBIG.png" alt="CAS Logo"></a>
		</div>
		<div class="bit-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
		<div class="bit-nav-mobile">
			<span class="button nav-overlay-open">MENU &#9776;</span>
		</div>
		<div class="bit-buttons">
			<div class="frame">
					<div class="padding padding-10 f-r">
						
						<a href="#" class="button button-block button-square">sign your school up</a>
					</div>
					
					<div class="padding padding-10 f-r">
				  <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
						<div class="feat-search-group">
								<input type="text" class="feat-search-input" placeholder="Search for a school" name="s">
								<input type="hidden" name="post_type" value="cas_school" /> <!-- // hidden 'products' value -->
									<span class=feat-search-button-span>
								<input class="feat-search-button" type="submit" value=" ">
							</span>
						</div>	
					</form>
					</div>
			</div>
		</div>
		<div class="bit-search-icon">
			<div class="frame">
				<div class="bit-1"><a href="#"><img src="http://cas.threecordsstudio.com/wp-content/themes/cas/images/searchglass.png" alt="Search" class="f-r"></a></div>
			</div>
		</div>
		<div class="bit-cart">
			<div class="frame">
				<div class="bit-1">
				<a href="http://cas.threecordsstudio.com/checkout/">
					<img src="http://cas.threecordsstudio.com/wp-content/themes/cas/images/shoppingcartbig.png" alt="Cart"></a>
				</div>
			</div>
		</div>
	</div>
	</div>
<!--
<div class="shopping-cart">
	<div class="frame">
		<div class="bit-1">
			<div class="padding center">

				<h2>Your cart is empty (not functional)</h2>
				<span class="shopping-cart-close">CLOSE CART</span>

			</div>
		</div>
	</div>
</div>-->
<div class="fixed-shiv"></div>
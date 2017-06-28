<div class="cas-nav-top">
  <div class="cnt-left">
    <ul>
      <li><a href="http://www.teambank.org" target="_blank">TeamBank</a></li>
      <li><a href="<?php echo site_url(); ?>/category/blog/">Blog</a></li>
      <li><a href="<?php echo site_url(); ?>/category/press/">Press</a></li>
      <li><a href="<?php echo site_url(); ?>/for-schools/#sign-up">School Sign-Up</a></li>
    </ul>  
  </div>
  <div class="cnt-right">
    <ul>
      <li><a href="<?php echo site_url(); ?>/invoice/">Pay Invoice</a></li>
      <li><a href="<?php echo site_url(); ?>/upload/">Upload Content</a></li>
      <li><a href="<?php echo site_url(); ?>/contact/#email">Email</a></li>
      <li><a href="<?php echo site_url(); ?>/sponsors/#faq">FAQ</a></li>
      <li><a href="<?php echo site_url(); ?>/checkout/" class="cnt-cart"><img src="<?php echo site_url(); ?>/wp-content/themes/cas-wp-theme/images/shoppingcartbig.png" alt="Cart"></a></li>
    </ul>  
  </div>
</div>
<div class="cas-nav">
  <div class="cn-left">
    <div class="cn-logo-sm">
      <a href="<?php echo site_url('/'); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/cas-wp-theme/images/caslogo.2.png" alt="Logo" /></a>
    </div>
    <div class="cn-logo-lg">
      <a href="<?php echo site_url('/'); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/cas-wp-theme/images/CASLogoBIG.png" alt="Logo" /></a>
    </div>
  </div>
  <div class="cn-center">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
  </div>
  
  <div class="cn-right">
    <div class="cn-search-lg">
       <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
          <div class="cn-feat-search-group">
              <input type="text" class="cn-feat-search-input cn-feat-search-input--black" placeholder="Search for a school" name="s">
              <input type="hidden" name="post_type" value="cas_school" /> 
                <span class=cn-feat-search-button-span>
              <input class="cn-feat-search-button" type="submit" value=" ">
            </span>
          </div>	
        </form>
    </div>
    <div class="cn-search-sm">
      <a class="cn-search-mob-link"><img src="<?php echo site_url(); ?>/wp-content/themes/cas-wp-theme/images/searchIconblack.png" alt="" /></a>
    </div>
    <div class="cn-mob-link">
      <span class="cn-menu-mob-link">&#9776;</span>
    </div>
  </div>
</div>

<div class="cn-nav-shim"></div>

<div class="cn-search-mob" style="display:none;">
  <div class="padding">
     <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
        <div class="cn-feat-search-group">
            <input type="text" class="cn-feat-search-input cn-feat-search-input--black cn-search-mob-input" placeholder="Search for a school" name="s">
            <input type="hidden" name="post_type" value="cas_school" /> 
              <span class=cn-feat-search-button-span>
            <input class="cn-feat-search-button" type="submit" value=" ">
          </span>
        </div>	
      </form>
    </div>
</div>

<div class="cn-menu-mob">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
</div>


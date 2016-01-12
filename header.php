<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
    
	<title>
		<?php wp_title( ' | ', true, 'right' ); ?> Community All Stars
	</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/scss/style.css?v=1.0.0" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



	<?php  get_template_part('navbar' );?>



<?php if (( has_post_thumbnail() ) && ( !is_front_page() ) && (!is_category()) && (!is_archive()) ) { 
		$posturl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		 <div class ="feature feature-cover-photo <?php if(is_page('sponsors')){ ?> feature-sponsors <?php } ?>" style="background:url('<?php echo $posturl; ?>') no-repeat center; background-size:cover;">
<?php } ?>



	
<?php if ( is_front_page() ) { ?>
	<video muted autoplay loop poster="polina.jpg" id="bgvid">
<!--    <source src="<?php echo get_template_directory_uri(); ?>/video.webm" type="video/webm">-->
    <source src="<?php echo get_template_directory_uri(); ?>/videos/movie.3.mp4" type="video/mp4">
</video>
<div class="silkscreen"></div>
<div class="feature feature-front" style="background:none;z-index:999">
	<div class="frame">
		<div class="bit-1">
			<div class="tagline center ">
				<h1 class="center animated fadeIn">WE'RE ALL ABOUT HIGH SCHOOL SPORTS.</h1>
				<h2 class="center animated fadeIn">A Community Based Approach to Sustaining <br>High School Athletics and Promoting Local Business.</h2>
			
				  <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
						<div class="feat-search-group">
								<input type="text" class="feat-search-input" placeholder="Search for a school to sponsor" name="s">
								<input type="hidden" name="post_type" value="cas_school" /> <!-- // hidden 'products' value -->
									<span class=feat-search-button-span>
								<input class="feat-search-button" type="submit" value=" ">
							</span>
						</div>	
					</form>
				
					<img src="<?php echo get_template_directory_uri(); ?>/images/LOGOSWHITEnewnew.png" class="feat-as-seen center">
			</div>
			<div class="feature-learn-more center">
				<p>Learn More</p>
				<p>&#9660;</p>
			</div>
		</div>
	</div>
	</div>
		
<?php } elseif(is_page('sponsors')) {  ?>
	
<!--<div class="feature feature-sponsors">-->
	<div class="frame">
		<div class="bit-1">
			<div class="tagline tagline-sponsors">
				<h1 class="animated fadeIn">WELCOME <br>TO THE TEAM.</h1>
				<h2 class="animated fadeIn">A Community Based Approach to Sustaining <br>High School Athletics and Promoting Local Business.</h2>
				 
					<img src="<?php echo get_template_directory_uri(); ?>/images/AsSeenIn.3.png" class="feat-as-seen">
			</div>
			
			<div class="feature-learn-more center">
				<p>Learn More</p>
				<p>&#9660;</p>
			</div>
		</div>
	</div>
	</div>
	
	
<?php }  elseif(is_page('portfolio')) {  ?>
	
<!--
<div class="feature feature-portfolio">
	<div class="frame">
		<div class="bit-1">
			<div class="tagline tagline-sponsors">
				<h1 class="animated fadeIn">WELCOME <br>TO THE TEAM.</h1>
				<h2 class="animated fadeIn">A Community Based Approach to Sustaining <br>High School Athletics and Promoting Local Business.</h2>
				 

					<img src="<?php echo get_template_directory_uri(); ?>/images/NewAsSeenInWhite.png" class="feat-as-seen">
			</div>
			
			<div class="feature-learn-more center">
				<p>Learn More</p>
				<p>&#9660;</p>
			</div>
		</div>
	</div>
	</div>
-->
	
	
<?php } elseif (is_category() || is_archive()) {?>
			 <div class="frame">
			 	<div class="bit-1">
					<div class="center page-content-row">
						<BR><BR><BR>
						<h1 class="blog-main-title"><?php 
$cat = get_the_category(); 
$cat = $cat[0]; 
echo $cat->cat_name; 
?></h1>
							<BR><BR><BR>
					</div>
				 </div>
			 </div>
<?php } ?>
</div>

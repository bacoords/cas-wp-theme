<?php get_header(); ?>







<section>
	<div class="boxes">
		<div class="frame">
			<div class="bit-3">
				<div class="box-wrapper box-wrapper-one">
					<a href="<?php echo site_url('/'); ?>/sponsors/">
						<h3>Sponsors</h3>
						<h3><strong>Learn about how it works</strong></h3>
					</a>
				</div>
			</div>
			<div class="bit-3">
				<div class="box-wrapper box-wrapper-two">
					<a href="<?php echo site_url('/'); ?>/for-schools/">
						<h3>ATHLETIC DIRECTORS &amp; COACHES</h3>
						<h3><strong>LEARN ABOUT OUR FREE SERVICES</strong></h3>
					</a>
				</div>
			</div>
			<div class="bit-3">
				<div class="box-wrapper box-wrapper-three">
					<a href="<?php echo site_url('/'); ?>/portfolio/">
						<h3>VIEW</h3>
						<h3><strong>SOME OF OUR WORK</strong></h3>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>



<section>
	<div class="video-row">
				<div class="center">
<!--					<img src="<?php echo get_template_directory_uri(); ?>/images/videorow.jpg" alt="Video Link">-->
		<h3>"I WOULD RECOMMEND EVERY HIGH SCHOOL<BR>IN THE COUNTRY USE COMMUNITY ALL-STARS."</h3><BR><BR><BR>
			<span class="button button-outline button-inline video-overlay-open button-outline--white">WATCH TESTIMONIAL</span>
			</div>
			</div>
</section>

<!--Start Custom Overlay Frame-->
<div class="video-overlay">
	<div class="frame">
		<div class="bit-1">
			<span class="video-overlay-close text-right">&#10005;</span>
			<br>
			<div class="video-container">
				<iframe src="https://www.youtube.com/embed/YOlSfZJ-A28?showinfo=0&rel=0" frameborder="0" allowfullscreen id="video-rev"></iframe>
			</div>
		</div>
	</div>
</div>
<!--End Custom Overlay Frame-->


<!--Team  ICons Row-->

<section>
	<div class="team-row">
		<div class="frame">
			<div class="bit-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/team-row.png" alt="Team Logos" class="team-row-img center">
			</div>
		</div>
	</div>
</section>

<!--ENd team icons row-->



<!--Start info row-->
<section>
	<div class="info-row">
		<div class="frame frame-1500">
			<div class="bit-3">
				<div class="padding-22 center">
					<h3>Free to High Schools Nationwide</h3>
					<p>A full line of professionaly designed and produced media to boost your image, promote your teams, and generate the funds needed to help run your department. Our services are free to high schools.  Our best schools receive over $15,000 a year from us.</p>
				</div>
			</div>
			<div class="bit-3">
				<div class="padding-22 center">
					<h3>Accredited</h3>
					<p>Our team is made up of branding and marketing experts, professional designers and developers, seasoned sponsorship representatives and business development leaders. With a combined 40 + years of experience we have what it takes to accomplish what needs to be done.  We are accredited with the highest [ossible rating of an A+ by the BBB.</p>
				</div>
			</div>
			<div class="bit-3">
				<div class="padding-22 center">
					<h3>Everything is Custom Tailored.</h3>
					<p>We market, brand and fund high school athletic teams and departments as if they were a professional franchise. Everything we do and create is custom tailored for each individual school.</p>
				</div>
			</div>
		</div>
		
		<span class="padd-140"></span>
		
		<div class="frame frame-1500">
			<div class="bit-75">
				<div class="center">
					<h3>RECENT HAPPENINGS</h3>
<!--					<img src="<?php echo get_template_directory_uri(); ?>/images/RecentHappenings2.png" alt="" class="center">-->
			<?php $query = new WP_Query( array('category_name'=>'press', 'posts_per_page' => 1 )); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			
					<a href="<?php the_permalink() ?>" ><?php the_post_thumbnail('full'); ?></a>
			
				<?php endwhile; 
			 wp_reset_postdata();
			 else : ?>
					<p>
						<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
					</p>
					<?php endif; ?>
				</div>
			</div>
			<div class="bit-25">
				<div class="center">
					<h3>RECENT BLOG</h3>
						<?php $query = new WP_Query( array('category_name'=>'blog', 'posts_per_page' => 1 )); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			
					<a href="<?php the_permalink() ?>" ><?php the_post_thumbnail(array(500,500)); ?></a>
			
				<?php endwhile; 
			 wp_reset_postdata();
			 else : ?>
					<p>
						<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
					</p>
					<?php endif; ?>		
				</div>
			</div>
		</div>
	</div>
</section>

<!--END info row-->





<!--Start Logo row-->
<section>
	<div class="logo-row">
		<div class="frame">
			<div class="bit-25">
				<div class="logo-row-red">
					<img src="<?php echo get_template_directory_uri(); ?>/images/CAS-copy-2.png" class="center">
					
					
				</div>
			</div>
			<div class="bit-75">
				<div class="logo-row-grey">
					<p class="text-center">We are a full service branding and funding solution designed exclusively for high school athletics.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--End logo row-->



<section>
	<div class="boxes">
		<div class="frame">
			<div class="bit-2">
				<div class="box-wrapper box-wrapper-four">
					<a href="<?php echo site_url('/'); ?>/sponsors/">
					<h3>SPONSORS</h3>
						<h3><strong>BRAND &amp; FUND YOUR TEAMS LIKE THE PROS</strong></h3>
					</a>
				</div>
			</div>
			<div class="bit-2">
				<div class="box-wrapper box-wrapper-five">
					<a href="<?php echo site_url('/'); ?>/for-schools/">
					<h3>IT'S EASY</h3>
						<h3><strong>JOIN THE TEAM</strong></h3>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>



<!--

<section>
	<div class="front-icons-row">
		<div class="frame frame-max">
			<div class="bit-3">
				<div class="front-icons">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Layer-43.png" class="center">
					<h2>Accredited</h2>
					<p>Accredited with an A+ Rating by the Better Business Bureau. The highest rating possible.</p>
					<a href="#" class="button button-clear">Learn More</a>
				</div>
			</div>
			<div class="bit-3">
				<div class="front-icons">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Layer-44.2.png" class="center">
					<h2>Highest Returns</h2>
					<p>Get the funding your teams need without adoing any of the work. Our top schools get over $15,000 a year from us.</p>
					<a href="#" class="button button-clear">Learn More</a>
				</div>
			</div>
			<div class="bit-3">
				<div class="front-icons">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Layer-45.2.png" class="center">
					<h2>Custom Tailored</h2>
					<p>Highest quality production made by expert designers. Everything is custom tailored</p>
					<a href="#" class="button button-clear">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</section>
-->




<?php get_footer(); ?>
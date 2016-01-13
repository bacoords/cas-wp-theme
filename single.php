<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<section>
	<div class="page-content-row post-content-row">
		<div class="frame frame-1500">
			<div class="bit-75">
				<BR><BR><BR>
				<div class="frame-mini">
					<div class="bit-1">
						
						<h1><?php the_title(); ?></h1>
						<BR><BR><BR>
						<?php the_content(); ?>
						<BR><BR><BR>
				
					</div>
				</div>
			</div>
			<div class="bit-25">
			<div class="padding">
				<br><br><br>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
			</div>
		</div>
	</div>
</section>




<?php endwhile; endif; ?>


<?php get_footer(); ?>
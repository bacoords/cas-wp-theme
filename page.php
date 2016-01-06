<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<section>
	<div class="page-content-row">
		<div class="frame">
			<div class="bit-1">
				
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>




<?php endwhile; endif; ?>


<?php get_footer(); ?>
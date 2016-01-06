<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<section>
	<div class="page-content-row post-content-row">
		<div class="frame frame-750">
			<div class="bit-1">
				<BR><BR><BR>
				<h1><?php the_title(); ?></h1>
				<BR><BR><BR>
				<?php the_content(); ?>
				<BR><BR><BR>
			</div>
		</div>
	</div>
</section>




<?php endwhile; endif; ?>


<?php get_footer(); ?>
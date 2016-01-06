<?php get_header(); ?>






<section>
	<div class="page-content-row post-content-row">
		<div class="frame frame-1500">
			<div class="bit-75 padding">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<BR><BR><BR>
				<div class="frame-mini">
					<div class="bit-1">
						<div class="padding">
							<h2><?php the_title(); ?></h2>
							<br>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
							<BR>
							<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
							<BR>
							<div class="frame-mini">
								<div class="bit-1">
									<p><?php the_excerpt(); ?> </p>	
								</div>	
							</div>
						</div>
					</div>
				</div>
				<div class="frame">
					<div class="bit-1">
					
				<BR><BR><BR>
					</div>
				</div>
				
				<?php endwhile; endif; ?>

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





<?php get_footer(); ?>
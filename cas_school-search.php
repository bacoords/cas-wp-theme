
<?php get_header(); ?>

<?php
      $i = 0;
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				$i++;
			endwhile; endif;
			?>
			<?php rewind_posts(); ?>
			<?php if (($i == 1)) { ?>

<script type="text/javascript"><!--
window.location = "<? the_permalink(); ?>"
//--></script>			

		<? 	} else { ?>





<section>
	<div class="page-content-row">
		<div class="frame">
			<div class="bit-1">

				


					<div class="frame frame-mid">
						<div class="bit-1">
							<br><br><br><br><br><BR><BR><br><br>
								
														  		
			
						<h1 class="center">Search Results for "<?php the_search_query(); ?>"</h1>
					
			
						<div class="frame">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				       
							       
					   
					<div class="bit-3">
						<div class="padding center">
						<br><br><br>
						
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="button button-small button-block"><?php the_title(); ?></a>    
						<br><br><br>
						</div>
					</div>
 
				<?php endwhile; else: ?> 
	
		
					<div class="bit-1">
						<Br><BR><BR>
						<h2 class="center">NO RESULTS FOUND</h2>
				
						<br><br><br>
						<p class="center">Please try another search.</p>
						
						</div>
		

								
								
								
				<?php endif; ?>
										
								</div>
							</div>
							
						</div>
		
	
		</div>
	</div>
			</div>
</section>

<br><br><br><BR><BR><BR><BR><br><br><br><br><br><BR><BR><BR><BR><br><br><br><br><br><BR><BR><BR><BR><br><br>


<? } ?>
<?php get_footer(); ?>
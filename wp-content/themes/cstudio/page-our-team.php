<?php

get_header(); ?>

	<div class="team">
			<div id="primary">
				<main id="main" class="site-main" role="main">


					<?php while ( have_posts() ) : the_post();?>
<section>
			<div class="container">
				<div class="entry-content">
					<header class="entry-header">
						<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php $title = get_field('page_title');
							  $title_classes = get_field('title_classes');

						?>
						<h1 class="entry-title <?php echo get_field('title_classes') ?>"><?php echo($title == null ? the_title() : $title  )?></h1>
		    	    </header><!-- .entry-header -->
			<?php the_content(); ?>

				 </div>
		</section>

					<?php	get_template_part( 'template-parts/content', 'team-grid' );


						endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
	</div><!-- #portfolio -->
<?php

get_footer();
<?php
get_header(); ?>

	<div class="portfolio">

			<div id="primary">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post(); ?>
					<div class="entry-content">
						<div class="container">
							<header class="entry-header">

						<?php //echo the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php $title = get_field('page_title');
							  $title_classes = get_field('title_classes');

						?>
						<h1 class="entry-title yada <?php echo get_field('title_classes') ?>"><?php echo($title == null ? the_title() : $title )?></h1>
		    	    </header><!-- .entry-header -->

					<?php the_content(); ?>


						</div>

		<?php
					get_template_part( 'template-parts/content', 'portfolio' );


						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							//comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
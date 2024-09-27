<?php
/**
 Template Name: Full Width
 Template Post Type: page, portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CStudio
 */

get_header(); ?>

<!-- 	<div> -->
<!-- 		<div class="row"> -->
			<div id="primary" >
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();?>

					<header class="entry-header">
						<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php $title = get_field('page_title');
							  $title_classes = get_field('title_classes');

						?>
						<h1 class="entry-title <?php echo get_field('title_classes') ?>"><?php echo($title !== null ? $title : get_the_title())?></h1>
		    	    </header><!-- .entry-header -->

		    	    <?php
						get_template_part( 'template-parts/content', 'page' );


						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							//comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
<!-- 			</div> --><!-- #primary -->

<?php
//get_sidebar();
get_footer();

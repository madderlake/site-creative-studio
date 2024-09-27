<?php
/**
 Template Name: Portfolio Item Extended
 Template Post Type: portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CStudio
 */

get_header(); ?>


<!-- 		<div class="row"> -->
			<div id="primary" class="portfolio-item">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'portfolio-item');


				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

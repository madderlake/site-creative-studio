<?php
/**
 * The template for displaying single team members
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CStudio
 */

get_header(); ?>

	<div class="singular">
			<div id="primary" class="portfolio-item">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content-team-member', get_post_format() );

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
<?php
get_footer();

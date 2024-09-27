<?php
/**Template Name: Flexible Content
Template Post Type: page
*/

get_header();
$scripts = get_field('js_file_include');
//print_r($scripts);

//$script_src = $scripts['js_file_url'];
//echo $script_src;



 ?>
	<div class="<?php the_field('page_class')?>" role="main">

			<?php while ( have_posts() ) : the_post();

				$page_title = get_field('page_title_group');
				$title = $page_title['page_title'];
				$title_class = $page_title['page_title_class'];
			 ?>


		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="section title py-0">
			<div class="container content-wrap">
				<h1 class="page-title <?php echo $title_class?>"><?php echo(null !== $title ? $title : the_title())?></h1>
			</div>
		</section>

			<?php get_template_part( 'template-parts/content', 'flexible'); ?>

		</article>
			<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
<?php
	get_footer();
	if( have_rows('js_file_include') ):

	while ( have_rows('js_file_include') ) : the_row();

        // display a sub field value
       echo '<script src="'. get_template_directory_uri() . '/' . get_sub_field('js_file_url') . '"></script>';

    endwhile;

else :

    // no rows found

endif;
 ?>
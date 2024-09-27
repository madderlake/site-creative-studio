<?php
/**
 * Template part for displaying portfolio items - called by single-portfolio.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

?>

<?php
$proj_title = get_field('project_title');
$proj_type = get_field('proj_type');
$proj_desc = get_field('long_description');
$assets = get_field('proj_assets');
$count = count($assets);
$left_cols = get_field('column_layout');
$right_cols = 12 - $left_cols;
$discipline = get_field('discipline');
$year = get_field('year');
$align_img = get_field('align_asset');
$case_study = get_field('case_study_link');
$asset_type = get_field('asset_type');
//$imgUrl = $asset_type['proj_img']['url']


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--


-->
	<header class="entry-header">
		<div class="container">
		<h1 class="entry-title col-sm-12"><?php echo($proj_title == null ? the_title() : $proj_title); ?></h1>
		<div class="col-6 text-left d-inline-block"><h3 class="subhead "><?php echo $discipline?></h3></div><div class="col-6 d-inline-block text-right"><h3 class="subhead"><?php echo $year?></h3></div>
<!-- 	</div> --><!-- .container-->
	</header><!-- .entry-header -->


		<div class="entry-content">
				<?php

					if ( have_rows('col_layout') ) :  ?>
						<?php while ( have_rows('col_layout') ) : the_row();

							if (get_row_layout() == 'columns') : ?>

							<?php include(locate_template('template-parts/layouts/flex-columns.php'));?>

					<?php endif;endwhile;endif; ?>
		</div><!-- .entry-content -->


</article><!-- #post-## -->

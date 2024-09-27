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
if($left_cols < 12) :
$right_cols = 12 - $left_cols;
else:
$right_cols = $left_cols;
endif;
$discipline = get_field('discipline');
$year = get_field('year');
$align_img = get_field('align_asset');
$link = get_field('link_info');
$link_url = $link['link_url'];
$link_text = $link['link_text'];
$asset_type = get_field('asset_type');


//$imgUrl = $asset_type['proj_img']['url']


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="container">
	<div class="text-right">
	<?php
		if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'our-work') > -1){ ?>
	<a href="javascript:void(0)" class="text-small goBack">&laquo; Back to portfolio</a>
	<?php } ?>
	</div>
	<header class="entry-header row">
		<h1 class="entry-title col-12"><?php echo($proj_title == null ? the_title() : $proj_title); ?></h1>
		<div class="col-6 text-left d-inline-block"><h3 class="subhead "><?php echo $proj_type->name?></h3></div>
		<div class="col-6 d-inline-block text-right"><h3 class="subhead"><?php echo (!empty($discipline['label']) ? $discipline['label'] : '') ?></h3></div>

	</header><!-- .entry-header-->

		<div class="entry-content row">


				<div class="col col-12 col-md-<?php echo $left_cols?> <?php echo($align_img == 'left' ? '' : 'order-2') ?> ">
						<?php

							if($asset_type == 'image') :

							$img_group = get_field('single_img');
							$img = $img_group['proj_img'];
							$img_class = $img_group['img_class'];
						?>
							<div class="img-wrap <?php echo(!empty($img_class) ? $img_class : '')?> ">
								<img class="proj-img" <?php echo ar_responsive_image( $img['id'], 'full', '' );?> alt="<?php echo $img['alt']?>">
							</div>


						<?php elseif($asset_type == 'embed') :

/*
							$embed = get_field('single_video');
							$embed_class = $embed['video_class'];
							$embed_url = $embed['video_url'];
							$embed_caption = $embed['embed_caption'];
							$aspectRatio = $embed['video_aspect_ratio'];
*/

							include(locate_template('template-parts/layouts/embed.php'));

							elseif($asset_type == 'slider') :

							$slider_g = get_field('slider_group');
							$slider = $slider_g['slider'];
							$slider_class = $slider_g['slider_class'];
							$slider_options = $slider_g['slider_options'];


							$id = $slider->ID;

								include(locate_template('template-parts/layouts/layout-slider.php'));

							endif;
						?>

				</div>
				<div class="col col-12 col-md-<?php echo $right_cols?> <?php echo($align_img == 'left' ? '' : 'order-1') ?>  description">
				<?php

					echo $proj_desc;

					if(!empty($link_url)):
				?>
				<p><a href="<?php echo $link_url ?>"><?php echo $link_text?> &raquo;</a></p>

				<?php endif; ?>
				</div>
		</div><!-- .entry-content -->
				<?php if ( have_rows('col_layout') ) :
						 while ( have_rows('col_layout') ) : the_row();

							if (get_row_layout() == 'columns') :

							 include(locate_template('template-parts/layouts/flex-columns.php'));

					 endif;endwhile;endif; ?>

	 </div>
	<?php //endif; ?>

</article><!-- #post-## -->

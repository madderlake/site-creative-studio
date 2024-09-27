<?php
global $post, $wp_query;

$items = new WP_Query(array(
		'post_type'   => 'portfolio',
		'posts_per_page' => -1,
		'orderby' => 'rand',

	)
);


$cat_args = array(
	//'type' => 'portfolio',
	'taxonomy' => 'portfolio-category',
	'orderby' => 'name',
	'hide_empty' => true,
	'parent'    => 0,
	'order' => 'ASC',
);
$terms = get_terms($cat_args);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="cat-menu" class="cat-menu">
	<ul class="portfolio-filter-tabs container">
				<li><a class="filter" href="<?php echo esc_url( add_query_arg( 'filter', 'all' ), site_url( '/our-work/' ) )?>" data-filter="all">All</a></li>
				<?php if ( $terms && !is_wp_error( $terms ) ) :
	foreach ( $terms as $cat )
		{ ?>
						<li><a class="filter" href="<?php echo esc_url( add_query_arg( 'filter', $cat->slug ), site_url( '/our-work/' ) )?>" data-filter="<?php echo $cat->slug?>"><?php echo $cat->name; ?></a></li>

				<?php }
endif; ?>
    		</ul>
		</div>
<section class="portfolio-wrapper">
<div class="container portfolio">
	<div class="spinner"></div>
		<div class="grid-wrap">
		<?php if
( $items->have_posts() ) :
	while ( $items->have_posts() ) : $items->the_post();
	$thumb = get_field('thumbnail');
$img_w = $thumb['width'];
$img_h = $thumb['height'];

if
($img_w > $img_h) :
	$aRatio = 'landscape';
elseif($img_h > $img_w):
	$aRatio = 'portrait';
else:
	$aRatio = 'square';
endif;

$proj_type = get_field('proj_type'); ?>

				<div class="col-12 col-sm-4  portfolio-item <?php echo $aRatio. " " .$proj_type->slug?>">
					<div class="card">
					<a class="text-center" href="<?php the_permalink() ?>">
							<?php if ( $thumb ) : ?>
						<div class="post-thumbnail">
							<img class="thumb" <?php echo ar_responsive_image( $thumb['id'], 'full', '' );?> alt="<?php echo $thumb['alt']?>">
						</div><!--  .post-thumbnail -->
							<?php endif; ?>
						<?php the_title()?></a>
		<!-- 				<span class="text-center"><?php echo $proj_type->name ?></span> -->
						<div class="card-text"><?php //echo get_field('short_description') ?></div>

					</div>
				</div>
	<?php endwhile;endif; ?>
</div>
		</section>

		</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
<!--
		<footer class="entry-footer">
			<?php
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'cstudio' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
?>
		</footer>
--><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
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
$name = get_field('name');
$title = get_field('title');
$location = get_field('location');
$bio = get_field('bio');
$video = get_field('video');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="container">
	<header class="row entry-header">
		<h1 class="entry-title col-sm-12"><?php echo($name == null ? the_title() : $name); ?></h1>
		<div class="col-6 text-left d-inline-block"><h3 class="subhead "><?php echo $title?></h3></div><div class="col-6 d-inline-block text-right"><h3 class="subhead"><?php echo $location['label']?></h3></div>

	</header><!-- .entry-header -->


		<div class="entry-content row">

				<div class="col-sm-5">
						<?php
							if($video) :

							include(locate_template('template-parts/layouts/embed.php'));

							else:

						if(has_post_thumbnail()) :
							echo get_the_post_thumbnail($post->ID, 'full');

							else :?>


					<img src="http://via.placeholder.com/400x400?text=img" alt="<?php echo $name?>">



						<?php endif;endif; ?>

				</div>
				<div class="col-sm-7 bio-wrap">

					<?php echo $bio?>

				</div>
		</div><!-- .entry-content -->
	</div>
	<?php //endif; ?>
</article><!-- #post-## -->

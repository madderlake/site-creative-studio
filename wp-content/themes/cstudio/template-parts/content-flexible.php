<?php
/**
 * The default template for displaying ACF Flexible content
 *
 * @package WordPress
 */
?>

<?php
	if ( have_rows('content') ) : ?>

			<?php while ( have_rows('content') ) : the_row(); ?>

				<?php if (get_row_layout()  == 'section') :
				      $section_type = get_sub_field('section_type');
				      $markUp =  get_sub_field('markup_on');
				?>

      <section class="section <?php the_sub_field('section_class')?>"
	      <?php if (get_sub_field('section_bg_img') ) : ?>

			       style="background-image: url(<?php the_sub_field('section_bg_img')?>)"

			      <?php endif;?>

				  <?php if (get_sub_field('section_anchor') ) : ?>
					 id = "<?php the_sub_field('section_anchor') ?>"
					<?php endif; ?>>

			  <div class="content-wrap <?php echo($section_type !== 'in-grid' ? 'container-fluid' : 'container')?>">
				

		      <?php if (get_sub_field('section_title') ) : ?>

			  	<h2 class="col-sm-12 <?php the_sub_field('section_title_class');?>"><?php the_sub_field('section_title'); ?></h2>

			  <?php endif;?>

			    <?php if($markUp == true):

				     echo get_sub_field('section_code');
				     	else:
					 echo get_sub_field('section_content');

					 endif; ?>
			  </div>
	    </section>


    <?php endif;?>

	<?php if (get_row_layout() == 'block_grid' ) :?>

			<?php $section_type = get_sub_field('section_type'); ?>

<?php // Block Grid ?>

	<?php include(locate_template('template-parts/layouts/layout-block-grid.php'));

		endif; ?>

			<?php if (get_row_layout() == 'card_layout' ) :?>

			<?php $section_type = get_sub_field('section_type'); ?>

<?php // Card Layout ?>

	<?php include(locate_template('template-parts/layouts/layout-cards.php'));

		endif; ?>


	<?php if (get_row_layout() == 'tab_set' ) :?>

	<?php $section_type = get_sub_field('section_type'); ?>

<?php // Tabs ?>

	<?php include(locate_template('template-parts/layouts/layout-tab-set.php'));

		endif; ?>

		<?php if (get_row_layout() == 'columns' ) :?>

	<?php $section_type = get_sub_field('section_type'); ?>
	<?php $section_class = get_sub_field('section_classes'); ?>

<?php // Columns ?>

	<?php include(locate_template('template-parts/layouts/flex-columns.php'));

		endif; ?>



<?php endwhile; endif; ?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */
?>

	</div><!-- #content -->
</div><!-- #page -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row align-items-center">
			<div class="col-6 col-sm-1 text-center">

				<img  class="footer-logo" src="<?php echo get_stylesheet_directory_uri()?>/assets/imgs/cs-unltd_logo.svg" alt="Creative Studio - Unlimited Imagination">
			</div>
<!--
			<div class="col-6 col-sm-1">
				<img class="footer-logo" src="<?php echo get_stylesheet_directory_uri()?>/assets/imgs/global-prod_logo.svg" alt="Cengage Global Production">
			</div>
-->

			<div class="col-sm-10 site-info  text-right">
				<span class="text-small">&copy;<?php echo date("Y") . " ". get_bloginfo( 'name' ) ?></span><br>
<!-- 				<span class="text-small">a Global Production / GPM team</span> -->
			</div><!-- .site-info -->
			</div>
		</div><!--  .container -->
	</footer><!-- #colophon -->
<?php  if(!is_page(array(203, 7123) && !is_admin())) : ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php endif; ?>
<?php if(!is_admin()) : ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php endif; ?>
<?php wp_footer(); ?>
<div id="svg-sprite" class="d-none">
	<?php get_template_part('/assets/icons/_sprite.symbols.svg');?>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/aos.min.js"></script>
</body>
</html>

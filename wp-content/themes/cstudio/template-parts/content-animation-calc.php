<?php
	//global $post, $wp_query;

	$args =	array('parent' => 8,
		'order' => 'DESC',
		'orderby' => 'count',
   		'hide_empty'    => false
   		);
   	$taxonomy = 'portfolio-category';
	$terms = get_terms($taxonomy, $args);
	//print_r($terms);

?>





<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php while ( have_posts() ) : the_post();?>

	  		<section class="type">
		  		<div class="container">
			  		<div class="row">
				  		<p class="text-center">Lorem ipsum dolor sit amet, mei ad paulo delenit, cu vis albucius deserunt. Ad his timeam virtute. His ut congue torquatos, est lorem indoctum pertinacia te, eu qui aliquid facilisis. Facilisi sapientem ei mei. Propriae persequeris et sed, in repudiandae contentiones definitionem his, probo fabulas probatus eu nam.</p>



			  	<?php
			  			foreach ( $terms as $term ) :
						//print_r($term);
						$name = $term->name;
						$id   = $term->term_id;
						$image = get_field('field_5c928e6f6f321',$term);
						$src = $image['url'];
						$alt = $image['alt'];
 ?>
 				<div id = "type">
				<label for="<?php echo $term->name?>" class="col-md-3">
					<input type="radio" class="d-none" name="<?php echo $term->name ?>"  value="<?php echo $term->term_id ?>">
					<img src="<?php echo $src ?>" alt="<?php echo $alt ?>" class="light-gray-border border-bottom-0">
					<p class="text-center mt-0 light-gray-border border-top-0"><small><?php echo $name ?></small></p>
				</label>
				<?php endforeach; ?>
			  		</div>
				</div>
			</section>
			<section class="section">
				<div class="container">
			  		<div class="row justify-content-md-center">
				<!--QUANTITY - range input -->
				<h3 class="h4 open-sans-light text-center">How Simple or Complex?</h3>
				<p class="text-center">Lorem ipsum dolor sit amet, mei ad paulo delenit, cu vis albucius deserunt. Ad his timeam virtute. His ut congue torquatos, est lorem indoctum pertinacia te, eu qui aliquid facilisis. Facilisi sapientem ei mei. Propriae persequeris et sed, in repudiandae contentiones definitionem his, probo fabulas probatus eu nam.</p>
						<div class="input-wrap">
							<fieldset id="comp">
								<label for="simple" class="radio-wrap"><input id="simple" type="radio"  name="comp[]" value="Simple">
								<span class="choice">Simple</span>
								<span class="checkmark"></span></label>
								<label for="moderate" class="radio-wrap"><input id="moderate" type="radio"  name="comp[]" value="Moderate">
								<span class="choice">Moderate</span>
								<span class="checkmark"></span></label>
								<label for="complex" class="radio-wrap"><input id="complex" type="radio"  name="comp[]" value="Complex">
								<span class="choice">Complex</span>
								<span class="checkmark"></span></label>

							</fieldset>
						</div>
			  		</div>
			</section>
						<!--QUANTITY - range input -->
			<section class="section">
				<div class="container">
			  		<div class="row justify-content-center">
				<h3 class="h4  open-sans-light col-sm-12 text-center">How Many?</h3>
				<p class="text-center">Lorem ipsum dolor sit amet, mei ad paulo delenit, cu vis albucius deserunt. Ad his timeam virtute. His ut congue torquatos, est lorem indoctum pertinacia te, eu qui aliquid facilisis. Facilisi sapientem ei mei. Propriae persequeris et sed, in repudiandae contentiones definitionem his, probo fabulas probatus eu nam.</p>
						<div class="col-sm-12 slider-wrap">
							<input id="qty" class="slider" type="range" min="0" max="100" step="1" value="0">
							<span class="output"></span>
						</div>
			  		</div>
				</div>
			</section>
			<section class="section">
				<div class="container">
			  		<div class="row justify-content-center">
				  		<h3 class="h4 open-sans-light col-sm-12 text-center">How Long?</h3>
				  		<p class="text-center">Lorem ipsum dolor sit amet, mei ad paulo delenit, cu vis albucius deserunt. Ad his timeam virtute. His ut congue torquatos, est lorem indoctum pertinacia te, eu qui aliquid facilisis. Facilisi sapientem ei mei. Propriae persequeris et sed, in repudiandae contentiones definitionem his, probo fabulas probatus eu nam.</p>
						<!--DURATION - range slider, with min: 1m, max: 3m -->
						<div class="col slider-wrap">
							<input id="dur" class="slider" type="range" min="0" max="3" step="1" value="0">
							<span class="output"></span>
						</div>
			  		</div>
				</div>
			</section>
			<section class="section">
					<div class="container">
			  			<div class="row justify-content-md-center">
							<span id="costTotalNA" class="totalbox d-none"></span><span id="costTotalOS" class="totalbox d-none"></span>
						</div>
			  		</div>
			</section>
	<?php endwhile; ?>

<!-- </div> -->

</article><!-- #post-## -->
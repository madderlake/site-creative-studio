<?php

/* Slider -------------------------- */

function add_cs_slider($atts){
	$slider = shortcode_atts(array(
     'id' => null

   ), $atts);

   $id = $slider['id'];

	if($id ==  null){
		echo "Invalid Slider";

	}else{

		//set_query_var( 'slider_id', $id );
		//get_template_part('template-parts/', 'slider');
	ob_start();
		include(locate_template('template-parts/layouts/slider.php'));
		return ob_get_clean();
	}
}


add_shortcode('cs_slider', 'add_cs_slider');

/* Embed (Video) -------------------------- */

function responsive_embed($atts){
	$embed = shortcode_atts(array(
     'aspect_ratio' => '16by9',
     'url'			=> null,
     'class'        => null

   ), $atts);

   $aspectRatio = $embed['aspect_ratio'];
   $video_url = $embed['url'];
   $embed_class = $embed['class'];

   ob_start();
		include(locate_template('template-parts/layouts/embed.php'));
		return ob_get_clean();

}


add_shortcode('embed_this', 'responsive_embed');

/* Discipline Dropdown for Contact 7 Form -------------------------- */

function add_disc_dropdown($atts){
	$dd = shortcode_atts(array(
		//'id'	=> 'discipline'
	), $atts);

	$disciplines = get_posts(array(
            'post_type'			=>	'discipline',
            'posts_per_page'	=>	-1,
            'orderby'          => 'post_title',
			'order'            => 'ASC'
            )
	);



	ob_start();

   ?>
		<option value="">Select Discipline</option>
		<?php foreach($disciplines as $d) :
				echo "<option value = " . $d->post_name .">". $d->post_title . "</option>";
			  endforeach;

					return ob_get_clean();

				}

add_shortcode('disc_dropdown', 'add_disc_dropdown');


/* Animation Calculator (Sub) Category Images + Inputs */

function add_anim_calc_cats() {
	$args =	array('parent' => 8,
		'order' => 'DESC',
		'orderby' => 'count',
   		'hide_empty'    => false
   		);
   	$taxonomy = 'portfolio-category';
	$terms = get_terms($taxonomy, $args);
	ob_start();?>
	<div id="type" class="row">
	<?php
	foreach ( $terms as $term ) :
			//print_r($term);
			$name = $term->name;
			$id   = $term->term_id;
			$image = get_field('field_5c928e6f6f321',$term);
			$src = $image['url'];
			$alt = $image['alt'];

 	?>

		<label for="<?php echo $term->name?>" class="col-md-3 px-0">
			<input type="radio" class="d-none" name="<?php echo $term->name ?>"  value="<?php echo $term->term_id ?>">
			<img src="<?php echo $src ?>" alt="<?php echo $alt ?>">
			<p class="text-center"><small><?php echo $name ?></small></p>
		</label>
	<?php endforeach; ?>
	</div>
<?php return ob_get_clean();
}
add_shortcode('anim_calc_cats', 'add_anim_calc_cats');

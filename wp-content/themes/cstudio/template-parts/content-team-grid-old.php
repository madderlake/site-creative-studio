<?php
	//global $post, $wp_query;

		$items = new WP_Query(array(
                'post_type'			=>	'team',
                'cat'				=> 47,
                'posts_per_page'	=>	-1

                    )
                );

		$cat_args = array(
			'type' => 'portfolio',
			'taxonomy' => 'portfolio-category',
			'orderby' => 'name',
			'order' => 'ASC',
		);

		//$terms = get_terms($cat_args);
		$locations = get_field_object('field_5abe866c0fa09');
		//$locations = get_field('location');
		$options = $locations['choices'];

		$disciplines = get_field_object('field_5ae775ab43e04');
		$options2 = $disciplines['choices'];

		?>




<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if( $items->have_posts() ) : ?>

	  		<section class="filter-wrap team">
		  		<div class="container">
			  		<div class="row">
			  			<h5 class="col-12 open-sans-light">Find a Team Member:</h5>
				  		<div class="col col-sm-3">
					   		<select id="location" class="sel-location" style="width: 100%">
						   		<option></option>
					   		<?php foreach($options as $key=>$value) :
						   		echo "<option value = .". $key .">". $value . "</option>";
						   		  endforeach;
							?>
					   		</select>
				  		</div>

				  		<div class="col col-sm-3">
					   		<select id="discipline" class="sel-discipline">
						   		<option></option>
					   		<?php foreach($options2 as $key=>$value) :
						   		echo "<option value = .". $key .">". $value . "</option>";
						   		  endforeach;

						?>
					   		</select>
						</div>
				</div></div>
			</section>

		<section class="team-wrap">
			<div class=" container">
			  		<div class="row team-grid">
						<?php
				   		while ( $items->have_posts() ) : $items->the_post();

				   		$name = get_field('name');
				   		$title = get_field('title');
				   		$discipline = get_field('discipline');
				   		$location = get_field('location');
				   		$loc_filter = $location['value'];
				   		$email = get_field('email');
				   		$video_url = get_field('video');
				   		$classes = [];

				   		if(!empty($discipline)):

				   		foreach($discipline as $arr):

				   			array_push($classes, $arr['value']);

				   		endforeach;endif;


				   		?>

		<div class="col-12 col-sm-4 team-item <?php echo (!empty($loc_filter) ? $loc_filter : '')?> <?php  echo implode(" ", $classes)?> ">
			<div class="card">
				<a href="<?php the_permalink() ?>">
				<div class="post-thumbnail">
					<?php if ( has_post_thumbnail() ) :

					 	the_post_thumbnail('full', array('class' => 'rounded'));

					 elseif($video_url):

						include(locate_template('template-parts/layouts/embed.php'));

					 else: ?>

					 	<img src="http://via.placeholder.com/400x400?text=img" alt="<?php echo $name?>">

					<?php endif; ?>


				</div></a><!--  .post-thumbnail -->
				<span class="name-text text-center"><a href="<?php the_permalink() ?>"><?php the_title()?></a></span>
				<span class="card-text text-center title"><?php echo $title ?></span>
				<span class="card-text text-center title"><?php echo $location['label'] ?></span>
				<?php //if($email) : ?>
				<span class="card-text text-center email"><a href="mailto:<?php echo $email ?>" title="Click to Send Email"><i class="icon icon-envelope-o"></i></a></span>
				<?php //endif; ?>
			</div>
		</div>
	<?php endwhile;endif; ?>

<!-- </div> -->



	</div><!-- .entry-content -->
</article><!-- #post-## -->
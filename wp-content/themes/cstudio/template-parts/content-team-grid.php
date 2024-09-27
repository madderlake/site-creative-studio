<?php
	global $post, $wp_query;

		$items = new WP_Query(array(
                'post_type'	=>	'team',
                'cat' 	=>  47,  //Creative Studio Folks Only
                'posts_per_page'	=>	-1

              )
        );

		$disc_cats = array(
			'type' => 'discipline',
			'taxonomy' => 'discipline-category',
			'orderby' => 'name',
			'order' => 'ASC',
		);

		$disc_terms = get_terms($disc_cats);

		$locations = get_field_object('field_5abe866c0fa09');
		$options = $locations['choices'];
		$disc_args = array(
            'post_type'			=>	'discipline',
            'posts_per_page'	=>	-1,
            'orderby'          => 'post_title',
			'order'            => 'ASC',
			'meta_query' => array(
				'relation' => 'AND',
					array(
					'key' => 'disc_prod_mgr',
					'value' => 0,
					'compare' => '>'
					)
			)
		);
		$disciplines = get_posts($disc_args);
		//print_r($disciplines);

		$dpm = [];
		$disc = [];

		foreach($disciplines as $d){
			$pid = get_field('disc_prod_mgr', $d->ID);

			if (is_array($pid) || is_object($pid)) {
				foreach($pid as $p){
					$key = $d->post_name; //Disc slug
					$value = $p; //PM ID
					$dpm[$key]=$value;

				}
			}

		}

		?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if($items->have_posts() ) : ?>
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
					   		<?php foreach($disciplines as $disc) :
						   		echo "<option value = .". $disc->post_name .">". $disc->post_title. "</option>";
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
					   		$pmgr = [];
					   		$classes = [];
					   		$pmid = get_field('product_mgr', $post->ID);

					   		$portfolio = get_field('portfolio', $post->ID);
					   		//echo $portfolio. "<br>";

					   		if(!empty($portfolio)) {
						   		$av_disciplines = get_posts(array(
							   		'post_type'		 =>	'discipline',
							   		'posts_per_page' =>	-1,
							   		'tax_query' => array(
								   		array(
							   			'taxonomy' 		 => 'discipline-category',
							   			'field'	 		 => 'term_id',
							   			'terms' 		 =>	 $portfolio
							   		))
						   		));


						   		foreach($av_disciplines as $av) {
							   		array_push($classes, $av->post_name);
						   		}

					   		}


					   		$location = get_field('location');
					   		$loc_filter = $location['value'];
					   		$email = get_field('email');
					   		$video_url = get_field('video');
					   		$label = $location['label'];


					   		foreach((array)$pmid as $pm){
						   		array_push($pmgr, $pm);
					   		}

							foreach($dpm as $key => $value){
								//echo $key ."-" . $value." | ";
								if(in_array($value, $pmgr)){
									array_push($classes, $key);
								}

							}





				   		?>

		<div class="col-12 col-sm-4 team-item <?php echo (!empty($loc_filter) ? $loc_filter : '')?> <?php  echo implode(" ", $classes)?> ">
			<?php //echo $prod_mgr ?>
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
				<span class="card-text text-center title"><?php echo $label ?></span>
				<span class="card-text text-center title"></span>
				<?php //if($email) : ?>
				<span class="card-text text-center email"><a href="mailto:<?php echo $email ?>" title="Click to Send Email"><i class="icon icon-envelope-o"></i></a></span>
				<?php //endif; ?>
			</div>
		</div>
	<?php endwhile;endif; ?>

<!-- </div> -->



	</div><!-- .entry-content -->
</article><!-- #post-## -->
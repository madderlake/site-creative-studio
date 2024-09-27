


<?php 	/*-------------------- Up to Four Column Layout --------------*/?>

<?php //if (get_row_layout() == 'columns') : ?>

<section class="columns <?php echo $section_class ?>">

		 <div class="row">

		<?php
			    //echo "Section Type: " . $section_type;

			$container = get_sub_field('container');

			$num_col = get_sub_field('num_columns');

		?>

	    <div class="<?php echo($section_type == 'in-grid' || $container == true ? 'container col-wrap' : 'container-fluid col-wrap')?>">


		<?php if (have_rows('col_group')) :

			 while(have_rows('col_group')) : the_row();

			 if(have_rows('column_1') && $num_col >= 1) :

			 	while(have_rows('column_1')) : the_row();

			 	 if(get_row_layout() == 'content'):

			 		$class = get_sub_field('class');
			 		$width = get_sub_field('width');
			 		$mobile = $width['mobile'];
			 		$tablet = $width['tablet'];
			 		$desktop = $width['desktop'];

		?>


				<div class="col-<?php echo $mobile;?> col-sm-<?php echo $tablet?> col-md-<?php echo $desktop?> <?php echo(!empty($class) ? $class : '')?> ">

				<?php
					if(get_sub_field('content')):

						the_sub_field('content');

					endif;
				?>
				</div>



			<?php endif;endwhile;endif;?>

			 <?php

				 if(have_rows('column_2') && $num_col >= 2) :

				 while(have_rows('column_2')) : the_row();

			 	 if(get_row_layout() == 'content'):

			 		$class = get_sub_field('class');
			 		$width = get_sub_field('width');
			 		$mobile = $width['mobile'];
			 		$tablet = $width['tablet'];
			 		$desktop = $width['desktop'];

		?>


				<div class="col col-<?php echo $mobile;?> col-sm-<?php echo $tablet?> col-md-<?php echo $desktop?> <?php echo(!empty($class) ? $class : '')?> ">

				<?php
					if(get_sub_field('content')):

						the_sub_field('content');

					endif;
				?>
				</div>



			<?php endif;endwhile;endif;?>



			<?php

				if(have_rows('column_3') && $num_col >= 3) :

				 while(have_rows('column_3')) : the_row();

			 	 if(get_row_layout() == 'content'):

			 		$class = get_sub_field('class');
			 		$width = get_sub_field('width');
			 		$mobile = $width['mobile'];
			 		$tablet = $width['tablet'];
			 		$desktop = $width['desktop'];

			?>


				<div class="col  col-<?php echo $mobile;?> col-sm-<?php echo $tablet?> col-md-<?php echo $desktop?> <?php echo(!empty($class) ? $class : '')?> ">

				<?php
					if(get_sub_field('content')):

						the_sub_field('content');

					endif;
				?>
				</div>



			<?php endif;endwhile;endif;?>


			<?php

				if(have_rows('column_4') && $num_col >= 4) :

				 while(have_rows('column_4')) : the_row();

			 	 if(get_row_layout() == 'content'):

			 		$class = get_sub_field('class');
			 		$width = get_sub_field('width');
			 		$mobile = $width['mobile'];
			 		$tablet = $width['tablet'];
			 		$desktop = $width['desktop'];

			?>


				<div class="col col-<?php echo $mobile;?> col-sm-<?php echo $tablet?> col-md-<?php echo $desktop?> <?php echo(!empty($class) ? $class : '')?> ">

				<?php
					if(get_sub_field('content')):

						the_sub_field('content');

					endif;
				?>
				</div>



			<?php endif;endwhile;endif;?>

















	<?php endwhile;endif;?>

	</div></div></section>

<?php //endif;?>
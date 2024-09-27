
<?php
define( 'WP_USE_THEMES', false ); // Don't load theme support functionality
require( 'wp/wp-load.php' );

//get_header();

$port_cat_id = "8";
$taxonomy = "portfolio-category";

$args = array('child_of' => 8);
$term_children = get_term_children($port_cat_id, $taxonomy);
?>
<!doctype html>
<head>
	<script src="wp-content/themes/cstudio/assets/js/anim-calc-data.json"></script>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">

	$(function(){
		var data = calc_data;
		//console.log(data);

		(!$('.totalbox').hasClass('d-none')) ? $('.totalbox').addClass('d-none') : '';

		var type = null, complexity = null, quantity = 0, duration = 0, calcReady = false;


		var input = $('input[type="radio"]');

		$('.type label').on('click', function(){
			$('label > img').removeClass('selected');
			$(input).prop("checked", false);
			$(this).find('img').addClass('selected');
			$(this).find(input).prop("checked", true);
			type = parseInt($('input[type="radio"]:checked').val());

			console.log(procData());

		})

		$('#comp').find('input[type="radio"]').on('change', function(){
			complexity = $(this).val();
			console.log(procData());


		})
		var slider = $('input[type="range"]');

		$(slider).on('change mousemove', function(){

			$(this).next('.output').html($(this).val());

		})

		$('#qty').on('change', function(){

			quantity = $(this).val();
			console.log(procData());


		})

		$('#dur').on('change', function(){

			duration = $(this).val();
			console.log(procData());

		})


		function ckReady(){
			if(quantity > 0 && duration > 0 && type !== null && complexity !== null) {
				calcReady = true;
			}

			return calcReady;
		}

		function procData() {

			if(!ckReady()){
				return null;

				} else {
					var t, c, u, os, na, costTotalNA, costTotalOS, costObj = {};

					data.forEach(function (item) {
						t  = item.WPID;
						c  = item.Complexity;
						u  = item.Unit;
						os = item.Offshore;
						na = item.NAmerica;

					if(t === type && c === complexity) {


						if (u === "Minute"){

							costTotalNA = quantity * duration * na;
							costTotalOS = quantity * duration * os;
							costObj.NA = costTotalNA,
							costObj.OS = costTotalOS;
						} else {

							costTotalNA = quantity * name;
							costTotalOS = quantity * os;
							costObj.NA = costTotalNA,
							costObj.OS = costTotalOS;
						}

					}
				});
				if(costTotalNA){$('#costTotalNA').removeClass('d-none')}
				$('#costTotalNA').html('$' + costTotalNA);
				if(costTotalOS){$('#costTotalOS').removeClass('d-none')}
				$('#costTotalOS').html('$' + costTotalOS);
				return costObj;

			}
		}

	});
</script>
<style type="text/css">
	.selected{
		border: 2px solid red;
	}
	fieldset {
		border: none;
	}
	.d-none {
		display: none !important;
	}
	.totalbox {
		display: inline-block;
		text-align: center;
		border: 1px solid #e1e1e1;
		margin: 1rem;
		padding: 1rem;

	}
</style>
</head>
<body>
<?php
//TYPE - Get all Animation Sub-categories and images, display as radio buttons

echo '<ul class="type">';
$args = array('parent' => 8,
		'order' => 'DESC',
		'orderby' => 'count',
   		'hide_empty'    => false
   		);

$terms = get_terms('portfolio-category', $args);
foreach ( $terms as $term ) {
	//$term = get_term_by( 'id', $child, $taxonomy );
	$image = get_field('cat_img', $term->term_id);

	echo $image['url'];

	//echo '<li><a href="' . get_term_link( $child, $taxonomy ) . '">' . $term->name . '</a></li>';
	echo '<label for="' . $term->name . '">';
	echo '<input type="radio" name="' . $term->name . '" id="' . $term->term_id . '" value="' .  $term->term_id . '" style="display:none" >';
	echo '<img src="https://via.placeholder.com/200x150" style="margin: 10px"/>';
	echo '</label>';
}
echo '</ul>';
?>
<!--QUANTITY - range input -->
<fieldset id="comp">
	<label for="simple"><input id="simple" type="radio"  name="comp[]" value="Simple">&nbsp;Simple</label>
	<label for="moderate"><input id="moderate" type="radio"  name="comp[]" value="Moderate">&nbsp;Moderate</label>
	<label for="complex"><input id="complex" type="radio"  name="comp[]" value="Complex">&nbsp;Complex</label>

</fieldset>

<!--QUANTITY - range input -->
<div>
	<input id="qty" type="range" min="0" max="100" step="1" value="0">
	<span class="output"></span>
</div>
<!--DURATION - range slider, with min: 1m, max: 3m -->
<div>
	<input id="dur" type="range" min="0" max="3" step="1" value="0">
	<span class="output"></span>
</div>
<div>
	<span id="costTotalNA" class="totalbox d-none"></span><span id="costTotalOS" class="totalbox d-none"></span>
</div>
</body>
</html>
<?php
//flush_rewrite_rules();
/**
 * StrapPress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package StrapPress
 */

//if ( ! function_exists( 'cstudio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cstudio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on StrapPress, use a find and replace
	 * to change 'cstudio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cstudio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	//add_post_type_support( 'portfolio', 'thumbnail' );

	//post_type_supports( 'portfolio', 'thumbnail' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'cstudio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cstudio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
//endif;
add_action( 'after_setup_theme', 'cstudio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cstudio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cstudio_content_width', 640 );
}
//add_action( 'after_setup_theme', 'cstudio_content_width', 0 );

// Custom Image Sizes

add_image_size( 'x-small', 400, 99999 );
add_image_size( 'x-small-2x', 800, 99999);

//add_image_size( 'small', 600, 99999);

//add_image_size( 'medium', 800, 99999);
add_image_size( 'medium-2x', 1600, 99999);

add_image_size( 'large', 1000, 99999);
add_image_size( 'large-2x', 2000, 99999);

//add_image_size( 'x-large', 1440, 99999);
add_image_size( 'x-large-2x', 2880, 99999);

//Strip Image sizes from attachment imgs

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thubnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */

//Remove p tags around images - aaarghhh - doesn't work - used js instead

/*
function filter_ptags_on_images($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images', 9999);
add_filter('the_content', 'filter_ptags_on_images', 9999);
*/


// Register the three useful image sizes for use in Add Media modal

add_filter( 'image_size_names_choose', 'cstudio_custom_sizes' );

function cstudio_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-width' => __( 'Medium Width' ),
        'medium-height' => __( 'Medium Height' ),
        'medium-something' => __( 'Medium Something' ),
    ) );
}

function cf_post_id() {
    global $post;

   // Get the data
   $id = $post->ID;

   // Echo out the field
   echo '<input type="text" name="_id" value="' . $id . '" class="widefat" disabled />';
  }

 function ve_custom_meta_boxes() {
    add_meta_box('projects_refid', 'Post ID', 'cf_post_id', 'post', 'side', 'high');
    add_meta_box('projects_refid', 'Page ID', 'cf_post_id', 'page', 'side', 'high');
   }
   add_action('add_meta_boxes', 've_custom_meta_boxes');

function add_custom_query_var( $vars ){
  $vars[] = "filter";
  return $vars;
}
add_filter( 'query_vars', 'add_custom_query_var' );
function custom_rewrite_tag() {
        //add_rewrite_tag('%filter%', '([^&]+)');
    }
    //add_action('init', 'custom_rewrite_tag', 10, 0);

function cs_add_rewrite_rule() {
	add_rewrite_rule( 'our-work/([^/]+)/?', 'index.php?pagename=our-work&filter=$matches[1]','top' );


}
add_action('init', 'cs_add_rewrite_rule', 10, 0);

//Add ACF Options page

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

function cs_add_disciplines_to_contact_form ( $tag, $unused ) {

    if ( $tag['name'] != 'ddr-discipline' ) :
	    //echo "Got it";

	return $tag;

	else:

	//} else {

    $disciplines = get_posts(array(
            'post_type'			=>	'discipline',
            'posts_per_page'	=>	-1,
            'orderby'          => 'post_title',
			'order'            => 'ASC'
            ));

	    if ( ! $disciplines ) {
	        return $tag;

	    foreach ( $disciplines as $d ) {
	        //$tag['raw_values'][] = $d->post_title;
	        $tag['values'][0] = "";
	        $tag['labels'][0] = "Select Discipline";
	        $tag['values'][] = $d->post_name;
	        $tag['labels'][] = $d->post_title;
	       // $tag['pipes']->pipes[] = array ( 'before' => $d->post_title, 'after' => $d->post_title);
	    }
	  }


    endif;

    return $tag;
}
//add_filter( 'wpcf7_form_tag', 'cs_add_disciplines_to_contact_form', 10, 2);

/*
function dynamic_select_list( $tag ) {

    if($tag['name'] == 'ddr-discipline'){

		$disciplines = get_posts(array(
            'post_type'			=>	'discipline',
            'posts_per_page'	=>	-1,
            'orderby'          => 'post_title',
			'order'            => 'ASC'
            ));

	    if ( ! $disciplines ) {
	        return $tag;
		}
	        $tag['values'][0] = "";
	        $tag['labels'][0] = "Select Discipline";

	    foreach ( $disciplines as $option ) {
	        //$tag['raw_values'][] = $d->post_title;

	        $tag['values'][] = $option->post_title;
	        $tag['labels'][] = $option->post_title;


	    }


   }

 return $tag;

}
add_filter( 'wpcf7_form_tag', 'dynamic_select_list', 10,2 );

//Auto-fill Product Mgr Hidden Field



add_filter( "wpcf7_posted_data", "process_contact_form_data" );

function process_contact_form_data($data){
	$disc = $data['ddr-discipline'];

	$pm = get_pm($disc);
	$csd = get_csd($disc);

    $data['product-mgr'] = $pm;
	$data['da-designer'] = $csd;
    return $data;

}

function get_pm($slug){

	$disc = get_post($id);
	$disc = get_page_by_path($slug, OBJECT,'discipline');


		$pmgr = $disc->disc_prod_mgr;
		!empty($pmgr[0]) ? $pmID = $pmgr[0] : $pmID = '';

		$pm = get_post($pmID);

		!empty($pm->post_title) ? $pm_name = $pm->post_title : $pm_name = null;

		return $pm_name;
}

function get_csd($slug){

	$disc = get_post($id);
	$disc = get_page_by_path($slug, OBJECT,'discipline');


		$csdObj = $disc->da_designer;
		!empty($csdObj[0]) ? $csdID = $csdObj[0] : $csdID = '';

		$csd = get_post($csdID);

		!empty($csd->post_title) ? $csd_name = $csd->post_title : $csd_name = null;

		return $csd_name;
}
*/



// add the filter
//add_filter( 'wpcf7_form_hidden_fields', 'wpcf7_update_prodmgr', 10, 1 );
/**
 * Create new 'meta_content` filter.
 *
 * Recreate the default filters applied to `the_content`,
 * so content retrieved using `get_post_meta` can be
 * formatted in the same way.
 */
add_filter( 'meta_content', 'wptexturize' );
add_filter( 'meta_content', 'convert_smilies' );
add_filter( 'meta_content', 'convert_chars' );
add_filter( 'meta_content', 'wpautop' );
add_filter( 'meta_content', 'shortcode_unautop' );
add_filter( 'meta_content', 'prepend_attachment' );

/**
	* ACF Specific Customization
*/
require get_template_directory() . '/lib/custom-fields.php';
/**
 * Shortcodes
*/
require get_template_directory() . '/lib/shortcodes.php';

/**
 * Custom Post Types
*/

require get_template_directory() . '/lib/cpt/portfolio.php';

require get_template_directory() . '/lib/cpt/team.php';

require get_template_directory() . '/lib/cpt/slider.php';

require get_template_directory() . '/lib/cpt/discipline.php';

/**
 * Add Scripts and Styles
 */
require get_template_directory() . '/lib/enqueue.php';

/**
 * Register Widget Areas
 */
require get_template_directory() . '/lib/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/customizer.php';

/**
 * Bootstrap Walker.
 */
require get_template_directory() . '/lib/bootstrap-walker.php';

/**
* Contact 7 Forms.
*/
require get_template_directory() . '/lib/contact7-forms.php';

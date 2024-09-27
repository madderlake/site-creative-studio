<?php
/**
 * Enqueue scripts and styles.
 */
function cstudio_scripts_styles() {
	if(!is_admin()) :
	//wp_enqueue_script( 'jquery-3.3.1', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.2.1', true );
	//wp_enqueue_style( 'wp-css', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0');

	wp_enqueue_style( 'cstudio-style', get_stylesheet_directory_uri() . '/assets/css/cstudio.min.css', array(), time() );

    wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700', array(), '5.0.1' );

   // wp_enqueue_script( 'aos-js', '//unpkg.com/aos@2.3.1/dist/aos.js', array(), ' ', true );

    wp_enqueue_script( 'cstudio-js', get_stylesheet_directory_uri() . '/assets/js/cstudio.min.js', array(), time(), true );

    //wp_localize_script( 'cstudio-js', 'prodMgrs', $prodMgrs );

	endif;

	if(is_page(array(7425,7449)) ):

    wp_enqueue_script( 'anim-calc-data', get_stylesheet_directory_uri() . '/assets/js/anim-calc-data.json', array(), '5.1.1' );
    wp_enqueue_script( 'anim-calc', get_stylesheet_directory_uri() . '/assets/js/animation-calc.js', array('jquery'), time(), true );

	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'cstudio_scripts_styles' );


/**
 * Filter the HTML script tag of `leadgenwp-fa` script to add `defer` attribute.
 *
*/
function cstudio_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array(
		'font-awesome' , 'anim-calc'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'cstudio_defer_scripts', 10, 3 );

/**
 * Dequeue the jQuery UI script.
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 */
function cs_dequeue_script() {
   if(!is_admin()){
	    wp_dequeue_script('jquery');
    }
}
add_action( 'wp_print_scripts', 'cs_dequeue_script', 100 );
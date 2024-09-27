<?php
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

	    $tag['labels'][] = 'N/A';
	    $tag['values'][] = 'na';


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

?>
<?php 
/**
 * Ajax related functions
 * Since Tempera 0.9.8
*/

add_action('template_redirect', 'cryout_ajax_init');

	 function cryout_ajax_init() {
	    // loading our theme settings
		$temperas = tempera_get_theme_options();
		foreach ($temperas as $key => $value) { ${"$key"} = $value; } 
		
		if(is_front_page() && $tempera_frontpage=="Enable") {  
			$the_query = new WP_Query( array('posts_per_page'=>$temperas['tempera_frontpostscount']) ); 
		}
	/*	elseif (is_page_template('templates/template-blog.php')) {
			$the_query = new WP_Query( 'post_status=publish&orderby=date&order=desc&posts_per_page='.get_option('posts_per_page'));
		}
		elseif (is_home()) {
			global $wp_query;
			$the_query = $wp_query;
		}*/
		else {return;}
		// Enqueue JS 
		wp_enqueue_script(
			'cryout_ajax_more',
			get_template_directory_uri(). '/js/ajax.js',
			array('jquery'),
			'1.0',
			true
		);

		// Max number of pages
		$page_number_max = $the_query->max_num_pages;

		// Next page to load
		$page_number_next = (get_query_var('paged') > 1) ? get_query_var('paged') + 1 : 2;

		// Add some parameters for the JS.
		wp_localize_script(
			'cryout_ajax_more',
			'cryout_ajax_more',
			array(
				'page_number_next' => $page_number_next,
				'page_number_max' => $page_number_max,
				'page_link_model' => get_pagenum_link(9999999),
				'load_more_str' => __('More posts', 'tempera'),
				'content_css_selector' => '#content',
				'pagination_css_selector' =>  '.pagination, .navigation',
			)
		);
	}

?>
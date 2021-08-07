<?php
/*
 * Styles and scripts registration and enqueuing
 *
 * @package tempera
 * @subpackage Functions
 */

// Adding the viewport meta if the mobile view has been enabled

function tempera_register_styles() {
	global $temperas;
	foreach ($temperas as $key => $value) { ${"$key"} = $value ;}

	wp_register_style( 'temperas', get_stylesheet_uri() );

	if($tempera_mobile=="Enable") { wp_register_style( 'tempera-mobile', get_template_directory_uri() . '/styles/style-mobile.css' );}
	if($tempera_frontpage=="Enable" ) { wp_register_style( 'tempera-frontpage', get_template_directory_uri() . '/styles/style-frontpage.css' );}

	if($tempera_googlefont) wp_register_style( 'tempera_googlefont', esc_attr("//fonts.googleapis.com/css?family=".preg_replace( '/\s+/', '+', $tempera_googlefont )));
	if($tempera_googlefonttitle) wp_register_style( 'tempera_googlefonttitle', esc_attr("//fonts.googleapis.com/css?family=".preg_replace( '/\s+/', '+',$tempera_googlefonttitle )));
	if($tempera_googlefontside) wp_register_style( 'tempera_googlefontside',esc_attr("//fonts.googleapis.com/css?family=".preg_replace( '/\s+/', '+',$tempera_googlefontside )));
	if($tempera_headingsgooglefont) wp_register_style( 'tempera_headingsgooglefont', esc_attr("//fonts.googleapis.com/css?family=".preg_replace( '/\s+/', '+',$tempera_headingsgooglefont )));
	if($tempera_sitetitlegooglefont) wp_register_style( 'tempera_sitetitlegooglefont', esc_attr("//fonts.googleapis.com/css?family=".preg_replace( '/\s+/', '+',$tempera_sitetitlegooglefont )));
	if($tempera_menugooglefont) wp_register_style( 'tempera_menugooglefont', esc_attr("//fonts.googleapis.com/css?family=".preg_replace( '/\s+/', '+',$tempera_menugooglefont )));

}

add_action('init', 'tempera_register_styles' );


function tempera_enqueue_styles() {
	global $temperas;
	foreach ($temperas as $key => $value) { ${"$key"} = $value ;}

	wp_enqueue_style( 'temperas');
	wp_enqueue_style( 'temperas2');
	wp_enqueue_style( 'tempera_googlefont');
	wp_enqueue_style( 'tempera_googlefonttitle');
	wp_enqueue_style( 'tempera_googlefontside');
	wp_enqueue_style( 'tempera_headingsgooglefont');
	wp_enqueue_style( 'tempera_sitetitlegooglefont');
	wp_enqueue_style( 'tempera_menugooglefont');
	// presentation page styling enqued in frontpage.php
	if (($tempera_frontpage=="Enable") && is_front_page()) { wp_enqueue_style( 'tempera-frontpage' ); }

}

if( !is_admin() ) { add_action('wp_head', 'tempera_enqueue_styles', 5 ); }

function tempera_styles_echo() {
	global $temperas;

	foreach ($temperas as $key => $value) { ${"$key"} = $value ;}
	echo preg_replace("/[\n\r\t\s]+/"," " ,tempera_custom_styles())."\n";



	if(($tempera_frontpage=="Enable")&&is_front_page()) { echo preg_replace("/[\n\r\t\s]+/"," " ,tempera_presentation_css())."\n";}
	echo preg_replace("/[\n\r\t\s]+/"," " ,tempera_customcss())."\n";
}

add_action('wp_head', 'tempera_styles_echo', 20);

function tempera_load_mobile_css() {
global $temperas;
if ($temperas['tempera_mobile']=="Enable") {
	echo "<link rel='stylesheet' id='tempera_style_mobile'  href='".get_template_directory_uri() . '/styles/style-mobile.css' . "' type='text/css' media='all' />";
}
}
add_action ('wp_head','tempera_load_mobile_css', 30);

// JS loading and hook into wp_enque_scripts
add_action('wp_head', 'tempera_customjs', 35 );



// Scripts loading and hook into wp_enque_scripts

function tempera_scripts_method() {
global $temperas;
foreach ($temperas as $key => $value) {
    							 ${"$key"} = $value ;
									}

// If frontend - load the js for the menu and the social icons animations
	if ( !is_admin() ) {
		wp_register_script('cryout-frontend',get_template_directory_uri() . '/js/frontend.js', array('jquery') );
		wp_enqueue_script('cryout-frontend');
  		// If tempera from page is enabled and the current page is home page - load the nivo slider js
		if($tempera_frontpage == "Enable" && is_front_page()) {
							wp_register_script('cryout-nivoSlider',get_template_directory_uri() . '/js/nivo-slider.js', array('jquery'));
							wp_enqueue_script('cryout-nivoSlider');
							}
  	}


	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}

if( !is_admin() ) { add_action('wp_enqueue_scripts', 'tempera_scripts_method'); }
?>
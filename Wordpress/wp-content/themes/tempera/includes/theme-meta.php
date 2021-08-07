<?php /*
 * meta related functions
 *
 * @package tempera
 * @subpackage Functions
 */

/**
 * Filter for page meta title.
 */
function tempera_filter_wp_title( $title, $sep = '-' ) {
	global $page, $paged;
	
	// Skip filter for feeds
	if ( is_feed() )
		return $title;

    // Get the Site Name
    $title .= get_bloginfo( 'name', 'display' );
	
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = ( (strlen($title)>0) ? "$title | " : "" ) . $site_description;	
	
	// Add pagination if that's the case
	if ( $paged >= 2 || $page >= 2 )
		$title = $title . " | " . sprintf( __( 'Page %s', 'tempera' ), max( $paged, $page ) );

    // Return the modified title
    return $title;
}

function tempera_filter_wp_title_rss($title) {
return '';
}

add_filter('wp_title', 'tempera_filter_wp_title');
add_filter('wp_title_rss','tempera_filter_wp_title_rss');

 /**
 * Meta author
 */
function tempera_meta_name() {
	global $temperas;
	foreach ($temperas as $key => $value) {
     ${"$key"} = $value ;}
echo '<meta name="author" content="'.$tempera_meta_author.'" />';
}
/**
 * Meta Title
 */
function tempera_meta_title() {
global $temperas;
echo "<title>".wp_title( '-', false, 'right' )."</title>";
}
 /**
 * Meta Theme
 */
function tempera_meta_template() {
echo PHP_EOL.'<meta property="template" content="tempera" />'.PHP_EOL;
}

function tempera_mobile_meta() {
global $temperas;
if ($temperas['tempera_iecompat']) echo PHP_EOL.'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'.PHP_EOL;
if ($temperas['tempera_zoom']==1) 
	echo '<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">';
else echo '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">';
echo PHP_EOL;
}

add_action ('cryout_meta_hook','tempera_meta_title',0);
add_action ('cryout_meta_hook','tempera_meta_template');
add_action ('cryout_meta_hook','tempera_mobile_meta');


// Tempera favicon
function tempera_fav_icon() {
global $temperas;
foreach ($temperas as $key => $value) {
${"$key"} = $value ;}
	 echo '<link rel="shortcut icon" href="'.esc_url($temperas['tempera_favicon']).'" />';
	 echo '<link rel="apple-touch-icon" href="'.esc_url($temperas['tempera_favicon']).'" />';
	}

if ($temperas['tempera_favicon']) add_action ('cryout_header_hook','tempera_fav_icon');


?>
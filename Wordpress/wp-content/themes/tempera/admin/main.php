<?php
// Loading files for frontend

// Loading Default values
require_once(dirname(__FILE__) . "/defaults.php");
require_once(dirname(__FILE__) . "/prototypes.php");
// Loading function that generates the custom css
require_once(dirname(dirname(__FILE__)) . "/includes/custom-styles.php");

// Loading the admin files

if( is_admin() ) {
// Loading the settings arrays
require_once(dirname(__FILE__) . "/settings.php");
// Loading the callback functions
require_once(dirname(__FILE__) . "/admin-functions.php");
// Loading the sanitize funcions
require_once(dirname(__FILE__) . "/sanitize.php");
// Loading color scheme presets
include(dirname(__FILE__) . "/schemes.php");
}

// Getting the theme options and making sure defaults are used if no values are set
function tempera_get_theme_options() {
	global $tempera_defaults;
	$optionsTempera = get_option( 'tempera_settings', $tempera_defaults );
	$optionsTempera = array_merge((array)$tempera_defaults, (array)$optionsTempera);
	$optionsTempera['id'] = "tempera_settings";
return $optionsTempera;
}

$temperas= tempera_get_theme_options();
foreach ($temperas as $key => $value) {
     ${"$key"} = $value ;
}


//  Hooks/Filters
add_action('admin_init', 'tempera_init_fn' );
add_action('admin_menu', 'tempera_add_page_fn');
add_action('init', 'tempera_init');


$temperas= tempera_get_theme_options();

// Registering and enqueuing all scripts and styles for the init hook
function tempera_init() {
//Loading Tempera text domain into the admin section
		load_theme_textdomain( 'tempera', get_template_directory_uri() . '/languages' );
}

// Creating the tempera subpage
function tempera_add_page_fn() {
$page = add_theme_page('Tempera Settings', 'Tempera Settings', 'edit_theme_options', 'tempera-page', 'tempera_page_fn');
	add_action( 'admin_print_styles-'.$page, 'tempera_admin_styles' );
	add_action('admin_print_scripts-'.$page, 'tempera_admin_scripts');

}

// Adding the styles for the Tempera admin page used when tempera_add_page_fn() is launched
function tempera_admin_styles() {
	wp_register_style( 'jquery-ui-style',get_template_directory_uri() . '/js/jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css' );
	wp_enqueue_style( 'jquery-ui-style' );
	wp_register_style( 'tempera-admin-style',get_template_directory_uri() . '/admin/css/admin.css' );
	wp_enqueue_style( 'tempera-admin-style' );
     // codemirror css markup
     wp_register_style('cryout-admin-codemirror-style',get_template_directory_uri() . '/admin/css/codemirror.css' );
	wp_enqueue_style('cryout-admin-codemirror-style');
}

// Adding the styles for the Tempera admin page used when tempera_add_page_fn() is launched
function tempera_admin_scripts() {
// The farbtastic color selector already included in WP
	//wp_register_script('farbtastic-wp',get_template_directory_uri() . '/admin/js/accordion-slider.js', array('jquery') );
	//wp_enqueue_script('cryout_accordion');
	wp_enqueue_script('farbtastic');
	wp_enqueue_style( 'farbtastic' );

//Jquery accordion and slider libraries alreay included in WP
    wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('jquery-ui-tooltip');
// For backwards compatibility where Tempera is installed on older versions of WP where the ui accordion and slider are not included
	if (!wp_script_is('jquery-ui-accordion',$list='registered')) {
		wp_register_script('cryout_accordion',get_template_directory_uri() . '/admin/js/accordion-slider.js', array('jquery') );
		wp_enqueue_script('cryout_accordion');
		}
// For the WP uploader
    if(function_exists('wp_enqueue_media')) {
         wp_enqueue_media();
      }
      else {
         wp_enqueue_script('media-upload');
         wp_enqueue_script('thickbox');
         wp_enqueue_style('thickbox');
      }
// The js used in the admin
	wp_register_script('cryout-admin-js',get_template_directory_uri() . '/admin/js/admin.js' );
	wp_enqueue_script('cryout-admin-js');
// codemirror css markup
     wp_register_script('cryout-admin-codemirror-js',get_template_directory_uri() . '/admin/js/codemirror.min.js' );
	wp_enqueue_script('cryout-admin-codemirror-js');
}

// The settings sectoions. All the referenced functions are found in admin-functions.php
function tempera_init_fn(){

	register_setting('tempera_settings', 'tempera_settings', 'tempera_settings_validate');

/**************
   sections
**************/

	add_settings_section('layout_section', __('Layout Settings','tempera'), 'cryout_section_layout_fn', __FILE__);
	add_settings_section('header_section', __('Header Settings','tempera'), 'cryout_section_header_fn', __FILE__);
	add_settings_section('presentation_section', __('Presentation Page','tempera'), 'cryout_section_presentation_fn', __FILE__);
	add_settings_section('text_section', __('Text Settings','tempera'), 'cryout_section_text_fn', __FILE__);
	add_settings_section('appereance_section',__('Color Settings','tempera') , 'cryout_section_appereance_fn', __FILE__);
	add_settings_section('graphics_section', __('Graphics Settings','tempera') , 'cryout_section_graphics_fn', __FILE__);
	add_settings_section('post_section', __('Post Information Settings','tempera') , 'cryout_section_post_fn', __FILE__);
	add_settings_section('excerpt_section', __('Post Excerpt Settings','tempera') , 'cryout_section_excerpt_fn', __FILE__);
	add_settings_section('featured_section', __('Featured Image Settings','tempera') , 'cryout_section_featured_fn', __FILE__);
	add_settings_section('socials_section', __('Social Media Settings','tempera') , 'cryout_section_social_fn', __FILE__);
	add_settings_section('misc_section', __('Miscellaneous Settings','tempera') , 'cryout_section_misc_fn', __FILE__);

/*** layout ***/
	add_settings_field('tempera_side', __('Main Layout','tempera') , 'cryout_setting_side_fn', __FILE__, 'layout_section');
	add_settings_field('tempera_sidewidth', __('Content / Sidebar Width','tempera') , 'cryout_setting_sidewidth_fn', __FILE__, 'layout_section');
	add_settings_field('tempera_mobile', __('Responsiveness','tempera') , 'cryout_setting_mobile_fn', __FILE__, 'layout_section');

/*** presentation ***/
	add_settings_field('tempera_frontpage', __('Enable Presentation Page','tempera') , 'cryout_setting_frontpage_fn', __FILE__, 'presentation_section');
	add_settings_field('tempera_frontposts', __('Show Posts on Presentation Page','tempera') , 'cryout_setting_frontposts_fn', __FILE__, 'presentation_section');
	add_settings_field('tempera_frontslider', __('Slider Settings','tempera') , 'cryout_setting_frontslider_fn', __FILE__, 'presentation_section');
	add_settings_field('tempera_frontslider2', __('Slides','tempera') , 'cryout_setting_frontslider2_fn', __FILE__, 'presentation_section');
	add_settings_field('tempera_frontcolumns', __('Presentation Page Columns','tempera') , 'cryout_setting_frontcolumns_fn', __FILE__, 'presentation_section');
	add_settings_field('tempera_fronttext', __('Extras','tempera') , 'cryout_setting_fronttext_fn', __FILE__, 'presentation_section');

/*** header ***/
	add_settings_field('tempera_hheight', __('Header Height','tempera') , 'cryout_setting_hheight_fn', __FILE__, 'header_section');
	add_settings_field('tempera_himage', __('Header Image','tempera') , 'cryout_setting_himage_fn', __FILE__, 'header_section');
	add_settings_field('tempera_siteheader', __('Site Header','tempera') , 'cryout_setting_siteheader_fn', __FILE__, 'header_section');
	add_settings_field('tempera_logoupload', __('Custom Logo Upload','tempera') , 'cryout_setting_logoupload_fn', __FILE__, 'header_section');
	add_settings_field('tempera_headermargin', __('Header Content Spacing','tempera') , 'cryout_setting_headermargin_fn', __FILE__, 'header_section');
	add_settings_field('tempera_favicon', __('FavIcon Upload','tempera') , 'cryout_setting_favicon_fn', __FILE__, 'header_section');
	add_settings_field('tempera_headerwidgetwidth', __('Header Widget Width','tempera') , 'cryout_setting_headerwidgetwidth_fn', __FILE__, 'header_section');

/*** text ***/
	add_settings_field('tempera_fontfamily', __('General Font','tempera') , 'cryout_setting_fontfamily_fn', __FILE__, 'text_section');
	add_settings_field('tempera_fonttitle', __('Post Title Font ','tempera') , 'cryout_setting_fonttitle_fn', __FILE__, 'text_section');
	add_settings_field('tempera_fontside', __('Widget Title Font','tempera') , 'cryout_setting_fontside_fn', __FILE__, 'text_section');
	add_settings_field('tempera_sitetitlefont', __('Site Title Font','tempera') , 'cryout_setting_sitetitlefont_fn', __FILE__, 'text_section');
	add_settings_field('tempera_menufont', __('Main Menu Font','tempera') , 'cryout_setting_menufont_fn', __FILE__, 'text_section');
	add_settings_field('tempera_fontheadings', __('Headings Font','tempera') , 'cryout_setting_fontheadings_fn', __FILE__, 'text_section');
	add_settings_field('tempera_textalign', __('Force Text Align','tempera') , 'cryout_setting_textalign_fn', __FILE__, 'text_section');
	add_settings_field('tempera_paragraphspace', __('Paragraph spacing','tempera') , 'cryout_setting_paragraphspace_fn', __FILE__, 'text_section');
	add_settings_field('tempera_parindent', __('Paragraph Indent','tempera') , 'cryout_setting_parindent_fn', __FILE__, 'text_section');
	add_settings_field('tempera_headingsindent', __('Headings Indent','tempera') , 'cryout_setting_headingsindent_fn', __FILE__, 'text_section');
	add_settings_field('tempera_lineheight', __('Line Height','tempera') , 'cryout_setting_lineheight_fn', __FILE__, 'text_section');
	add_settings_field('tempera_wordspace', __('Word Spacing','tempera') , 'cryout_setting_wordspace_fn', __FILE__, 'text_section');
	add_settings_field('tempera_letterspace', __('Letter Spacing','tempera') , 'cryout_setting_letterspace_fn', __FILE__, 'text_section');
	add_settings_field('tempera_letterspace', __('Uppercase Text','tempera') , 'cryout_setting_uppercasetext_fn', __FILE__, 'text_section');

/*** appereance ***/

    add_settings_field('tempera_sitebackground', __('Background Image','tempera') , 'cryout_setting_sitebackground_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_generalcolors', __('General','tempera') , 'cryout_setting_generalcolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_accentcolors', __('Accents','tempera') , 'cryout_setting_accentcolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_titlecolors', __('Site Title','tempera') , 'cryout_setting_titlecolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_menucolors', __('Main Menu','tempera') , 'cryout_setting_menucolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_topmenucolors', __('Top Bar','tempera') , 'cryout_setting_topmenucolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_contentcolors', __('Content','tempera') , 'cryout_setting_contentcolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_frontpagecolors', __('Presentation Page','tempera') , 'cryout_setting_frontpagecolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_sidecolors', __('Sidebar Widgets','tempera') , 'cryout_setting_sidecolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_widgetcolors', __('Footer Widgets','tempera') , 'cryout_setting_widgetcolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_linkcolors', __('Links','tempera') , 'cryout_setting_linkcolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_metacolors', __('Post metas','tempera') , 'cryout_setting_metacolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_socialcolors', __('Socials','tempera') , 'cryout_setting_socialcolors_fn', __FILE__, 'appereance_section');
	add_settings_field('tempera_caption', __('Caption type','tempera') , 'cryout_setting_caption_fn', __FILE__, 'appereance_section');

/*** graphics ***/

	add_settings_field('tempera_topbar', __('Top Bar','tempera') , 'cryout_setting_topbar_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_breadcrumbs', __('Breadcrumbs','tempera') , 'cryout_setting_breadcrumbs_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_pagination', __('Pagination','tempera') , 'cryout_setting_pagination_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_menualign', __('Menu Alignment','tempera') , 'cryout_setting_menualign_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_contentmargins', __('Content Margins','tempera') , 'cryout_setting_contentmargins_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_image', __('Post Images Border','tempera') , 'cryout_setting_image_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_contentlist', __('Content List Bullets','tempera') , 'cryout_setting_contentlist_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_pagetitle', __('Page Titles','tempera') , 'cryout_setting_pagetitle_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_categetitle', __('Category Titles','tempera') , 'cryout_setting_categtitle_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_tables', __('Hide Tables','tempera') , 'cryout_setting_tables_fn', __FILE__, 'graphics_section');
	add_settings_field('tempera_backtop', __('Back to Top button','tempera') , 'cryout_setting_backtop_fn', __FILE__, 'graphics_section');

/*** post metas***/
	add_settings_field('tempera_metapos', __('Meta Bar Position','tempera') , 'cryout_setting_metapos_fn', __FILE__, 'post_section');
	add_settings_field('tempera_metashowblog', __('Show on Blog Metas','tempera') , 'cryout_setting_metashowblog_fn', __FILE__, 'post_section');
	add_settings_field('tempera_metashowsingle', __('Show on Single Pages','tempera') , 'cryout_setting_metashowsingle_fn', __FILE__, 'post_section');
	add_settings_field('tempera_comtext', __('Text Under Comments','tempera') , 'cryout_setting_comtext_fn', __FILE__, 'post_section');
	add_settings_field('tempera_comclosed', __('Comments are closed text','tempera') , 'cryout_setting_comclosed_fn', __FILE__, 'post_section');
	add_settings_field('tempera_comoff', __('Comments off','tempera') , 'cryout_setting_comoff_fn', __FILE__, 'post_section');

/*** post exceprts***/
	add_settings_field('tempera_excerpthome', __('Home Page','tempera') , 'cryout_setting_excerpthome_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_excerptsticky', __('Sticky Posts','tempera') , 'cryout_setting_excerptsticky_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_excerptarchive', __('Archive and Category Pages','tempera') , 'cryout_setting_excerptarchive_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_excerptwords', __('Number of Words for Post Excerpts ','tempera') , 'cryout_setting_excerptwords_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_magazinelayout', __('Magazine Layout','tempera') , 'cryout_setting_magazinelayout_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_excerptdots', __('Excerpt suffix','tempera') , 'cryout_setting_excerptdots_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_excerptcont', __('Continue reading link text ','tempera') , 'cryout_setting_excerptcont_fn', __FILE__, 'excerpt_section');
	add_settings_field('tempera_excerpttags', __('HTML tags in Excerpts','tempera') , 'cryout_setting_excerpttags_fn', __FILE__, 'excerpt_section');

/*** featured ***/
	add_settings_field('tempera_fpost', __('Featured Images as POST Thumbnails ','tempera') , 'cryout_setting_fpost_fn', __FILE__, 'featured_section');
	add_settings_field('tempera_fauto', __('Auto Select Images From Posts ','tempera') , 'cryout_setting_fauto_fn', __FILE__, 'featured_section');
	add_settings_field('tempera_falign', __('Thumbnails Alignment ','tempera') , 'cryout_setting_falign_fn', __FILE__, 'featured_section');
	add_settings_field('tempera_fsize', __('Thumbnails Size ','tempera') , 'cryout_setting_fsize_fn', __FILE__, 'featured_section');
	add_settings_field('tempera_fheader', __('Featured Images as HEADER Images ','tempera') , 'cryout_setting_fheader_fn', __FILE__, 'featured_section');

/*** socials ***/
	add_settings_field('tempera_socials1', __('Link nr. 1','tempera') , 'cryout_setting_socials1_fn', __FILE__, 'socials_section');
	add_settings_field('tempera_socials2', __('Link nr. 2','tempera') , 'cryout_setting_socials2_fn', __FILE__, 'socials_section');
	add_settings_field('tempera_socials3', __('Link nr. 3','tempera') , 'cryout_setting_socials3_fn', __FILE__, 'socials_section');
	add_settings_field('tempera_socials4', __('Link nr. 4','tempera') , 'cryout_setting_socials4_fn', __FILE__, 'socials_section');
	add_settings_field('tempera_socials5', __('Link nr. 5','tempera') , 'cryout_setting_socials5_fn', __FILE__, 'socials_section');
	add_settings_field('tempera_socialshow', __('Socials display','tempera') , 'cryout_setting_socialsdisplay_fn', __FILE__, 'socials_section');

/*** misc ***/
	add_settings_field('tempera_iecompat', __('Internet Explorer Compatibility Tag','tempera') , 'cryout_setting_iecompat_fn', __FILE__, 'misc_section');
	add_settings_field('tempera_copyright', __('Custom Footer Text','tempera') , 'cryout_setting_copyright_fn', __FILE__, 'misc_section');
	add_settings_field('tempera_customcss', __('Custom CSS','tempera') , 'cryout_setting_customcss_fn', __FILE__, 'misc_section');
	add_settings_field('tempera_customjs', __('Custom JavaScript','tempera') , 'cryout_setting_customjs_fn', __FILE__, 'misc_section');

}

 // Display the admin options page
function tempera_page_fn() {
 // Load the import form page if the import button has been pressed
	if (isset($_POST['tempera_import'])) {
		tempera_import_form();
		return;
	}
 // Load the import form  page after upload button has been pressed
	if (isset($_POST['tempera_import_confirmed'])) {
		tempera_import_file();
		return;
	}

 // Load the presets  page after presets button has been pressed
	if (isset($_POST['tempera_presets'])) {
		tempera_init_fn();
		tempera_presets();
		return;
	}


 if (!current_user_can('edit_theme_options'))  {
    wp_die( __('Sorry, but you do not have sufficient permissions to access this page.','tempera') );
  }?>


<div class="wrap"><!-- Admin wrap page -->

<div id="lefty"><!-- Left side of page - the options area -->
<div>
	<div id="admin_header"><img src="<?php echo get_template_directory_uri() . '/admin/images/tempera-logo.png' ?>" /> </div>
	<div id="admin_links">
		<a target="_blank" href="http://www.cryoutcreations.eu/tempera">Tempera Homepage</a>
		<a target="_blank" href="http://www.cryoutcreations.eu/forum">Support</a>
		<a target="_blank" href="http://www.cryoutcreations.eu">Cryout Creations</a>
	</div>
	<div style="clear: both;"></div>
</div>
<?php
if ( isset( $_GET['settings-updated'] ) ) {
    echo "<div class='updated fade' style='clear:left;'><p>";
	echo _e('Tempera settings updated successfully.','tempera');
	echo "</p></div>";
}
?>
<div id="jsAlert" class=""><b>Checking jQuery functionality...</b><br/><em>If this message remains visible after the page has loaded then there is a problem with your WordPress jQuery library. This can have several causes, including incompatible plugins.
The Tempera Settings page cannot function without jQuery. </em></div>
<?php global $temperas; $tempera_varalert = cryout_maxvarcheck(count($temperas));
if ($tempera_varalert): ?><div id="varlimitalert"> <?php echo $tempera_varalert; ?> </div><?php endif; ?>
	<div id="main-options">
		<form name="tempera_form" id="tempera_form" action="options.php" method="post" enctype="multipart/form-data">
			<div id="accordion">
				<?php settings_fields('tempera_settings'); ?>
				<?php do_settings_sections(__FILE__); ?>
			</div>
			<div id="submitDiv">
			    <br>
				<input class="button" name="tempera_settings[tempera_submit]" type="submit" id="tempera_sumbit" style="float:right;"   value="<?php _e('Save Changes','tempera'); ?>" />
				<input class="button" name="tempera_settings[tempera_defaults]" id="tempera_defaults" type="submit" style="float:left;" value="<?php _e('Reset to Defaults','tempera'); ?>" />
				</div>
		</form>
		<?php   $tempera_theme_data = get_transient( 'tempera_theme_info');  ?>
		<span id="version">
		Tempera v<?php echo TEMPERA_VERSION; ?> by <a href="http://www.cryoutcreations.eu" target="_blank">Cryout Creations</a>
		</span>
	</div><!-- main-options -->
</div><!--lefty -->


<div id="righty" ><!-- Right side of page - Coffee, RSS tips and others -->
	<div id="tempera-donate" class="postbox donate">
	 <div title="Click to toggle" class="handlediv"><br /></div>
		<h3 class="hndle"> Coffee Break </h3>
		<div class="inside"><?php echo "<p>While looking at Tempera you will notice what may appear as colors. You'll see them within images, in links and menus, defining borders and backgrounds, as part of animations, hover effects and more.  </p>
<p>But don't let that fool you, those are not colors. What you're actually seeing is a complex mix of coffee and our own blood - you'd be surprised to see how many hues we can get by mixing those two. But as of late we've been feeling pretty dizzy and light headed and it's not from the lack of blood (we are secretly vampires).</p>
<p>What's causing the dizziness is the limited amount of coffee. Every morning we have to make one very tough decision: either use coffee to make colors for Tempera or drink it and stay awake to develop Tempera. It's a choice we'd rather not make so...</p>"; ?>
			<div style="display:block;float:none;margin:0 auto;text-align:center;">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
				">
				<input type="image" src="<?php echo get_template_directory_uri() . '/admin/images/coffee.png' ?>" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
		</div><!-- inside -->
	</div><!-- donate -->

    <div id="tempera-export" class="postbox export non-essential-option" style="overflow:hidden;">
            <div title="Click to toggle" class="handlediv"><br /></div>
           	<h3 class="hndle"><?php _e( 'Import/Export Settings', 'tempera' ); ?></h3>
        <div class="panel-wrap inside">
				<form action="" method="post">
                	<?php wp_nonce_field('tempera-export', 'tempera-export'); ?>
                    <input type="hidden" name="tempera_export" value="true" />
                    <input type="submit" class="button" value="<?php _e('Export Theme options', 'tempera'); ?>" />
					<p class="imex-text"><?php _e("It's that easy: a mouse click away - the ability to export your Tempera settings and save them on your computer. Feeling safer? You should!","tempera"); ?></p>
                </form>
				<br />
                <form action="" method="post">
                    <input type="hidden" name="tempera_import" value="true" />
                    <input type="submit" class="button" value="<?php _e('Import Theme options', 'tempera'); ?>" />
					<p class="imex-text"><?php _e("Without the import, the export would just be a fool's exercise. Make sure you have the exported file ready and see you after the mouse click.","tempera"); ?></p>
                </form>
				<br />
				<form action="" method="post">
                    <input type="hidden" name="tempera_presets" value="true" />
                    <input type="submit" class="button" id="presets_button" value="<?php _e('Color Schemes', 'tempera'); ?>" />
					<p class="imex-text"><?php _e("A collection of preset color schemes to use as the starting point for your site. Just load one up and see your blog in a different light.","tempera"); ?></p>
                </form>

		</div><!-- inside -->
	</div><!-- export -->

    <div id="tempera-news" class="postbox news" >
	 <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e( 'Tempera Latest News', 'tempera' ); ?></h3>
            <div class="panel-wrap inside" style="height:200px;overflow:auto;">
             
            </div><!-- inside -->
    </div><!-- news -->


</div><!--  righty -->
</div><!--  wrap -->

<script type="text/javascript">
var reset_confirmation = '<?php echo esc_html(__('Reset Tempera Settings to Defaults?','tempera')); ?>';
var tempera_help_icon = '<?php echo get_template_directory_uri(); ?>/images/icon-tooltip.png';

jQuery(document).ready(function(){
	if (vercomp(jQuery.ui.version,"1.9.0")) {
		tooltip_terain();
		jQuery('.colorthingy').each(function(){
			id = "#"+jQuery(this).attr('id');
			startfarb(id,id+'2');
		});
	} else {
		jQuery("#main-options").addClass('oldwp');
		setTimeout(function(){jQuery('#tempera_slideType').trigger('click')},1000);
		jQuery('.colorthingy').each(function(){
			id = "#"+jQuery(this).attr('id');
			jQuery(this).on('keyup',function(){coloursel(this)});
			coloursel(this);
		});
		/* warn about the old partially unsupported version */
		jQuery("#jsAlert").after("<div class='updated fade' style='clear:left; font-size: 16px;'><p>Tempera has detected you are running an older version of Wordpress (jQuery) and will be running in compatibility mode. Some features may not work correctly. Consider updating your Wordpress to the latest version.</p></div>");
	}
});
jQuery('#jsAlert').hide();
</script>

<?php } // tempera_page_fn()
?>
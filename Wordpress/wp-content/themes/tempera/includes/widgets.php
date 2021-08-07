<?php

/** 
 * PRESENTATION PAGE COLUMNS 
 */

// Counting the PP column widgets
global $tempera_column_counter;
$tempera_column_counter = 0;

class ColumnsWidget extends WP_Widget
{ 	
  var $temperas; // theme options read in the constructor
  
  function ColumnsWidget() { 
    $widget_ops = array('classname' => 'ColumnsWidget', 'description' => 'Add columns in the presentation page' );
	$control_ops = array('width' => 350, 'height' => 350); // making widget window larger
	$this->WP_Widget('columns_widget', 'Cryout Column', $widget_ops, $control_ops);
	$this->temperas= tempera_get_theme_options(); // reading theme options
  }

  function form($instance) {
    $instance = wp_parse_args( (array) $instance, array( 'image' => '', 'title' => '' , 'text' => '',  'link' => '',  'blank' => '' ) );
    $image = $instance['image'];
	$title = $instance['title'];
	$text = $instance['text'];
	$link = $instance['link'];
	$blank = $instance['blank'];?>
	<div>
		<p><label for="<?php echo $this->get_field_id('image'); ?>">Image: <input class="widefat slideimages" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_url($image); ?>" /></label><a class="upload_image_button button" href="#">Select / Upload Image</a></p>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>">Text: <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" ><?php echo esc_attr($text); ?></textarea></label></p>
		<p><label for="<?php echo $this->get_field_id('link'); ?>">Link: <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_url($link); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('blank'); ?>">Open in new Window: <input id="<?php echo $this->get_field_id('blank'); ?>" name="<?php echo $this->get_field_name('blank'); ?>" type="checkbox" <?php checked($blank, 1); ?> value="1" /></label></p>
	</div>
	
<?php  } // form() function

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['image'] = $new_instance['image'];
	$instance['title'] = $new_instance['title'];
	$instance['text'] = $new_instance['text'];
	$instance['link'] = $new_instance['link'];
	$instance['blank'] = $new_instance['blank'];
    return $instance;
  }
  
  function widget($args, $instance) { 
	$tempera_nrcolumns = $this->temperas['tempera_nrcolumns']; // getting the number of columns setting
	$tempera_columnreadmore = $this->temperas['tempera_columnreadmore']; // read more setting
	global $tempera_column_counter; // globabl counter for incrementing further
	$blank="";
	if($instance['blank']) $blank="target='_blank'";
	
	if($instance['image']) : 
		$tempera_column_counter++; // incrementing counter only if widget has image
		$counter = $tempera_column_counter; ?>
		<div class="column<?php echo ($counter%$tempera_nrcolumns)?$counter%$tempera_nrcolumns:$tempera_nrcolumns; ?>"> 
			<a  <?php echo $blank;?> href="<?php echo esc_url($instance['link']) ?>">	 
				<?php if ($instance['title']) { echo "<h3 class='column-header-image'>".$instance['title']."</h3>"; } ?>
			</a>
					
			<?php if ($instance['image']) :	?>
				<div class="column-image">
					<div class="column-image-inside">	</div>
					<img  src="<?php echo esc_url($instance['image']) ?>" id="columnImage<?php echo $counter; ?>" alt="" />
					<?php if ($instance['text']) : ?>		
						<div class="column-text">
							<?php echo do_shortcode($instance['text']); ?>							
						</div>
					<?php endif; ?>
					<?php if($tempera_columnreadmore && $instance['link'] ): ?>
						<div class="columnmore">
							<a <?php echo $blank;?> href="<?php echo esc_url($instance['link']) ?>"><?php echo esc_attr($tempera_columnreadmore) ?> <i class="column-arrow"></i> </a>
						</div>
					<?php endif; ?>			
				</div><!--column-image-->
			<?php endif; ?>
	
		</div>
	<?php endif; // if image
  }// widget() function
}// ColumnsWidget

add_action( 'widgets_init','cryout_columns_init' );

function cryout_columns_init() {
return register_widget("ColumnsWidget");
}

function tempera_widget_scripts() {
	// For the WP uploader
    if(function_exists('wp_enqueue_media')) {
         wp_enqueue_media();
      }
      else {
         wp_enqueue_script('media-upload');
         wp_enqueue_script('thickbox');
         wp_enqueue_style('thickbox');
      }
	wp_register_script('admin', get_template_directory_uri().'/admin/js/widgets.js');
	wp_enqueue_script('admin'); 
}

add_action ('admin_print_scripts-widgets.php','tempera_widget_scripts');

?>
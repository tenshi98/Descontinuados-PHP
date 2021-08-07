/***********************************************************************************************************
* Facebook Style Auto Scroll Pagination using jQuery and PHP
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info

**********************************Copyright Information*****************************************************
* This script has been released with the aim that it will be useful.
* Please, do not remove this copyright information from the top of this page.
* This script must not be sold.
* All Copy Rights Reserved by Vasplus Programming Blog
*************************************************************************************************************/
(function($) 
{
	$.fn.vasplus_post_scroller = function(options) {
		
		var vpb_config = { 
			vpb_total_per_load  : 10, // Total number of posts per scroll to be loaded on the page
			vpb_start           : 0, // Default - loading start at 0 offset
			vpb_no_more         : 'No more posts', // This is the message shown to the user when the post is finished
			vpb_load_more       : 'Load more post', // This is the message shown to the user when set auto scroll to false to load more data    
			vpb_delay           : 600, // Wait after this time when a user scrolls down to start again
			vpb_auto_load       : true, // Set to true for auto scroll and set to false to scroll manually
			vpb_page_identifier : 'laod-more-post', // Not really necessary unless you need it otherwise leave it alone
			vpb_url             : 'laod-more-post.php', // This is the URL to the page that gets content from the database
			vpb_loading_div_id  : 'vpb_loading_box' // This is the ID of the div where the loaded contents will be displayed
		}
		
		if(options) { $.extend(vpb_config, options); }
		return this.each(function() 
		{
			$this = $(this);
			$vpb_config = vpb_config;
			var vpb_start = $vpb_config.vpb_start;
			var vpb_process_started = false; // If the scroll process is running then pause
			
			$this.append('<div class="vpb-datas"></div><div id="'+$vpb_config.vpb_loading_div_id+'">'+$vpb_config.vpb_load_more+'</div>');
			
			function vasplus_load_more_data_system() {
				if($vpb_config.vpb_url == "") { alert('Error: the page to load data was not passed.\nThank You!'); }
				else {
					$.post($vpb_config.vpb_url, {
							
						page   : $vpb_config.vpb_page_identifier,
						vpb_total  : $vpb_config.vpb_total_per_load,
						vpb_start  : vpb_start
							
					}, function(response) {
						$this.find('#'+$vpb_config.vpb_loading_div_id).html($vpb_config.vpb_load_more);
						
						var response_brought = response.indexOf('vpb_is_finished');
						if(response_brought != -1) { 
							$this.find('#'+$vpb_config.vpb_loading_div_id).show().html($vpb_config.vpb_no_more);	
						}
						else {
							vpb_start = vpb_start+$vpb_config.vpb_total_per_load; 
							$this.find('.vpb-datas').append(response);	
							vpb_process_started = false;
							$this.find('#'+$vpb_config.vpb_loading_div_id).show();
						}	
							
					});
				}
			}	
			vasplus_load_more_data_system(); // Called on page load
			if( $vpb_config.vpb_auto_load == true ) // Auto Scroll
			{
				$(window).scroll(function() {
					if($(window).scrollTop() + $(window).height() > $this.height() && !vpb_process_started) {
						
						vpb_process_started = true;
						$this.find('#'+$vpb_config.vpb_loading_div_id).html('Loading Posts');
						setTimeout(function() {
							vasplus_load_more_data_system();
						}, $vpb_config.vpb_delay);
					}	
				});
			}
			else {}
			$this.find('#'+$vpb_config.vpb_loading_div_id).click(function() // Manual Scroll
			{
				if(vpb_process_started == false) {
					vpb_process_started = true;
					vasplus_load_more_data_system();
				}
			});
		});
	}
})(jQuery);
/* Custom Javascript Code goes here. */

adi_notifiers = {
	login_form_load: function(dt){
		// jQuery('.adi_login_form_width').css('height', jQuery('.adi_login_form_width').height()+'px');
		
		// Set Accordion
		jQuery('.adi_nc_section_header').click(function(){
			if(!jQuery(this).hasClass('adi_current_section'))
			{
				jQuery(this).children('.adi_inner_section').slideDown(100);
				jQuery('.adi_current_section', jQuery(this).parent()).children('.adi_inner_section').slideUp(100);

				jQuery('.adi_current_section', jQuery(this).parent()).removeClass('adi_current_section').addClass('adi_other_section');
				jQuery(this).addClass('adi_current_section').removeClass('adi_other_section');
			}
		});
		jQuery('.adi_nc_section_header').removeClass('adi_nc_section_header');

		// Textarea focus and blur effect
		dt.sel('.adi_nc_contacts_list').focus(function(){
			if(jQuery(this).val() == adi.phrases['manualinv_textarea_default_txt'])
			{
				jQuery(this).val('');
			}
		}).blur(function(){
			if(jQuery(this).val().replace(/[\s\n\t\r]+/i,'') == '')
			{
				jQuery(this).val(adi.phrases['manualinv_textarea_default_txt']);
			}
		});

		dt.sel('.adi_nc_down_arrow').click(function(){
			adi.service_panel.open_from = jQuery(this).attr('data');
			if(adi.service_panel.isOpen == true)
			{
				adi.service_panel.hide();
			}
			else
			{
				adi.service_panel.show();
			}
		});

		// Password Switching
		jQuery('.adi_nc_password_input').blur(function(){
			if(adi.login_form.curr_service_id != '')
			{
				if(adi.services[adi.login_form.curr_service_id][0][2] == 1) 
				{
					jQuery('.adi_nc_password_note').show();
					jQuery(this).hide();
				}
			}
		});

	},
	importer_service_set: function(dt) {
		if(adi.login_form.curr_service_id != '')
		{
			if(adi.services[adi.login_form.curr_service_id][0][2] == 1)
			{
				jQuery('.adi_nc_password_note').show();
				jQuery('.adi_nc_password_input').hide();
			}
			else {
				jQuery('.adi_nc_password_note').hide();
				jQuery('.adi_nc_password_input').show();
			}
		}
	},
	contact_file_instructions_load: function(dt){
		// Toggle Show/Hide contact file descriptions.
		jQuery('.adi_expand_instr').click(function(){
			var id = jQuery(this).attr('rel') || '';
			if(id != '') {
				var cr = jQuery('.'+id);
				if(cr.css('display') == 'none') 
				{
					jQuery('.adi_nc_ct_sect_out').hide();
					cr.show();
					jQuery('#cfDesc_scroll').adcustscrollbar_update(cr.attr('scrollto'));
				}
				else {
					cr.hide();
					jQuery('#cfDesc_scroll').adcustscrollbar_update();
				}
			}
			return false;
		});
	}
};
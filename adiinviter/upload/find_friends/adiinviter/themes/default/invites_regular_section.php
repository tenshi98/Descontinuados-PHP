<table cellpadding="0" cellspacing="0" class="adi_clear_table adiinviter"><tr class="adi_clear_tr"><td class="adi_clear_td">

<div class="adi_nc_inpage_panel_outer adi_invite_history_outer" id="adi_invite_history_root">

	<div class="adi_invite_history_header_txt">{adi:phrase adi_ih_block_header_txt}</div>

	<div class="adi_panel_inner_section">
<form action="" method="post" class="adi_clear_form adi_nc_paginate_form">
{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
	<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
{/adi:foreach}
<div class="adi_invites_filter_options">	

{adi:if ($adiinviter->can_delete_invites)}
	<div class="adi_fleft">
		<table cellpadding="0" cellspacing="0" class="adi_clear_table"><tr class="adi_clear_tr">
		<td class="adi_clear_td" valign="middle">
			<div class="adi_dropdown adi_nc_select_option_btn">
				<div class="adi_dropdown_text">{adi:phrase adi_ih_select_options_prefix}
				<span class="adi_nc_curr_select_opt">{adi:phrase adi_ih_select_option_none}</span></div>
			</div>
			<div class="adi_dropdown_list_out adi_nc_select_options_out">
				<table class="adi_clear_table" cellpadding="0" cellspacing="0" width="100%" style="width:100%;"><tr class="adi_clear_tr">
				<td valign="middle" class="adi_clear_td">
					<ul class="adi_clear_ul adi_dropdown_opt_list">
						<li class="adi_clear_li adi_dropdown_opt adi_nc_select_opt" data="all"><span>{adi:phrase adi_ih_all_invites_option}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_select_opt" data="blocked"><span>{adi:phrase adi_invitation_status_blocked}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_select_opt" data="accepted"><span>{adi:phrase adi_invitation_status_accepted}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_select_opt" data="invited"><span>{adi:phrase adi_invitation_status_invited}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_select_opt" data="none"><span>{adi:phrase adi_ih_select_option_none}</span></li>
					</ul>
				</td></tr></table>
			</div>
		</td>
		</tr></table>
	</div>
{/adi:if}

	<div class="adi_fright">
		<table cellpadding="0" cellspacing="0" class="adi_clear_table"><tr class="adi_clear_tr">
		<td class="adi_clear_td" valign="middle">
			<div class="adi_dropdown adi_nc_filter_option_btn">
				<div class="adi_dropdown_text">{adi:phrase adi_ih_show_option_prefix}
				<span class="adi_nc_curr_filter_opt">{adi:phrase adi_ih_all_invites_option}</span></div>
			</div>
			<div class="adi_dropdown_list_out adi_nc_filter_options_out">
				<table class="adi_clear_table" cellpadding="0" cellspacing="0" width="100%" style="width:100%;"><tr class="adi_clear_tr">
				<td valign="middle" class="adi_clear_td">
					<ul class="adi_clear_ul adi_dropdown_opt_list">
						<li class="adi_clear_li adi_dropdown_opt adi_nc_filter_opt" data="all"><span>{adi:phrase adi_ih_all_invites_option}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_filter_opt" data="accepted"><span>{adi:phrase adi_invitation_status_accepted}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_filter_opt" data="blocked"><span>{adi:phrase adi_invitation_status_blocked}</span></li>
						<li class="adi_clear_li adi_dropdown_opt adi_nc_filter_opt" data="invited"><span>{adi:phrase adi_invitation_status_invited}</span></li>
					</ul>
				</td></tr></table>
			</div>
		</td></tr></table>
	</div>

	<div class="adi_clear"></div>
</div>

	<div class="adi_nc_invites_table_out">
		{adi:template invites_table_contents}
	</div>
	
<script type="text/javascript">
// adi.allocate_intr('ih', jQuery('#adi_invite_history_root'),{});
adi_ih.set_invite_history();
</script>
	</form>
	</div>
</div>

</td></tr></table>

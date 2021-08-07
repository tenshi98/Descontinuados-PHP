{adi:if count($ih_records) > 0}
	
<table class="adi_clear_table adi_invites_table" cellpadiing="0" cellspacing="0" width="100%" style="width:100%;">

	<tr class="adi_clear_tr">
	{adi:if $adiinviter->can_delete_invites}
		<td class="adi_clear_td adi_invites_table_head" style="vertical-align:middle;"><center><input type="checkbox" name="adi_ih_select_all" class="adi_ih_select_all"></center></td>
	{adi:else/}
		<td class="adi_clear_td adi_invites_table_head" style="padding-left:3px;padding-right:3px;vertical-align:middle;">{adi:phrase adi_ih_serial_number_column_text}</td>
	{/adi:if}

	{adi:if $invite_history->ih_column_receiver_details}
		<td class="adi_clear_td adi_invites_table_head adi_ih_sent_to_col" style="vertical-align:middle;">{adi:phrase adi_ih_column_receiver_details}</td>
	{/adi:if}

	{adi:if $invite_history->ih_column_service_info}
		<td class="adi_clear_td adi_invites_table_head" style="vertical-align:middle;">{adi:phrase adi_ih_column_service_info}</td>
	{/adi:if}

	{adi:if $invite_history->ih_column_status}
		<td class="adi_clear_td adi_invites_table_head" style="width: 100px;vertical-align:middle;">{adi:phrase adi_ih_column_status}</td>
	{/adi:if}

	{adi:if $invite_history->ih_column_issued_date}
		<td class="adi_clear_td adi_invites_table_head" style="width: 100px;vertical-align:middle;">{adi:phrase adi_ih_column_issued_date}</td>
	{/adi:if}
	</tr>


{adi:foreach $ih_records, $ind, $record}
	<tr class="adi_clear_tr {adi:if ($record['row_odd'] == 1)}adi_odd{adi:else/}adi_even{/adi:if}">

	{adi:if $adiinviter->can_delete_invites}
		<td class="adi_clear_td adi_invites_table_data adi_first_col"><center><input type="checkbox" name="adi_ih_ids_list[]" value="{adi:var $record['invitation_id']}" class="adi_nc_selectable {adi:if ($record['invitation_status'] == 'accepted')}adi_nc_select_accepted{adi:elseif ($record['invitation_status'] == 'blocked')}adi_nc_select_blocked{adi:elseif ($record['invitation_status'] == 'invitation_sent')}adi_nc_select_invited{/adi:if}"></center></td>
	{adi:else/}
		<td class="adi_clear_td adi_invites_table_data">{adi:var $record['srno']}</td>
	{/adi:if}

	{adi:if ($invite_history->ih_column_receiver_details)}
		<td class="adi_clear_td adi_invites_table_data">
			<div class="adi_invites_details">
				<div class="adi_invites_receiver_name">
					{adi:if (!empty($adiinviter->settings['adiinviter_profile_page_url']) && $record['invitation_status'] == 'accepted')}
						<a class="adi_link" target="_blank" href="{adi:var $record['profile_page_url']}">{adi:var $record['userfullname']}</a>
					{adi:else/}
						{adi:var $record['receiver_name']}
					{/adi:if}
				</div>
				{adi:if ($record['service_email'] == 1)}
					<div class="adi_invites_receiver_id">({adi:var $record['receiver_email']})</div>
				{/adi:if}
				<div class="adi_clear"></div>
			</div>
		</td>
	{/adi:if}

	{adi:if $invite_history->ih_column_service_info}
		<td class="adi_clear_td adi_invites_table_data"><span class="adi_{adi:var $record['service_used']}_si">{adi:var $record['service_name']}</span></td>
	{/adi:if}

	{adi:if ($invite_history->ih_column_status)}
		{adi:if ($record['invitation_status'] == 'invitation_sent')}
			{adi:set $selecter_class = 'adi_invite_status_pending'}
		{adi:elseif ($record['invitation_status'] == 'blocked')}
			{adi:set $selecter_class = 'adi_invite_status_blocked'}
		{adi:elseif ($record['invitation_status'] == 'accepted')}
			{adi:set $selecter_class = 'adi_invite_status_accepted'}
		{adi:elseif ($record['invitation_status'] == 'waiting')}
			{adi:set $selecter_class = 'adi_invite_status_waiting'}
		{/adi:if}
		<td class="adi_clear_td adi_invites_table_data {adi:var $selecter_class}">{adi:var $record['status_text']}</td>
	{/adi:if}

	{adi:if ($invite_history->ih_column_issued_date)}
		<td class="adi_clear_td adi_invites_table_data">
			<span class="adi_invite_issued_date">{adi:var $record['issued_date']}</span>
		</td>
	{/adi:if}

	</tr>
{/adi:foreach}
</table>

{adi:if ($invitations_count > 0)}
	{adi:template invite_history_pagination}
{/adi:if}


{adi:else/}

<div class="adi_invites_error_message"><center>{adi:phrase adi_ih_no_records_found_err_msg}</center></div>

{/adi:if}
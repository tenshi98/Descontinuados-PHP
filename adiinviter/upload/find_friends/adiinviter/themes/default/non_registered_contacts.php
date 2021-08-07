<!-- Non-Registered Contacts HTML -->

{adi:set $total_count = 0}

<!-- Set Contact type -->
{adi:if $config['email'] == 1}
	{adi:if $config['avatar'] == 1}
		{adi:set $contact_type = 1}
	{adi:else/}
		{adi:set $contact_type = 2}
	{/adi:if}
{adi:else/}
	{adi:if $config['avatar'] == 1}
		{adi:set $contact_type = 3}
	{adi:else/}
		{adi:set $contact_type = 4}
	{/adi:if}
{/adi:if}

<script type="text/javascript">
adi.cns='';
</script>

{adi:foreach $contacts, $email_id, $details}
	{adi:set $details['status'] = (isset($details['status']) || !empty($details['status']) ? $details['status'] : 'never_invited')}
	{adi:set $selectable = (in_array($details['status'],array('invitation_sent','blocked','waiting'))) ? 0:1}
	{adi:set $div_css_class = ($selectable == 1 ? 'reg_conts adi_selectable' : 'reg_conts_disabled')}

	{adi:if !isset($details['avatar'])}
		{adi:set $details['avatar'] = ''}
	{/adi:if}

	{adi:set $total_count = $total_count + 1}
	
	{adi:if $contact_type == 1}
	<!-- Email contact with Avatar -->
		<div class="adi_contact {adi:var $div_css_class} adi_contact_{adi:var $total_count}" tip="{adi:var $details['name']}" rel="{adi:var $email_id}:-:{adi:var $details['name']}">
			<div class="reg_conts_img_out adi_left"><img src="{adi:var $details['avatar']}"/></div>
			<p class="adi_name">{adi:var $details['name']}</p>
			<p class="adi_id">{adi:var $email_id}</p>
			<input type="checkbox" name="adi_conts[{adi:var $email_id}]" value="{adi:var $details['name']}" class="adi_cont_checked">
		</div>
	{adi:elseif $contact_type == 2}
	<!-- Email Contact without Avatar -->
		<div class="adi_contact {adi:var $div_css_class} adi_contact_{adi:var $total_count}" tip="{adi:var $details['name']}" rel="{adi:var $email_id}:-:{adi:var $details['name']}">
			<p class="adi_name">{adi:var $details['name']}</p>
			<p class="adi_id">{adi:var $email_id}</p>
			<input type="checkbox" name="adi_conts[{adi:var $email_id}]" value="{adi:var $details['name']}" class="adi_cont_checked">
		</div>
	{adi:elseif $contact_type == 3}
	<!-- Social with avatar -->
		<div class="adi_contact {adi:var $div_css_class} adi_contact_{adi:var $total_count}" tip="{adi:var $details['name']}" rel="{adi:var $email_id}:-:{adi:var $details['name']}">
			<div class="reg_conts_img_out adi_left"><img src="{adi:var $details['avatar']}"/></div>
			<p class="adi_name">{adi:var $details['name']}</p>
			<input type="checkbox" name="adi_conts[{adi:var $email_id}]" value="{adi:var $details['name']}" class="adi_cont_checked">
		</div>
	{adi:elseif $contact_type == 4}
	<!-- Social without avatar -->
		<div class="adi_contact {adi:var $div_css_class} adi_contact_{adi:var $total_count}" tip="{adi:var $details['name']}" rel="{adi:var $email_id}:-:{adi:var $details['name']}">
			<p class="adi_name">{adi:var $details['name']}<br /><br /></p>
			<input type="checkbox" name="adi_conts[{adi:var $email_id}]" value="{adi:var $details['name']}" class="adi_cont_checked">
		</div>
	{/adi:if}
	<script type="text/javascript">
	adi.add_to_contact_names({adi:var $total_count},{adi:if ($contact_type == 1 || $contact_type ==2)}" {adi:var strtolower($details['name']).' '.strtolower($email_id).' >>>'.$total_count}; "{adi:else/}" {adi:var strtolower($details['name']).' >>>'.$total_count}; "{/adi:if});
	/**/
	</script>

{/adi:foreach}
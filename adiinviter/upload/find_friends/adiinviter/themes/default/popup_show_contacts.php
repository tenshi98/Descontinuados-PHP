adi.config = {adi:var $config_json};
adi.num_invites = {adi:var $num_invtes_js_val};
var fa_html_data = {adi:var $friend_adder_container_html};
var is_html_data = {adi:var $invite_sender_container_html};
adiconts = jQuery.extend({},adi.conts,{
	fa_html:fa_html_data["html"], fa_enabled:{adi:var $show_friend_adder_jsval}, pp_enabled:{adi:var $profile_page_system_enabled}, mutual_friends: {adi:var $mutual_friends_json},fa_conts:[],
	is_html:is_html_data["html"], is_enabled:{adi:var $show_invites_sender_jsval},is_conts:[],
	gui: {adi:var (($adiinviter->settings['adiinviter_store_guest_user_info'] == 1) ? 1 : 0)},
});
{adi:if $show_friend_adder}
{adi:foreach $registerd_conts_json_chunks, $chunk}
	adiconts.fa_conts.push({adi:var $chunk});
{/adi:foreach}
{/adi:if}
{adi:if $show_invites_sender}
{adi:foreach $nonregistered_conts_json_chunks, $chunk}
	adiconts.is_conts.push({adi:var $chunk});
{/adi:foreach}
{/adi:if}
adiconts.init();
<div class="adi_paginate_out">

<table class="adi_clear_table adi_fleft" cellpadiing="0" cellspacing="0">
<tr class="adi_clear_tr">
	<td class="adi_clear_td" valign="middle"><input type="button" class="adi_button adi_delete_selected" value="{adi:phrase adi_ih_delete_selected_btn}"></td>
</tr></table>

<table class="adi_clear_table adi_fright adi_paginate_table" cellpadiing="0" cellspacing="0">
<tr class="adi_clear_tr">
	<!-- Link to first page -->
	<td class="adi_clear_td" valign="middle" style="vertical-align:middle;">
		<span class="{adi:if ($page_no == 1)}adi_paginate_link_disabled{adi:else/}adi_do_paginate adi_paginate_link{/adi:if}" data="1">{adi:phrase adi_ih_pagination_go_to_first_page}</span>
	</td>

	<!-- Link to previous page -->
	<td class="adi_clear_td" valign="middle" style="vertical-align:middle;">
		<span class="{adi:if ($page_no == 1)}adi_paginate_link_disabled{adi:else/}adi_do_paginate adi_paginate_link{/adi:if}" data="{adi:var $page_no-1}">{adi:phrase adi_ih_pagination_go_to_previous_page}</span>
	</td>

	<!-- Direct pages link -->
{adi:foreach $pages_list, $id, $pgno}
	{adi:if $pgno == $page_no}
		<td class="adi_clear_td" valign="middle" style="vertical-align:middle;">
			<span class="adi_do_paginate adi_current_page" data="{adi:var $pgno}">{adi:var $pgno}</span>
		</td>
	{adi:else/}
		<td class="adi_clear_td" valign="middle" style="vertical-align:middle;">
			<span class="adi_do_paginate adi_other_page" data="{adi:var $pgno}">{adi:var $pgno}</span>
		</td>
	{/adi:if}
{/adi:foreach}
	
	<!-- Link to next page -->
	<td class="adi_clear_td" valign="middle" style="vertical-align:middle;">
		<span class="{adi:if ($page_no == $total_pages)}adi_paginate_link_disabled{adi:else/}adi_do_paginate adi_paginate_link{/adi:if}" data="{adi:var $page_no+1}">{adi:phrase adi_ih_pagination_go_to_next_page}</span>
	</td>

	<!-- Link to last page -->
	<td class="adi_clear_td" valign="middle" style="vertical-align:middle;">
		<span class="{adi:if ($page_no == $total_pages)}adi_paginate_link_disabled{adi:else/}adi_do_paginate adi_paginate_link{/adi:if}" data="{adi:var $total_pages}">{adi:phrase adi_ih_pagination_go_to_last_page}</span>
	</td>

</tr></table>
<div class="adi_clear"></div>
</div>
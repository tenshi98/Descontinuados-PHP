<?php $search_text = __( 'Search', 'tempera' ); ?> 
<form method="get" id="searchform"
action="<?php echo esc_url(home_url( '/' )); ?>/">
<input type="text" value="<?php echo $search_text; ?>"
name="s" id="s"
onblur="if (this.value == '')
{this.value = '<?php echo $search_text; ?>';}"
onfocus="if (this.value == '<?php echo $search_text; ?>')
{this.value = '';}" />
<input type="submit" id="searchsubmit" value="&#xe816;" />
</form>
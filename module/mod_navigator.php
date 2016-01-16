<?php
$menu = $this->query("SELECT * FROM dl_component WHERE name='$GLOBALS[component_name]' LIMIT 1"); ?>
<div id="navigator"><?php echo $menu[0]['title']; ?></div>
<script type="text/javascript">
$(function(){
	$.fn.NavigatorNext = function(url){		
		console.log('<a class="link_text" href="">.......</a>');
	};
});
</script>
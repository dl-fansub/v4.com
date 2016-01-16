<?php
$error_id = 1;
if($GLOBALS['error_type']=='component_name') {
	$error_id = 2;
} elseif($GLOBALS['error_type']=='component_folder') {
	$error_id = 1;
}
$error = $database->query("SELECT * FROM dl_content WHERE content_id=$error_id LIMIT 1;"); ?>
<div id="navigator"><?php echo $error['title']; ?></div>
<center><div class="error_panel" align="left">
  <h1><?php echo $error['pretext']; ?></h1>
  <div style="padding:5px 20px 30px 20px;"><?php echo $error['fulltext']; ?></div>
  <p>
   <a class="link_text" onclick="javascript:history.back(1)"><?php echo _ERROR_PAGE_BACK; ?></a> /
   <a class="link_text" onclick="javascript:window.location = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/';"><?php echo _ERROR_PAGE_HOME; ?></a>
  </p>
</div></center>
<script type="text/javascript">
$(function(){
	$.fn.NavigatorNext = function(url){		
		console.log('<a class="link_text" href="">.......</a>');
	};
});
</script>
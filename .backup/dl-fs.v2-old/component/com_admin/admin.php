<script type="text/javascript">
$(function(){
	$('#admin_config').empty()
	ModuleList(0);
	

});

function ModuleSelected(id) {
	ModuleList(id);	
	$('#config').animate({
		width: 300,
	}, 300, function() {
		$.ajax({ url: 'index.php?stage=admin&ajax=page_module_config',
			data: { id: id },
			dataType: 'html',
			success: function(data) {
				$('#admin_config').html(data);
				$(document).dlReset();
			},
		});
	});
	

}

function ModuleList(id) {
	$.ajax({ url: 'index.php?stage=admin&ajax=page_module',
		data: { selected: id },
		dataType: 'html',
		success: function(data) { $('#admin_list').html(data); },
	});
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" rowspan="2" valign="top"><div id="admin_manage">
      <div id="admin_profile" class="admin_menu"><?php echo _ADMIN_PROFILES; ?></div>
      <div id="admin_profile" class="admin_menu"><?php echo _ADMIN_COMPONENT; ?></div>
      <div id="admin_profile" class="admin_mened"><?php echo _ADMIN_MODULE; ?></div>
    </div></td>
    <td colspan="2" valign="top">
     <div class="module_header"><?php echo _ADMIN_MODULE; ?></div>
    </td>
  </tr>
  <tr>
    <td valign="top"><div id="admin_list"></div></td>
    <td valign="top" id="config"><div id="admin_config"></div></td>
  </tr>
</table>
<script type="text/javascript">

function ModulePublic(me, id) {
	$.ajax({ url: 'index.php?stage=admin&ajax=module_manage',
		data: { id: id, val: $(me).attr('val'), manage: 'public' },
		success: function(data) {
			$(me).removeClass($(me).attr('class'));
			if($(me).attr('val')==1) $(me).attr('val','0').addClass('btn_publisher chk_off')
			else $(me).attr('val','1').addClass('btn_publisher chk_on');
		},
	});
}

</script>
<?php
$width = array(50,0,80,100,50);
?>
<div class="control_module">
</div>
<table class="list_head" width="100%" cellpadding="3" cellspacing="0" border="0">
 <tr>
  <td width="<?php echo $width[0]; ?>" align="center"><?php echo _ADMIN_MODULE_PUBLISHER; ?></td>
  <td width="<?php echo $width[1]; ?>"><?php echo _ADMIN_MODULE_TITLE; ?></td>
  <?php if($_POST['selected']==0): ?>
  <td width="<?php echo $width[2]; ?>" align="center"><?php echo _ADMIN_MODULE_PANEL; ?></td>
  <td width="<?php echo $width[3]; ?>" align="center"><?php echo _ADMIN_MODULE_TYPE; ?></td>
  <td width="<?php echo $width[4]; ?>" align="center"><?php echo _ADMIN_MODULE_SORTED; ?></td>
  <?php endif; ?>
 </tr>
</table>
<div class="module_list_begin"></div>
<?php
$lineColor = 0;
$idWarning = array(3,4);
foreach($database->Query("SELECT * FROM dl_module ORDER BY panel_id ASC;") as $menu) {
	$viewModule = true;
	foreach($idWarning as $id) if($menu['module_id']==$id) { $viewModule = false; break; }
	if($viewModule) {
		if($lineColor%2==1) $listLine = ' list_line'; else $listLine = '';
		list($menu['panel_id']) = $database->Query("SELECT panel FROM dl_panel WHERE panel_id=$menu[panel_id] LIMIT 1;");
		echo '<table class="';
		if($_POST['selected']==0) { echo 'module_list'.$listLine.''; } else { if($_POST['selected']==$menu['module_id']) { echo 'list_selected'; } else { echo 'list_disabled'; } }
		echo '" width="100%" cellpadding="3" cellspacing="0" border="0"><tr>';
		$chkPublisher = ' chk_off';
		if($menu['publisher']==1) $chkPublisher = ' chk_on';
		echo '<td width="'.$width[0].'" align="center"><div class="btn_publisher'.$chkPublisher.'" val="'.$menu['publisher'].'" onClick="ModulePublic(this,'.$menu['module_id'].')';
		echo '"></div></td>';
		echo '<td width="'.$width[1].'"><div style="cursor:pointer;" onClick="ModuleSelected('.$menu['module_id'].');"';
		echo '><div class="module_name">'.$menu['name'].'</div><span class="module_title">'.$menu['title'].'</span></div></td>';
		if($_POST['selected']==0) {
			echo '<td width="'.$width[2].'" align="center">'.$menu['panel_id'].'</td>';
			echo '<td width="'.$width[3].'" align="center">'.$menu['type'].'</td>';
			echo '<td width="'.$width[4].'" align="center">'.$menu['sorted'].'</td>';
		}
		echo '</tr></table>';
		$lineColor++;
	}
}
?>
<div class="module_list_end"></div>

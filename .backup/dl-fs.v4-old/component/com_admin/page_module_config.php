<script type="text/javascript">
$(function(){
	$('#save_edit').click(function(){
		var multipleValues = $("#module_menu").val() || [];
		$.ajax({ url: 'index.php?stage=admin&ajax=module_manage',
			data: {
				manage: 'save',
				id: <?php echo $_POST['id']; ?>,
				title: $('#module_title').val(),
				name: $('#module_name').val(),
				panel: $('#module_panel').val(),
				type: $('#module_type').val(),
				sorted: $('#module_sort').val(),
				menu: multipleValues,
			},
			success: function(data) {
				$('#admin_config').empty();
				$('#config').animate({
					width: 0,
				}, 200,	function(data) {
					$('.module_list_end').html();
					ModuleList(0);
					$(document).dlReset();
				});
			},
		});

	});
	
	$('#del_edit').click(function(){		
		$('.dialogbox').show(0).animate({
			opacity: 1,
			width: 500,
			"margin-left": '-225px',
		}, 200);
	});	
	
	$('.dialogbox').css('opacity',0).hide(0);
	$('.dialog_confirm').click(function(){
		alert("ad");
	});
	
	$('.dialog_cancel').click(function(){	
		$('.dialogbox').animate({
			opacity: 0,
			"margin-left": '-450px',
		}, 200,	function(data) {

		}).hide(0);
	});
	
	$('#module_viewall').click(function(){
		if($('#module_viewall').attr("checked")=="checked") {
			$("#module_menu").attr('disabled','disabled');
		} else {
			$("#module_menu").removeAttr('disabled');
		}
	});
});
</script>
<?php
$module = $database->Query("SELECT * FROM dl_module WHERE module_id=$_POST[id] LIMIT 1;"); ?>
 <div class="dialogbox" align="left">
   <h1><?php echo _DIALOG_DEL_VERIFY; ?></h1>
   <div align="right">
    <input type="button" class="dialog_confirm" value="<?php echo _DIALOG_BTN_VERIFY; ?>" />
    <input type="button" class="dialog_cancel" value="<?php echo _DIALOG_BTN_CANCEL; ?>" />
   </div>
 </div>

<div id="admin_edit">
  <div class="config_head">
    <input type="button" id="save_edit" class="btnlink" value="<?php echo _ADMIN_MODULE_SAVE; ?>" />
    <input type="button" id="del_edit" class="btnlink" value="<?php echo _ADMIN_MODULE_DELETE; ?>" />
  </div>
  <h5><?php echo _ADMIN_MODULE_DATA; ?></h5>
  <div class="input_name">Title</div>
  <div class="input_box">
    <input type="text" id="module_title" value="<?php echo $module['title']; ?>" maxlength="100" size="35" />
  </div>
  <div class="input_name">Name</div>
  <div class="input_box">
    <input type="text" id="module_name" value="<?php echo $module['name']; ?>" maxlength="20" size="35" />
  </div>
  <div class="input_name">Panal</div>
  <div class="input_box">
    <select id="module_panel">
      <?php
foreach($database->Query("SELECT * FROM dl_panel;") as $panel): ?>
      <option <?php if($panel['panel_id']==$module['panel_id']) echo 'selected'; ?> value="<?php echo $panel['panel_id']; ?>"><?php echo $panel['panel']; ?></option>
      <?php
endforeach; ?>
    </select>
  </div>
  <div class="input_name">Type</div>
  <div class="input_box">
    <input type="text" id="module_type" value="<?php echo $module['type']; ?>" maxlength="2" size="3" />
  </div>
  <div class="input_name">Sort</div>
  <div class="input_box">
    <input type="text" id="module_sort" value="<?php echo $module['sorted']; ?>" maxlength="2" size="3" />
  </div>
  <br />
  <h5><?php echo _ADMIN_MODULE_VIEW; ?></h5>
  <div class="input_name">Menu</div>
  <div class="input_box">
  <select size="10" id="module_menu" multiple="multiple" <?php if($database->Query("SELECT COUNT(*) FROM dl_view WHERE module_id=$_POST[id];")==0) echo 'disabled="disabled"'; ?>>
    <?php foreach($database->Query("SELECT * FROM dl_menu WHERE parent_id=0;") as $menu):
	  $selected = $database->Query("SELECT COUNT(*) FROM dl_view WHERE menu_id=$menu[menu_id] AND module_id=$_POST[id];"); ?>
      <option <?php if($selected) echo 'selected="selected"'; ?> value="<?php echo $menu['menu_id']; ?>"><?php echo $menu['title']; ?></option>
      <?php foreach($database->Query("SELECT * FROM dl_menu WHERE parent_id=$menu[menu_id];") as $submenu): 
	    $selected = $database->Query("SELECT COUNT(*) FROM dl_view WHERE menu_id=$submenu[menu_id] AND module_id=$_POST[id];"); ?>
        <option <?php if($selected) echo 'selected="selected"'; ?> value="<?php echo $submenu['menu_id']; ?>"> - <?php echo $submenu['title']; ?></option>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </select><div><label>
  <input type="checkbox" id="module_viewall" value="1" <?php if($database->Query("SELECT COUNT(*) FROM dl_view WHERE module_id=$_POST[id];")==0) echo 'checked="checked"'; ?> />
  <?php echo _ADMIN_MODULE_VIEWALL; ?></label></div>
  </div>
</div>

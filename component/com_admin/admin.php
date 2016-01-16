<script type="text/javascript">
$(function(){
	alert(location.hash);
	//if(location.hash=='') window.location.hash = config;
	
	
	$(window).hashchange(function(){
		alert(location.hash);
	})

});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="180" rowspan="2" valign="top"><div id="admin_manage">
      <div id="menu_profile" class="admin_men<?php if($_GET['admin']=='profile') echo 'ed'; else echo 'u'; ?>"><?php echo _ADMIN_PROFILES; ?></div>
      <div id="menu_component" class="admin_men<?php if($_GET['admin']=='component') echo 'ed'; else echo 'u'; ?>"><?php echo _ADMIN_COMPONENT; ?></div>
      <div id="menu_module" class="admin_men<?php if($_GET['admin']=='module') echo 'ed'; else echo 'u'; ?>"><?php echo _ADMIN_MODULE; ?></div>
    </div></td>
    <td colspan="2" valign="top"><div id="admin_edit">
     <div id="admin_naigator"></div>
     <div class="admin_form">
       <div id="config_profile" class="admin_config" <?php if($_GET['admin']=='profile') echo 'style="display:block;"'; ?>>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top">
             <?php echo _ADMIN_PROFILES; ?>
            </td>
          </tr>
        </table>      
       </div>
       <div id="config_component" class="admin_config" <?php if($_GET['admin']=='component') echo 'style="display:block;"'; ?>><?php echo _ADMIN_COMPONENT; ?></div>
       <div id="config_module" class="admin_config" <?php if($_GET['admin']=='module') echo 'style="display:block;"'; ?>>
        <table width="800" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td><? echo _ADMIN_MODULE_PUBLISHER; ?></td>
            <td><? echo _ADMIN_MODULE_TITLE; ?></td>
            <td><? echo _ADMIN_MODULE_NAME; ?></td>
            <td><? echo _ADMIN_MODULE_PANEL; ?></td>
            <td><? echo _ADMIN_MODULE_SORTED; ?></td>
          </tr>
        </table>
       </div>
     </div>
     </div>
    </td>
  </tr>
</table>
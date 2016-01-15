<script type="text/javascript">
$(function(){
	
});
</script>
<table id="dl_background" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
      <table align="center" width="970" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="380"><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>"><img src="images/DigitalLover_Logo.png" width="380" height="115" border="0" vspace="5" /></a></td>
          <td align="right" valign="top">
          <div class="box_serach"><input type="text" id="serach" maxlength="40" value="" /></div>
          <div class="box_access"><?php ModuleLoad('userbar'); ?></div>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" align="center"><div style="height:62px;">
      <table class="bar_mainmenu" width="50%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="15" valign="top"><img src="images/menuHead_Left.png" width="15" height="66" border="0" /></td>
          <td><?php ModuleLoad('mainmenu'); ?></td>
          <td width="15" valign="top"><img src="images/menuHead_Right.png" width="15" height="66" border="0" /></td>
        </tr>
      </table></div>
    </td>
  </tr>
  <tr>
    <td class="body_height"><center><div class="dlbg_maintop"><div class="dlbg_mainbottom"><div style="width:<?php echo $siteWidth; ?>;">
      <?php
      ModuleLoad('slider');
	  if(!file_exists('component/com_'.$_GET['stage'].'/')) echo '<div style="padding:10px 0 20px 0;"><div id="error_page">'._ERROR_PAGEDESCRIPTION.'</div></div>';
	  ?>
      <div id="dlmain_below"><div id="dlmain_above"><div class="bg_main"><?php
	    $database = new SyncDatabase();
		$error = $database->query("SELECT * FROM dl_component WHERE com_id=1 LIMIT 1;");	
		if(!$GLOBALS['MENU'] && !$database->query("SELECT COUNT(*) FROM dl_component WHERE name='com_$_GET[stage]' LIMIT 1;")) {	
			echo '<div class="body_panel">';
			include('component/com_error/page_null.php');
			echo '</div>';
		} else {
			if(!file_exists('component/com_'.$_GET['stage'].'/')) {
				include('component/com_error/com_null.php');
			} else { ?>
			  <table id="height_page" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                 <td colspan="2"><div class="nav_panel"><?php ModuleLoad('nav'); ?></div></td>
                </tr>
                <tr>
                  <td valign="top"><div class="body_panel"><?php ModuleLoad('body'); ?></div></td><?php
                  $database = new SyncDatabase();
                  if($database->query("SELECT COUNT(*) FROM dl_module WHERE panel_id=5 AND publisher=1 LIMIT 1;")): ?>
                  <td class="right_panel" width="210"><?php ModuleLoad('right'); ?></td><?php
                  endif; ?>
                </tr>
                <tr>
                 <td class="asd" colspan="2" valign="bottom"><div class="credit_panel"><?php ModuleLoad('support'); ?></div></td>
                </tr>
              </table>
              <?php	
			} 
		}
		?>
      </div></div></div>      
      <div align="right"><input type="button" id="btn_backtop" onClick="jQuery.scrollTo(0,200);"/>
      <div id="footer_resize"></div>
      <div class="dlbg_footer" align="center"><?php echo $profile['footer']; ?></div></div>
    </div></div></center></td>
  </tr>
</table>

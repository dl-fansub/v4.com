<script type="text/javascript">
$(function(){
	jQuery.fn.GobalConfig = {
		Interval: $('#dl_background'),
		Hash: true,
		Focus: true,
		Dialog: false
	}
	
	$.ajaxSetup({ type: 'POST', dataType: 'json' });
	$(document).noContext();
	$(window).focus(function(e) { jQuery.fn.GobalConfig.Focus = true; });
	$(window).blur(function(e) { jQuery.fn.GobalConfig.Focus = false; });
	
	var _RefreshCounter  = 0;
	var _RefreshInterval = setInterval(function() {
		var _RefreshFunc = jQuery.fn.GobalConfig.Interval;		
		if(jQuery.fn.GobalConfig.Focus&&!jQuery.fn.GobalConfig.Dialog) {
			for(var key in _RefreshFunc.data()) {
				if((_RefreshCounter>=_RefreshFunc.data(key).wait && ((_RefreshCounter-_RefreshFunc.data(key).wait)%_RefreshFunc.data(key).time)==0)) { _RefreshFunc.data(key).code(); }
			}
	 		_RefreshCounter++;
		}
     }, 1000);
	/*
	jQuery.fn.GobalConfig.Interval.data({ "mod_slideshow": {
			wait: 1, // Second
			time: 20,// Second
			code: function(){ // CODEE // }
		}
	});*/
});
if(jQuery)(function(){$.extend($.fn,{Hash:location.hash,HashClear:function(){location.hash="";return $(this);},
HashChanged:function(change){location.hash=change;jQuery.fn.GobalConfig.Hash= false;return $(this);},
ScreenCenter:function(){$(this).css('left',($('#dl_background').width()/2)-($(this).width()/2));return $(this);},
ScreenMiddle:function(){$(this).css('left',($('#dl_background').height()/2)-($(this).height()/2));return $(this);},
Cookie:function(name,value,time){if(name!=null&&value!=null){$.ajax({url:'?@from_SessionCookie',data:{type:'c',cname:name,cvalue:value,ctime:time}});}}, // time = Minute Integer
Session:function(objects){if(typeof(objects)!='undefined'){$.ajax({url:'?@from_SessionCookie',data:{type:'s',value:objects}});}},
isCookie:function(name,funcSuccess){if(name!=null&&typeof(funcSuccess)=="function"){$.ajax({url:'?@from_SessionCookie',data:{name:name},success:funcSuccess});}}});})(jQuery);
</script>
<div id="dl_background">
  <table class="dlbg_header" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" align="center">
        <table align="center" cellspacing="0" cellpadding="0" style="width:970px; height:200px;">
          <tr>
            <td align="left" >
             <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>">
              <img style="margin:-10px 0 0 <?php if($this->cookie("verify-access_code")) echo "120px"; else echo "0"; ?>;" src="images/logo_dlfs.png" width="380" height="115" border="0" />
             </a>
            </td>
          </tr>
          <tr>
            <td><?php $this->Module('userbar'); ?></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td valign="top" align="center" height="66">
      <div id="border_topright"><div id="border_topleft"><?php $this->Module('mainmenu'); ?></div></div></td>
    </tr>
  </table>
  <?php if($GLOBALS['menu_id']): ?>
  <center style="background-color:#FCFCFC;">
  <table class="dlbg_body" border="0" cellspacing="0" cellpadding="0" style="width:970px;">
    <tr>
      <td>
      <center><div class="bg_contents" style="background-color:#FCFCFC !important">
      <?php if(!$GLOBALS['error_type']) $this->Module('notice'); ?>
	  <?php if(!$GLOBALS['error_type']) $this->Module('slider'); ?>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td colspan="2"><div class="nav_panel"><?php if(!$GLOBALS['error_type']) $this->Module('nav'); ?></div></td>
			</tr>
			<tr>
			  <td valign="top"><div class="body_panel"><?php $this->Module('body'); ?></div></td><?php
			  if($this->query("SELECT COUNT(*) FROM dl_module WHERE panel_id=5 AND publisher=1 LIMIT 1;")): ?>
				<td class="right_panel" width="210"><?php if(!$GLOBALS['error_type']) $this->Module('right'); ?></td><?php
			  endif; ?>
			</tr>
		  </table>
		</div></center>
      </td>
    </tr>
  </table>
  </center>
  <table class="dlbg_footer" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><center style="background-color:#FCFCFC;"><div style="width:970px;"><div id="page_resize"></div>
        <div class="notice_message"><?php if(!$GLOBALS['error_type']) $this->Module('support'); ?></div></div></center>
      </td>
    </tr>
    <tr>
      <td align="center"><div style="background-color:#FCFCFC">
        <div align="right" style="width:970px;"><input type="button" id="btn_backtop" onclick="jQuery.scrollTo(0,200);"/></div></div>
      </td>
    </tr>
    <tr>
      <td>
        <div align="center">
          <div id="border_bottomleft"><div id="border_bottomright"><div id="border_footer"><?php echo $this->profile('footer'); ?></div></div></div>
        </div>
      </td>
    </tr>
  </table>
 <?php endif; ?>
</div>
<dialog id="control"><dialog id="box"><dialog id="content"></dialog></dialog></dialog>
<dialog id="background"></dialog><preload id="dialog"></preload>
<?php if(!$GLOBALS['menu_id']): ?>
<div id="error_page">
asdasd
</div>
<?php endif; ?>
<script> $(function(){ $(window).hashchange(); });</script>

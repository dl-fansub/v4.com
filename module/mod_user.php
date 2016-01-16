<script type="text/javascript">
if(jQuery)(function(){
	$.extend($.fn,{
		txtInput:function(){
			if($(this).attr('rule')) $(this).css('color','#c8c8c8').val($(this).attr('rule'));
			$(this).bind('focusin focusout', function(e){
				if(e.type=="focusin") {
					if($(this).val()==$(this).attr('rule') || $(this).val()=="") $(this).css({'color':'#126095','border':'#2382c2 solid 2px'}).val("");			
				} else if(e.type=="focusout") {
					if($.trim($(this).val())=="") {
						$(this).css({'color':'#c8c8c8','border':'#c8c8c8 solid 2px'}).val($(this).attr('rule'));
					} else {
						$(this).css({'color':'#126095','border':'#2382c2 solid 2px'});
					}
				}
			});
		},
		txtInfo:function(){ },
		txtAlert:function(){ },
		
	});
})(jQuery);


$(function(){
	$(window).hashchange(function() {
		if(jQuery.fn.GobalConfig.Hash) {	
			switch(jQuery.fn.Hash) {
				case "#register":				
					$('#btnRegister').Dialog('opened','frm_register');
					break;
				case "#forget":
					$('#dialog_forget').Dialog('opened');
					break;
			}
		}
	});
	
	// Dialog Config 
	//$('#dialog_forget').DialogConfig({Width: 500, Speed: 200 });
	//$('#dialog_register').DialogConfig({Width: 750, Speed: 200 });
	$('#btnRegister').DialogConfig({Width: 500, Speed: 200 });
	
	$('#btnRegister').click(function(){
		$(this).HashChanged("register").Dialog('open','frm_register');
	});
	$('#btnForget').click(function(){ $('#dialog_forget').HashChanged("forget").Dialog('open'); });	
	//$('#fb_connect').click(function(){ $('#from_connect').dialogOpen(970,100); });
	//$('#tw_connect').click(function(){ $('#from_connect').dialogOpen(970,100); });
	//$('#go_connect').click(function(){ $('#from_connect').dialogOpen(970,100); });
	
	// LOGIN EVENT
	$('#dl_username').txtInput();
	$('#dl_password').txtInput();
	$('#dl_username, #dl_password').keyup(function(e){ 
		$(this).css({'border':'#2382c2 solid 2px'});
		if(e.which==13){
			var _USER = $('#dl_username');
			var _PASS = $('#dl_password');
			if(($.trim(_USER.val())!="" && $.trim(_USER.val())!=_USER.attr('rule')) && ($.trim(_PASS.val())!="" && $.trim(_PASS.val())!=_PASS.attr('rule'))) {
				$('#box_register').hide(0);
				$('#box_preload').show(0);	
				$.ajax({url:"require.php?@mod_UserLogin",
					data:{ dluseraccess:$.trim(_USER.val()), dlpassaccess:_PASS.val(), logs:'in' },
					error: function(){ console.log("Error:: mod_user.php->mod_UserLogin.php"); },
					success: function(data){
						if(data.error==null) {
							window.location.reload();
						} else {
							$('#dl_username').focus();
							$('#dl_password').val("");
							$('#box_register').show(0);
							$('#box_preload').hide(0);
							$('#error_login').show(0);
							$('#error_login').css('margin-left',data.margin);
							$('#error_login').html(data.error);
						}
					}				
				});
			} else {
				if($.trim(_USER.val())=="" || _USER.val()==_USER.attr('rule')) _USER.css({'border':'#c22323 solid 2px'});
				if($.trim(_PASS.val())=="" || _PASS.val()==_PASS.attr('rule')) _PASS.css({'border':'#c22323 solid 2px'});
			}
				
		}
	});
	
	$('#btnLogout').click(function() {
		$('confirm#logout').css({'top':25, 'left':-25}).fadeIn(200);
    });
	
	$('#confirm_yes').click(function() {
		$('confirm#logout').width($('confirm#logout').width()).height(32);		
		$('confirm#button').fadeOut(0);
		$('preload#logout').fadeIn(0);
		$.ajax({url:"require.php?@mod_UserLogin",
			data:{ logs:'out' },
			error: function(){ console.log("Error:: mod_user.php->mod_UserLogin.php"); },
			success: function(){
				window.location.reload();
			}				
		});
    });
});
</script>
<?php

// Verify Access Data
$isTime = time();
$isExpire = $isTime - 1800;
if($this->cookie('id-access_code') && $this->cookie('verify-access_code')) {
	$GLOBALS['USER'] = $this->cookie('id-access_code');
	$access = $this->query("SELECT * FROM dl_user WHERE user_id=$GLOBALS[USER] LIMIT 1;");
	if((md5($access['username']).md5($this->profile("encrypt")).md5($access['password']))===$this->cookie('verify-access_code')) $GLOBALS['ACCESS'] = $access['username'];	
}

// Online Status
if(!$this->query("SELECT * FROM dl_online WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;")) {
	$id = 0;
	if($GLOBALS['ACCESS']) $id = $this->cookie('id-access_code');
	$this->query("INSERT INTO dl_online VALUES ('$_SERVER[REMOTE_ADDR]', $id, $isTime)");
} else {
	$this->query("UPDATE dl_online SET signin=$isTime WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;");
	$this->query("DELETE FROM dl_online WHERE signin<$isExpire LIMIT 1;");
}

$avater = "";
if($GLOBALS['ACCESS']) {
	$member = $this->cls("class_profile");
	$member = $member->GetMember($this->cookie('id-access_code'));
	if($member['avatar']!=NULL) $avater .= '<img src="'.$this->profile("image_server").$member['avatar'].'" width="100" />';
}

?>
<?php if(!$GLOBALS['ACCESS']):?>
<div id="dialog_login">
   <div id="box_register">
   <div id="error_login" class="error"></div>
   <form id="access_user" name="login">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">
         <input type="text" id="dl_username" value="" rule="<?php echo _LOGIN_USERNAME; ?>" /><input type="password" id="dl_password" value="" rule="<?php echo _LOGIN_PASSWORD; ?>" />
        </td>
      </tr>
      <tr>
        <td>
        <div style="color:#000;margin-top:5px; text-align:center">
        <strong><a class="link_text" id="btnRegister"><?php echo _REGISTER_REGIS; ?></a>/<a class="link_text" id="btnForget"><?php echo _REGISTER_FORGET; ?></a></strong>               
        <strong><?php echo _REGISTER_OR; ?></strong>
          <input type="button" id="fb_connect" value="" />
          <input type="button" id="tw_connect" value="" disabled="disabled" />
          <input type="button" id="go_connect" value="" disabled="disabled" />
        </div>
        </td>
      </tr>
    </table>
   </form>
   </div>
</div>
<?php else: ?>
<div id="profile_bg"></div>
<div id="profile_user">
<table width="100%" border="1" style="position:absolute;margin-top:-82px;">
  <tr>
    <td align="left" width="160" valign="top"><profile id="avater"><avater id="image"><?php echo $avater; ?></avater></profile></td>
    <td align="left" style="padding:6px 5px 5px 0px;">
     <p><profile id="nickname"><?php echo _PREFILE_WELCOME." ".$member['nickname']; ?></profile>
     <profile id="logout"><a class="link_text" id="btnLogout"><?php echo _PREFILE_LOGOUT; ?></a></profile></p>
     <confirm id="logout">
       <confirm id="text"><?php echo _CONFIRM_LOGOUT; ?></confirm>
       <img id="arrow_confirm" src="../images/arrow_confirm.png" width="11" height="7" />
       <confirm id="button">
       <input type="button" id="confirm_yes" value="<?php echo _CONFIRM_YES; ?>" />
       <input type="button" id="confirm_no" value="<?php echo _CONFIRM_NO; ?>" onclick="$('confirm#logout').fadeOut(200);" />
       </confirm>
       <preload id="logout"></preload>
     </confirm>
     <p><profile id="coins"><?php echo profile::conis($member['coins']); ?></profile></p>
     <p><profile id="title"><?php echo _PREFILE_LEVEL; ?></profile><profile id="level"><?php
     	echo $member['level']; if($member['adult']==1) echo _PREFILE_ADULT; echo $member['rank']; ?></profile></p>
     <p><profile id="title"><?php echo _PREFILE_EXP; ?></profile><profile id="post"><?php echo profile::experience($member['post']); ?></profile></p>
    </td>
  </tr>
</table>
</div>
<?php endif; ?>
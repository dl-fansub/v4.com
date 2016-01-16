<script type="text/javascript">
$(function(){

	 // SATAGE 1	
	$.fn.AgreeEnabled = function() {
		var AgreeTotal = 0; var AgreeCurrent = 0;
		$(this).css('background-position','5px 6px').data('check',1);
		$('button.agree').each(function(index, element) { if($(element).data('check')==1) { AgreeCurrent++; } AgreeTotal++;});
		if(AgreeTotal==AgreeCurrent) $('#regis_agree').removeAttr('disabled');
	}	

	$('#regis_agree').click(function(){
		$('#btnRegister').data('Closing',false);
		$('#dialog_agree_form').fadeOut(0);
		$('#dialog_profile_form').fadeIn(300);
	});
	
	// SATAGE 2
	
	$('#txt_username').txtInput();
	$('#txt_password').txtInput();
	$('#txt_email').txtInput();
	$('#txt_nickname').txtInput();
	
	var d = new Date();
	var iDay = {};
	var iYear = {};
	for(var iLoop=1;iLoop<32;iLoop++) { iDay[iLoop] = iLoop; }
	for(var iLoop=0;iLoop<100;iLoop++) { iYear[(d.getFullYear()+543)-iLoop] = (d.getFullYear()+543)-iLoop; }
	
	$('.select_day').dlComboBox(iDay,11);
	$('.select_year').dlComboBox(iYear,15);
		
	$('.select_month').dlComboBox({
		1:"<?php echo _MONTH_JAN; ?>",
		2:"<?php echo _MONTH_FEB; ?>",
		3:"<?php echo _MONTH_MAR; ?>",
		4:"<?php echo _MONTH_APR; ?>",
		5:"<?php echo _MONTH_MAY; ?>",
		6:"<?php echo _MONTH_JUN; ?>",
		7:"<?php echo _MONTH_JUL; ?>",
		8:"<?php echo _MONTH_AUG; ?>",
		9:"<?php echo _MONTH_SEP; ?>",
		10:"<?php echo _MONTH_OCT; ?>",
		11:"<?php echo _MONTH_NOV; ?>",
		12:"<?php echo _MONTH_DEC; ?>"
	},5);
	
	$('input#txt_sex').each(function(index, element) {
		$(element).click(function(e) {
            $('#val_sex').val($(this).val())
        });
	});

	$('#txt_location').txtInput();
	$('#txt_interests').txtInput();
	
	$('#list_select_day, #list_select_month, #list_select_year').click(function() {
		var id = "."+$(this).attr('id').replace("list_","");
    });
	
	$('#check_username').click(function(e) {
		var VerifyTextbox = true;
		var val = { user: $.trim($('#txt_username').val()), pass: $.trim($('#txt_password').val()), mail: $.trim($('#txt_email').val()), nick: $.trim($('#txt_nickname').val()) }
		
		if(val.user.length<4 || val.user==$('#txt_username').attr('rule')) {
			$('#txt_username').css({'border':'#c22323 solid 2px'});
			 VerifyTextbox = false;
		}		
		if(val.pass.length<4 || val.pass==$('#txt_password').attr('rule')) {
			$('#txt_password').css({'border':'#c22323 solid 2px'});
			 VerifyTextbox = false;
		}
		if(val.mail.length<4 || val.mail==$('#txt_email').attr('rule')) {
			$('#txt_email').css({'border':'#c22323 solid 2px'});
			 VerifyTextbox = false;
		}		
		if(val.nick.length<3) {
			$('#txt_nickname').css({'border':'#c22323 solid 2px'});
			 VerifyTextbox = false;
		}
		
		if(VerifyTextbox) {
			var birthday = new Date(parseInt($('.select_year').val())-543, parseInt($('.select_month').attr('start'))-1, parseInt($('.select_day').val()),0,0,0,0);
			if($('#txt_interests').val()==$('#txt_interests').attr('rule')) $('#txt_interests').val("");
			if($('#txt_location').val()==$('#txt_location').attr('rule')) $('#txt_location').val("");
			$.ajax({ url: 'require.php?@mod_UserActivate',
				data: {
					user: $('#txt_username').val(),
					pass: $('#txt_password').val(),
					mail: $('#txt_email').val(),
					nickname: $('#txt_nickname').val(),
					birthday: (birthday.getTime()/1000),
					sex: parseInt($('#val_sex').val()),
					location: $('#txt_location').val(),
					interests: $('#txt_interests').val()
				},
				error: function(){ console.log("mod_UserActivate"); },
				success: function(data) {
					$('#txt_username').css('border','#2382c2 solid 2px');
					$('#txt_password').css('border','#2382c2 solid 2px');
					$('#txt_email').css('border','#2382c2 solid 2px');
					if(data.euser) $('#txt_username').css({'border':'#c22323 solid 2px','color':'#c22323'});
					if(data.epass) $('#txt_password').css({'border':'#c22323 solid 2px','color':'#c22323'});	
					if(data.email) $('#txt_email').css({'border':'#c22323 solid 2px','color':'#c22323'});					
					if(!data.euser && !data.epass && !data.email) {
						$('#txt_username').attr('disabled','disabled');
						$('#txt_password').attr('disabled','disabled');
						$('#txt_email').attr('disabled','disabled');
						$('#txt_nickname').attr('disabled','disabled');
						$('.select_day').attr('disabled','disabled');
						$('.select_month').attr('disabled','disabled');
						$('.select_year').attr('disabled','disabled');						
						$('.select_day').css({'border':'#e4e4e4 solid 2px','color':'#126095','background-color':'#f5f5f5' });
						$('.select_month').css({'border':'#e4e4e4 solid 2px','color':'#126095','background-color':'#f5f5f5' });
						$('.select_year').css({'border':'#e4e4e4 solid 2px','color':'#126095','background-color':'#f5f5f5' });
						$('input#txt_sex').each(function(index, element) { $(element).attr('disabled','disabled'); });
						$('#txt_interests').attr('disabled','disabled');
						$('#txt_location').attr('disabled','disabled');
						
						$('#check_username').data({'verify': true, 'code': data.code, 'acc': data.acc});
						$('#check_username').fadeOut(0);
						$('#regis_cancel').fadeOut(0);
						$('#regis_submit').fadeIn(0);
						$('#human_back').fadeIn(0);
						var srcdump = "dL4Es3dSle"
						$('#dump').attr('src','http://dummyimage.com/200x60/ffffff/333333.png&text='+ srcdump);
						$('#txt_answer').data('human', srcdump);
					}
				}
			});
		}
		
    });

	
	$('#regis_submit').click(function(e) {
		$('#activate_code').html($('#check_username').data('code'));
		$('#dialog_profile_form').height($('#dialog_profile_form').height()).fadeOut(0);
		$('#dialog_human_form').fadeIn(300);
		
		
	});	
	$('#regis_cancel').click(function(e) {
		$('#btnRegister').data({'Closing':true,'Closed':true});
		$('#btnRegister').Dialog('close');
	});

	$('#human_back').click(function(e) {
		$('#txt_username').removeAttr('disabled');
		$('#txt_password').removeAttr('disabled');
		$('#txt_email').removeAttr('disabled');
		$('#txt_nickname').removeAttr('disabled');
		$('.select_day').removeAttr('disabled');
		$('.select_month').removeAttr('disabled');
		$('.select_year').removeAttr('disabled');
		$('.select_day').css({'border':'#2382c2 solid 2px','color':'#333','background-color':'#F7F7F7' });
		$('.select_month').css({'border':'#2382c2 solid 2px','color':'#333','background-color':'#F7F7F7' });
		$('.select_year').css({'border':'#2382c2 solid 2px','color':'#333','background-color':'#F7F7F7' });
		
		
		$('inut#txt_sex').each(function(index, element) { $(element).removeAttr('disabled'); });
		$('#txt_interests').removeAttr('disabled');
		$('#txt_location').removeAttr('disabled');
		$('#txt_interests').val($('#txt_interests').attr('rule'));
		$('#txt_location').val($('#txt_location').attr('rule'));
		$('#check_username').data({'verify': false, 'code': ""});
		$('#check_username').fadeIn(0);
		$('#regis_cancel').fadeIn(0);
		$('#regis_submit').fadeOut(0);
		$('#human_back').fadeOut(0);						
    });

	
	// SATAGE 3
	//$('#txt_location').txtInput();
	
	$('#txt_repassword').bind("keyup keydown", function(e) {
		$('#txt_repassword').attr('a',1);
		if($.trim($(this).val())==$.trim($('#txt_password').val()) && $.trim($(this).val())!="") {
			$(this).css('border','#2382c2 solid 2px');
			$(this).css('color','#126095');	
			$('#txt_repassword').attr('a',0);
		} else if($.trim($(this).val())=="") {
			$(this).css('border','#c8c8c8 solid 2px');
			$(this).css('color','#126095');
		} else { 
			$(this).css('border','#c22323 solid 2px');
			$(this).css('color','#c22323');
		}
		if($('#txt_repassword').attr('a')=="0" && $('#txt_answer').attr('a')=="0") $('#human_submit').removeAttr('disabled');
		else $('#human_submit').attr('disabled','disabled');
    });
	
	$('#txt_answer').bind("keyup keydown", function(e) {
		if($(this).val()=="") {
			$(this).css('border','#c8c8c8 solid 2px');
			$(this).css('color','#126095');
			$('#txt_answer').attr('a',1);
		} else { 
			$(this).css('border','#c28823 solid 2px');
			$(this).css('color','#c28823');
			$('#txt_answer').attr('a',0);
		}
		if($('#txt_repassword').attr('a')=="0" && $('#txt_answer').attr('a')=="0") $('#human_submit').removeAttr('disabled');
		else $('#human_submit').attr('disabled','disabled');
    });
	
	$('#human_submit').click(function(e) {
		if($('#txt_answer').data('human')==$.trim($('#txt_answer').val())) {
			$('#dialog_human_form').height($('#dialog_human_form').height()).fadeOut(0);
			$('#dialog_access_form').fadeIn(300);
							
			$('#lbl_username').html($('#txt_username').val());
			$('#lbl_nickname').html($('#txt_nickname').val());
			
			switch(parseInt($('#val_sex').val())) {
				case 0: $('#lbl_sex').html("<?php echo _SEX_MALE;?>"); break;
				case 1: $('#lbl_sex').html("<?php echo _SEX_MALE2;?>"); break;
				case 2: $('#lbl_sex').html("<?php echo _SEX_FEMALE2;?>"); break;
				case 3: $('#lbl_sex').html("<?php echo _SEX_FEMALE3;?>"); break;
				case 4: $('#lbl_sex').html("<?php echo _SEX_FEMALE;?>"); break;
				case 5: $('#lbl_sex').html("<?php echo _SEX_MALE3;?>"); break;
				case 6: $('#lbl_sex').html("<?php echo _SEX_FEMALE4;?>"); break;
				case 7: $('#lbl_sex').html("<?php echo _SEX_OTHER;?>"); break;
			}
			if($('#txt_location').val()!=$('#txt_location').attr('rule')) $('#lbl_location').html($('#txt_location').val());
			if($('#txt_interests').val()!=$('#txt_interests').attr('rule')) $('#lbl_interests').html($('#txt_interests').val());
			
			// INSERT
			$.ajax({ url: 'require.php?@mod_NewMember',
				data: {
					code: $('#check_username').data('code'),
					pass: $('#txt_password').val(),
					acc: $('#check_username').data('acc')
				},
				error: function(){ $('#access_refresh').attr('disabled','disabled'); console.log("from_UserAccess: INSERT "); },
				success: function(data) {
					$('#btnRegister').Dialog('close');
					$('#access_refresh').removeAttr('disabled');
					location.reload();				
				}
			});
		} else {
			$('#txt_answer').css('border','#c22323 solid 2px');
			$('#txt_answer').val("");
		}
	});
	
	$('#access_refresh').click(function(e) {
		$('#btnRegister').Dialog('close');
		$('#btnRegister').data('Closing',true);
	});
	
});

</script>
<div id="dialog_agree_form">
  <div id="frm_header"><?php $group = $database->query("SELECT * FROM dl_content_group WHERE group_id=2 LIMIT 1;"); ?><strong><?php echo $group['title']; ?></strong></div>
  <div id="frm_content"><?php
     foreach($database->query("SELECT * FROM dl_content WHERE group_id=2;") as $rule): ?>
     <box class="text">
	 <?php echo $rule['fulltext']; ?></box>   
     <button class="agree" onClick="$(this).AgreeEnabled();"><?php echo _REGISTER_BUTTON_AGREE.$rule['title']; ?></button>
     <?php endforeach; ?>
     <div align="center" style="padding-top:10px; border-top:#d3d8dd solid 1px;"></div>
  </div>
  <div id="dialog_footer" align="center">
     <button class="black" id="regis_agree" disabled="disabled"><span style="margin:0 30px 0 30px;"><?php echo _REGISTER_AGREE_UNDERSTOOD; ?></span></button>
  </div>
</div>
    
<div id="dialog_profile_form" style="display:none;">
<div id="frm_header"><strong><?php echo _REGISTER_NEW_TITLE; ?></strong></div>
<div id="dialog_details">
  <div class="boxin_dialog" style="margin:20px 0 15px 0;">
    <table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="100"><strong><?php echo _REGISTER_USERNAME; ?></strong></td>
        <td align="left"><input id="txt_username" type="text" maxlength="20" value="" rule="<?php echo _REGISTER_USERNAME_RULE; ?>" /> </td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _REGISTER_PASSWORD; ?></strong></td>
        <td align="left"><input id="txt_password" type="password" maxlength="20" value="" rule="pass" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _REGISTER_EMAIL; ?></strong></td>
        <td align="left"><input id="txt_email" type="text" maxlength="50" value="" rule="<?php echo _REGISTER_EMAIL_RULE; ?>" /></td>
      </tr>
    </table>
  </div>
  <div class="boxin_dialog" style="border-bottom:#e5e5e5 solid 1px;margin:10px 0 15px 0;">
    <h5><?php echo _REGISTER_GENERAL_TITLE; ?></h5>
    <table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="100"><strong><?php echo _REGISTER_NICKNAME; ?></strong></td>
        <td align="left"><input id="txt_nickname" type="text" maxlength="20" value="" /></td>
        <td align="left" width="150">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" width="100"><strong><?php echo _REGISTER_BIRTHDAY; ?></strong></td>
        <td align="left" style="padding-left:12px;"><?php $NowDay = date("j",time()); $NowMonth = date("n",time()); $NowYear = date("Y",time())+543; ?>
          <input class="select_day" id="txt_birthday" type="button" start="<?php echo $NowDay; ?>" value="" />
          <input class="select_month" id="txt_birthday" type="button" start="<?php echo $NowMonth; ?>" value="" />
          <input class="select_year" id="txt_birthday" type="button" start="<?php echo $NowYear; ?>" value="" />
        </td>
        <td align="left" width="150">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _REGISTER_SEX; ?></strong></td>
        <td align="left">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding-left:15px"><label><input name="sex" id="txt_sex" type="radio" value="0" /> <?php echo _SEX_MALE; ?></label></td>
                <td><label><input name="sex" id="txt_sex" type="radio" value="1" /> <?php echo _SEX_MALE2; ?></label></td>
                <td><label><input name="sex" id="txt_sex" type="radio" value="2" /> <?php echo _SEX_FEMALE2; ?></label></td>
                <td><label><input name="sex" id="txt_sex" type="radio" value="3" /> <?php echo _SEX_FEMALE3; ?></label></td>
              </tr>
              <tr>
                <td style="padding-left:15px"><label><input name="sex" id="txt_sex" type="radio" value="4" /> <?php echo _SEX_FEMALE; ?></label></td>
                <td><label><input name="sex" id="txt_sex" type="radio" value="5" /> <?php echo _SEX_MALE3; ?></label></td>
                <td><label><input name="sex" id="txt_sex" type="radio" value="6" /> <?php echo _SEX_FEMALE4; ?></label></td>
                <td><label><input name="sex" id="txt_sex" type="radio" value="7" checked="checked" /> <?php echo _SEX_OTHER; ?></label></td>
              </tr>
            </table>
        </td>
        <td align="left"><input id="val_sex" type="hidden" value="7" /></td>
      </tr>
      <tr>
        <td colspan="3" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _REGISTER_LOCATION._REGISTER_INPUT_NONE; ?></strong></td>
        <td align="left" style="padding-left:15px"><textarea rows="5" id="txt_location" rule="<?php echo _REGISTER_LOCATION_RULE; ?>"></textarea></td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _REGISTER_INTERESTS._REGISTER_INPUT_NONE; ?></strong></td>
        <td align="left" style="padding-left:15px"><textarea rows="5" id="txt_interests" rule="<?php echo _REGISTER_INTERESTS_RULE; ?>"></textarea></td>
        <td align="left">&nbsp;</td>
      </tr>
    </table>
  </div>
</div>
<div id="dialog_footer" align="right">
  <button class="white" id="regis_cancel"><?php echo _REGISTER_CLOSE_BUTTON; ?></button>
  <button class="white" id="human_back" style="display:none;"><?php echo _REGISTER_HUNAM_BACK; ?></button>
  <button class="black" id="check_username"><?php echo _REGISTER_USERNAME_CHECK; ?></button>
  <button class="black" id="regis_submit" style="display:none;"><?php echo _REGISTER_SUBMIT_BUTTON; ?></button>
</div>
</div>

          
<div id="dialog_human_form" style="display:none;">
  <div id="frm_header"><strong><?php echo _REGISTER_HUMAN_TITLE; ?></strong> </div>
  <div id="dialog_details">
    <div class="boxin_dialog" style="border-bottom:#e5e5e5 solid 1px;margin-bottom:15px;">
    <h5><?php echo _REGISTER_HUMAN_TITLE; ?></h5>
      <table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" width="100"><strong><?php echo _REGISTER_REPASSWORD; ?></strong></td>
          <td align="left"><input id="txt_repassword" type="password" maxlength="20" value="" /></td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" width="100">&nbsp;</td>
          <td align="left" style="padding-left:15px;">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" width="100"><strong><?php echo _REGISTER_HUMAN_QUEST; ?></strong></td>
          <td align="left" style="padding-left:15px;"><img id="dump" src="" width="200" height="60" /></td><!--/?@user_VerifyHunam-->
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" width="100">&nbsp;</td>
          <td align="left" style="padding-left:15px;"><div id="lbl_quest" style="font-size:11px;color:#333;font-weight:bold;"><?php echo _REGISTER_HUMAN_QUESTION; ?></div></td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" width="100"><strong><?php echo _REGISTER_HUMAN_ANSWER; ?></strong></td>
          <td align="left"><input id="txt_answer" type="text" maxlength="20" value="" /></td>
          <td align="left">&nbsp;</td>
        </tr>
      </table>
    </div>
    <div class="boxin_dialog">
      <h5><?php echo _REGISTER_ACTIVATE_CODE; ?></h5>
      <div id="activate_code"></div>
    </div>
    <div class="boxin_footer" style="font-size:11px; font-weight:bold; color:#333;">
      <?php echo _REGISTER_ACTIVATE_NOTE; ?>
    </div>
</div>
  <div id="dialog_footer" align="right">   
    <button class="black" id="human_submit"><span style="margin:0 30px 0 30px;"><?php echo _REGISTER_HUNAM_SUBMIT; ?></span></button>
  </div>            
</div>

<div id="dialog_access_form" style="display:none;">
<div id="frm_header"><strong><?php echo _REGISTER_ACCESS_TITLE; ?></strong> </div>
<div id="dialog_details">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td style="padding-top:10px;" valign="top">
      <div class="boxin_dialog" style="border-bottom:#e5e5e5 solid 1px;margin-bottom:15px; height:152px;">
        <h5><?php echo _REGISTER_ACCESS_USER; ?></h5>
        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td align="right" width="100" style="padding:2px;"><strong><?php echo _REGISTER_USERNAME; ?></strong></td>
            <td align="left" style="padding-left:15px;font-size:11px;color:#333;font-weight:bold;">
              <div id="lbl_username">&nbsp;</div>
            </td>
          </tr>
          <tr>
            <td align="right" width="100" style="padding:2px;"><strong><?php echo _REGISTER_NICKNAME; ?></strong></td>
            <td align="left" style="padding-left:15px;font-size:11px;color:#333;font-weight:bold;">
              <div id="lbl_nickname">&nbsp;</div>
            </td>
          </tr>
          <tr>
            <td align="right" style="padding:2px;"><strong><?php echo _REGISTER_SEX; ?></strong></td>
            <td align="left" style="padding-left:15px;font-size:11px;color:#333;font-weight:bold;">
              <div id="lbl_sex">&nbsp;</div>
            </td>
          </tr>
          <tr>
            <td align="right" style="padding:2px;">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" style="padding:2px;"><strong><?php echo _REGISTER_LOCATION; ?></strong></td>
            <td align="left" style="padding-left:15px;font-size:11px;color:#333;font-weight:bold;">
              <div id="lbl_location">&nbsp;</div>
            </td>
          </tr>
          <tr>
            <td align="right" style="padding:2px;"><strong><?php echo _REGISTER_INTERESTS; ?></strong></td>
            <td align="left" style="padding-left:15px;font-size:11px;color:#333;font-weight:bold;">
              <div id="lbl_interests">&nbsp;</div>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>

</div>
<div id="dialog_footer" align="right">            
  <button class="white" id="access_refresh"><span style="margin:0 30px 0 30px;"><?php echo _REGISTER_ACCESS_REFRESH; ?></span></button>
</div>
</div>
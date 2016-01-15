<script type="text/javascript">
var chatMessageBox = false;
var scPositionValues = 100;
var msgCount = 0;
var idLastMsg = 0;

$(function(){
	$('#input_message').hide();	
	$('.scroller_bar').fadeOut(0);	
	$('.dialogbox').hide().css('opacity',0);	
	$('#chat_container').css('background','url(images/loading_wh.gif) center no-repeat');
	
	$(document).keydown(function(e) {
        if(e.keyCode==13){
			if(!chatMessageBox) {
				chatMessageBox = true;
				$('#input_message').show();
				$('#message_text').focus();
				$('#message_text').val('')
			} else {
				if($('#message_text').val()=='') {
					chatMessageBox = false;
					$('#input_message').hide();
				} else {
					chatMessageBox = false;
					$('#input_message').hide();							
					$.ajax({ url: '?stage=chat&ajax=manage_chat',
						data: {
							manage: 'msg',
							msg: $('#message_text').val(),
							user: $('#chat_name').val(),
						},
						success: function(data) {
							
						},
					});
				}
			}
        }
	});
	
	$('.dialogclose').click(function(){
		$('.dialogcontent').html('<div align="center"><img src="images/loading_wh.gif" border="0" /></div>');
		$('.dialogbox').animate({
			opacity: 0,
			'margin-left': 0,
		},100, function(){
			$('.dialogbox').hide();	
		});	
	});
	
	$(".scroller_button").draggable({
		axis: "y",
		containment: 'parent',
		drag: function() {
			var scrollDrag = ($('.scroller_bar').height()-$('.scroller_button').height()-4);
			var scPercent = (($('#chat_container').height()-$('#chat_content').height())/100);			
			scPositionValues = parseInt(parseInt((parseInt($(".scroller_button").css('top'))*100)/scrollDrag));
			$('#chat_content').css('top', parseInt(scPositionValues*scPercent));
		}		
	});
	
	$('.dialogbox').draggable({
		containment: 'document',
	});

});

/* function to load new content dynamically */
function LoadMessage() {
		$.ajax({ url: '?stage=chat&ajax=message_get',
		data: { id: idLastMsg },
		success: function(data) {
			idLastMsg = data.last;
			//$('#view_messages').empty();
			for(var i=0;i<data.msg.length;i++) { $('#view_messages').append('<tr><td>'+data.msg[i]+'</td></tr>'); }					
			if(scPositionValues>=98) { $('#chat_content').css('top',($('#chat_container').height()-$('#chat_content').height())); }
			$(document).dlReset();
		},
	});
}

function PreviewImage(url) {
	$('.dialogcontent').html('<div align="center"><img src="images/loading_wh.gif" border="0" /></div>');
	$('.dialogbox').animate({
		opacity: 0,
		'margin-left': 0,
	},0, function(){
		$('.dialogbox').show();
		$('.dialogbox').animate({
			opacity: 0.98,
			'margin-left': 400,
		},100, function(){
			$.ajax({ url: '?stage=chat&ajax=manage_chat',
				data: { manage: 'link', url: url },
				success: function(data) {
					$('.dialogcontent').html(data.html);
				},
			});
		});	
	});	
}


setInterval(function(){
	$.ajax({ url: '?stage=chat&ajax=manage_chat',
		data: { manage: 'chk' },
		success: function(data) {
			
			// Load Message Line
			if(data.msg!=msgCount) {
				if(idLastMsg==0) {
					$('#dlmain_above').css('background-image','url(../../images/bg/body_conan.png) !important');
					$('#chat_container').css('background','none');
				}
				LoadMessage();
				msgCount = data.msg;
				
			}
			
			// Load User Online
			if(data.user!=msgCount) {

			}
			
			// Scroller Bar Change
			if(parseInt($('#chat_container').height()-$('#chat_content').height())<=0) {
				$('.scroller_bar').fadeIn(0);	
			} else {
				$('.scroller_bar').fadeOut(0);	
			}
		},
	});
},1000);


</script>
<div class="com_header chat"></div>
<div class="dialogbox" align="left">
  <div class="dialogclose"><a onclick="">X</a></div>
  <div class="dialogcontent" align="center"><img src="images/loading_wh.gif" border="0" /></div>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td id="view_users">&nbsp;</td>
    <td>
      <div id="chat_container">
        <div class="scroller_bar">
          <div class="scroller_button"></div>
        </div>
        <div id="chat_content">
          <table id="view_messages" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </td>
  </tr>
</table>
<div id="note" align="center"><?php echo _CHAT_NOTE1; ?></div>
<?php
$profile = $database->Query("SELECT * FROM dl_profiles LIMIT 1;");
?>
<div id="input_message" align="left">
  <div id="input_username" style="background:url(<?php echo $profile['serv_img']; ?>avartar/guest.png);"></div>
  <div id="input_textbox">
    <div style="font-weight:bold; padding:10px; color:#000;">
      <?php
    $USERID = 0;
	$USERNAME = NULL;
	if($USERID!=0) {
		$user = $database->Query("SELECT * FROM dl_user WHERE user_id=$text[user_id] LIMIT 1;");
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
		$user = $database->Query("SELECT * FROM dl_online WHERE address_ip='$ip' LIMIT 1;");
		echo $user['guest']._CHAT_SAY;
		$USERNAME = $user['guest'];
	}
  ?>
      <input type="hidden" id="chat_name" value="<?php echo $USERNAME; ?>" />
    </div>
    <div>
      <input id="message_text" type="text" maxlength="255" value="" />
    </div>
    <div style="padding:5px 10px 0 10px; margin:0 10px 0 10px; border-top:#CCC dotted 1px;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">&nbsp;</td>
          <td align="right"><a onclick="" class="link_text" id="namechange"><strong style="padding:0 5px 0 5px;"><?php echo _CHAT_SETTING; ?></strong></a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</div>
<form type="textbox">
asdasd
</form>
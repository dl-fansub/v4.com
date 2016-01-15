<?php
$lastId = 0;
$messages = array();
$msgString = array();
$getMsg = $database->Query("SELECT * FROM dl_chat_message WHERE private_id=0 AND msg_id>$_POST[id] ORDER BY msg_id DESC LIMIT 0,15;");
$profile = $database->Query("SELECT * FROM dl_profiles LIMIT 1;");

for($i=(count($getMsg)-1);$i>=0;$i--) $messages[] = $getMsg[$i];
foreach($messages as $text) {
	if($text['msg_id']>$lastId) $lastId = $text['msg_id'];
	$styleBorder = NULL;
	$message = '';
	$username = '';

	if($text['user_id']==0) {
		$user['avatar'] = $profile['serv_img'].'avartar/thumb_chat/guest.png';
	} else {
		$user['avatar'] = $profile['serv_img'].'avartar/thumb_chat/'.$user['avatar'];
		$styleBorder = 'border:#999 solid 1px;background-position:1px 1px;';
	}
	
	$splins = explode(" ", $text['message']);
	foreach($splins as $i=>$splin) {
		if($i==0) {
			$username = ereg_replace('\{|\}','',$splin);
		} else {
			$message .= ' ';
			//parse_url()
			if(ereg("((www\.|(http|https|ftp|news|file)+\:\/\/)[&#95;.a-z0-9-]+\.[a-z0-9\/&#95;:@=.+?,##%&~-]*[^.|\'|\# |!|\(|?|,| |>|<|;|\)])", $splin)) {
				$message .= '<a onclick="PreviewImage(\''.$splin.'\')">'.$splin.'</a>';
			} else {
				$message .= $splin;
			}
		}
	}
	$guest = $database->Query("SELECT * FROM dl_online WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;");
	$lineMessage = '';
	
	// View Message.
	if(trim($guest['guest'])!=trim($username)) {
		$lineMessage .= '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="Browallia"><tr><td width="48">';
		$lineMessage .= '<div class="avatar" style="background-image:url('.$user['avatar'].');'.$styleBorder.'"></div>';
		$lineMessage .= '</td><td><div class="message_user" style="float:left;margin-left:25px;">';
		$lineMessage .= '<div class="username" align="left"><div class="message_arrow arrow_l"></div>'.$username._CHAT_SAY.'</div>';
		$lineMessage .= '<div class="message" align="left">'.trim($message).'</div>';
		$lineMessage .= "</div></td></tr></table>\r\n";
	} else {
		$lineMessage .= '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="Browallia"><tr><td align="right">';
		$lineMessage .= '<div class="message_user" style="float:right;margin-right:25px;"><div class="username" align="right">'.$username._CHAT_SAY.'</div>';
		$lineMessage .= '<div class="message" align="right">'.trim($message).'<div class="message_arrow arrow_r"></div></div></div>';
		$lineMessage .= '</td><td width="48"><div class="avatar" style="background-image:url('.$user['avatar'].');'.$styleBorder.'"></div>';
		$lineMessage .= "</td></tr></table>\r\n";
	}
	$msgString[] = $lineMessage;
}
echo json_encode(array('msg'=>$msgString, 'last'=>$lastId));
?>

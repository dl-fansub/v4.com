<?php
switch($_POST['manage']) {
	case 'msg':
		$isTime = time();
		if($database->Query("SELECT COUNT(*) FROM dl_online WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;")==1) {
			$database->Query("INSERT dl_talk_message (user_id,private_id,message,date) VALUES (0,0,'{".$_POST['user']."} ".$_POST['msg']."',$isTime);");
			$database->Query("UPDATE dl_online SET signin=$isTime WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;");
		} else {
			$database->Query("INSERT INTO dl_online VALUES ('$_SERVER[REMOTE_ADDR]', 0, $isTime)");
			$database->Query("INSERT dl_talk_message (user_id,private_id,message,date) VALUES (0,0,'{".$randName."} ".$_POST['msg']."',$isTime);");
		}
		break;	
	case 'chk':
		$msgs = $database->Query("SELECT COUNT(*) FROM dl_talk_message WHERE talk_id=$_POST[id];");					
		$users = $database->Query("SELECT COUNT(*) FROM dl_online;");					
		echo json_encode(array('msg'=>$msgs, 'online'=>$users));
		break;	
	case 'link':
		if(ereg('(youtube.com)',$_POST['url'])) {
			$tmp = explode('v=',$_POST['url']);
			list($varsYoutube) = explode('&',$tmp[1]);			
			$youtube = '<iframe width="500" height="280" src="http://www.youtube.com/embed/'.$varsYoutube.'?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
		}
		echo json_encode(array('html'=>$youtube));
		break;
	case '':
	
		break;
	case '':
	
		break;	
}

?>
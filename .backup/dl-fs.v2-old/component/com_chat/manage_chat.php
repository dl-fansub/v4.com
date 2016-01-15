<?php
switch($_POST['manage']) {
	case 'msg':
		$isTime = time();
		if($database->query("SELECT COUNT(*) FROM dl_online WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;")==1) {
			$database->Query("INSERT dl_chat_message (user_id,private_id,message,date) VALUES (0,0,'{".$_POST['user']."} ".$_POST['msg']."',$isTime);");
			$database->query("UPDATE dl_online SET signin=$isTime WHERE address_ip='$_SERVER[REMOTE_ADDR]' LIMIT 1;");
		} else {
			$randName = 'Guest_'.rand(1,9999);
			$database->query("INSERT INTO dl_online VALUES ('$_SERVER[REMOTE_ADDR]', 0, $isTime, '$randName')");
			$database->Query("INSERT dl_chat_message (user_id,private_id,message,date) VALUES (0,0,'{".$randName."} ".$_POST['msg']."',$isTime);");
		}
		break;	
	case 'chk':
		$msgs = $database->Query("SELECT COUNT(*) FROM dl_chat_message;");					
		$users = $database->Query("SELECT COUNT(*) FROM dl_online;");					
		echo json_encode(array('msg'=>$msgs, 'user'=>$users));
		break;	
	case 'link':
		if(ereg('(youtube)',$_POST['url'])) {
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
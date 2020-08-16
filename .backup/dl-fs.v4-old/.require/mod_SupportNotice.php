<?php
if(isset($_POST['last_id'])) {	
	if($notice = $database->Query("SELECT * FROM dl_user_notice WHERE notice_id>$_POST[last_id] LIMIT 1;")) {
		$user = $database->Query("SELECT * FROM dl_user WHERE user_id=$notice[user_id] LIMIT 1;");
		$message = array('name'=>$user['nickname'], 'message'=>$notice['message']);
	}
}
echo json_encode(array('time'=>time(),'notice'=>$message, 'config'=>array('last'=>$notice['notice_id'], 'expire'=>$notice['expire'], 'icon'=>$notice['icon'])));
?>